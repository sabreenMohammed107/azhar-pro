<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Accomodation_request;
use App\Models\Parennt;
use App\Models\Requests_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Department;
use App\Models\Division;
use App\Models\Education_status;
use App\Models\Education_year;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Parent_relation;
use App\Models\Student;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Session;
use DB;
class AccomadationController extends Controller
{
    protected $viewName='student.';
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index(){
    Session::forget('message');
    Session::forget('info');
    Session::forget('error'); 
     $user=Auth::guard('student')->user()->id;
     $student=Student::where('user_id','=',$user)->first();
     $rows=Accomodation_request::where('student_id','=',$student->id)->get();
     return view($this->viewName.'all-accomodations', compact('rows'));
 }

 public function showAccomodateStatus(){
    $row=new Accomodation_request();
    $code='';
    return view($this->viewName.'accomodate-status',compact('row','code'));
 }
   /**
     *Get request status
     **/
    public function accomodateStatus(Request $request)
    {
        $user =Auth::guard('student')->user();
      $code=$request->input('code');
        if ($user) {
            $student = Student::where('user_id', '=', $user->id)->first();
            $row = Accomodation_request::where('student_id', '=', $student->id)->where('accomodation_code', '=', $request->input('code'))->first();
         
            
if(!$row){
    Session::forget('message');
        Session::flash('info', 'This Code Not Found'); 
    return view($this->viewName.'accomodate-status')->with('code',$code);
}
else{
    Session::forget('info');
   Session::flash('message', 'Congratulation Your Request Has Been'); 

    return view($this->viewName.'accomodate-status')->with(['code'=>$code,'row'=>$row]);
}
            
           

    }
}

/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function accomodateRequest(Request $request)
    {
        $user=Auth::guard('student')->user();
        $parentData=new Parennt();

        $row = Student::where('user_id', '=', $user->id)->first();
      
        if(!$row){
            $row=new Student();
        }else{

            $parentData=Parennt::where('student_id','=',$row->id)->first();
            if(!$parentData){
                $parentData=new Parennt();

            }
            
        }
        // arrays
        $cities=City::all();
        $faculties=Faculty::all();
        $relations=Parent_relation::all();
        $grades=Grade::all();
        $status=Education_status::all();
        $departments=Department::all();
        $divisions=Division::all();
        $currentYear=Education_year::where('current',1)->first();
        // return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        return view($this->viewName.'accomodation-request', compact('row','parentData','currentYear','cities','faculties','relations','grades','status','departments','divisions'));
   
    }
    public function updateAccomodateRequest(Request $request)
    {
      
        $user = Auth::guard('student')->user();
    
            //for make all updates in one shot
            DB::beginTransaction();
            // try {
                // Disable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                //udate student Table

                $student = Student::where('user_id', '=', $user->id)->first();
                $data = [
                    'mobile' => $request->input('mobile'),
                   
                    'gender' => $request->input('gender'),
                    'birth_date' => Carbon::parse($request->input('birth_date')),
                    'birth_place' => $request->input('birth_place'),
                    'nid' => $request->input('nid'),
                    'nid_issue_place' => $request->input('nid_issue_place'),
                    'nid_issue_date' => Carbon::parse($request->input('nid_issue_date')),
                    'address' => $request->input('address'),
                    'city_id' => $request->input('city_id'),
                    'faculty_id' => $request->input('faculty_id'),
                    'faculty_code' => $request->input('faculty_code'),
                    'current_year_id' => $request->input('current_year_id'),
                    'division_id' => $request->input('division_id'),
                    'department_id' => $request->input('department_id'),
                    'education_status_id' => $request->input('education_status_id'),
                    'current_grade_id' => $request->input('current_grade_id'),
                    'military_service_complete' => $request->input('military_service_complete'),
                    'notes' => $request->input('notes'),
                ];
                if ($request->hasFile('guarantee_grade_img')) {
                    $guarantee_grade_img = $request->file('guarantee_grade_img');

                    $data['guarantee_grade_img'] = $this->UplaodImage($guarantee_grade_img);

                }
                if ($request->hasFile('guarantee_work_img')) {
                    $guarantee_work_img = $request->file('guarantee_work_img');

                    $data['guarantee_work_img'] = $this->UplaodImage($guarantee_work_img);

                }
                $student->update($data);
                //create parent Table
               //create parent Table
        
            $parrent = Parennt::where('student_id',$student->id)->firstOrNew();
            $parrent->name = $request->input('pname');
            $parrent->mobile = $request->input('pmobile');
            $parrent->phone = $request->input('pphone');
            $parrent->parent_relation_id = $request->input('parent_relation_id');
            $parrent->address = $request->input('paddress');
            $parrent->job = $request->input('pjob');
            $parrent->nid = $request->input('pnid');
            $parrent->nid_issue_place = $request->input('pnid_issue_place');
            $parrent->nid_issue_date= Carbon::parse($request->input('pnid_issue_date'));
            $parrent->student_id = $student->id;
            $parrent->notes = $request->input('pnotes');
            $parrent->save();
                //create accomodation request
                $max = Accomodation_request::latest('accomodation_code')->first();

                $max = ($max != null) ? intval($max['accomodation_code']) : 0;
                $max++;
                $input = [
                    'accomodation_code' => $max,
                    'student_id' => $student->id,
                    'request_date' => Carbon::parse($request->input('request_date')),
                    'request_status_id' => 1,
                ];
                if(Education_year::where('current','=',1)->first()){
                    $input['education_year_id'] = Education_year::where('current','=',1)->first()->id;
                }
                $accomodate = Accomodation_request::create($input);
                DB::commit();
                // Enable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                Session::forget('error');
               
                Session::flash('message', 'Thanks; your request has been submitted successfully Your Code is :' .$accomodate->accomodation_code.' !'); 
                return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully Your Code is :' .$accomodate->accomodation_code.' !' );
            // } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                Session::forget('message');
                Session::flash('error', 'Update not complete something error !'); 
                return redirect('/student/accomodate-request');
                // return redirect()->back()->with('message', "Thanks; your request has been submitted successfully Your Code is :"+ $accomodate->accomodation_code +" !" );

            // }
        

    }


    /**

     * uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/students');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
