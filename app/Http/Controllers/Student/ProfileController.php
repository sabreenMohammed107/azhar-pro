<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Department;
use App\Models\Division;
use App\Models\Education_status;
use App\Models\Education_year;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Parennt;
use App\Models\Parent_relation;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class ProfileController extends Controller
{
    protected $viewName='student.';
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parentData=new Parennt();
        $row = Student::where('user_id', '=', $id)->first();
      
        if(!$row){
            $row=new Student();
        }else{
            $parentData=Parennt::where('student_id','=',$row->id)->first();
            // if(!$parentData){
            //     $parentData=new Parennt();
            // }
        }
        
       
        return view($this->viewName.'profile', compact('row','parentData'));
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentData=new Parennt();

        $row = Student::where('user_id', '=', $id)->first();
      
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
        return view($this->viewName.'edit-profile', compact('row','parentData','currentYear','cities','faculties','relations','grades','status','departments','divisions'));
    }
 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function updateProfile(Request $request){
   
        //for make all updates in one shot
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //udate student Table

            $student = Student::where('id', '=', $request->input('id'))->first();
            $data = [
                'mobile' => $request->input('mobile'),
                'phone' => $request->input('phone'),
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
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

         return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

         return redirect('/show-student/'.$student->user_id)->with('error', 'Update not complete something error !');
    }
    

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


