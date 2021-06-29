<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Accomodation_request;
use App\Models\Education_year;
use App\Models\Parennt;
use App\Models\Requests_status;
use App\Models\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AccomodationController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function accomodateRequest(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            // 'student_id' => 'required',
            // 'education_year_id' => 'required',
            //  'request_date' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            //for make all updates in one shot
            DB::beginTransaction();
            try {
                // Disable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                //udate student Table

                $student = Student::where('user_id', '=', $user->id)->first();
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
                    // 'education_year_id' => Education_year::where('current','=',1)->first()->id,
                    'request_date' => Carbon::parse($request->input('request_date')),
                    'notes' => $request->input('notes'),
                    'request_status_id' => 1,
                ];
                if(Education_year::where('current','=',1)->first()){
                    $input['education_year_id'] = Education_year::where('current','=',1)->first()->id;
                }
                $accomodate = Accomodation_request::create($input);
                DB::commit();
                // Enable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                return $this->sendResponse($accomodate, 'Accomomdate Request Send Successfully');
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();

                return $this->sendError(null, 'Error in data saving or update!');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }

    }
    /**
     *Get request status
     **/
    public function accomodateStatus($code)
    {
        $user = Auth::user();
        if ($user) {
            $student = Student::where('user_id', '=', $user->id)->first();
            $row = Accomodation_request::where('student_id', '=', $student->id)->where('accomodation_code', '=', $code)->first();

            try {

                $status = null;
                if ($row) {
                    $status = Requests_status::where('id', '=', $row->request_status_id)->first()->name;

                    if ($status!=null) {
                        return $this->sendResponse($status, 'Your Request is');

                    } else {
                        return $this->sendResponse(null, 'Code is error');
                    }
                }else {
                    return $this->sendResponse(null, 'Code Not Found');
                }
            } catch (\Exception $e) {
                return $this->sendError($e->getMessage(), 'Error happens!!');
            }

        } else {
            return $this->sendError(null, 'You must login First!');
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

    public function accomodatationAll(){
      
        try
        {
            $user=Auth::user()->id;
            $student=Student::where('user_id','=',$user)->first();
            $rows=Accomodation_request::where('student_id','=',$student->id)->get();
            return $this->sendResponse($rows, 'All Accomodation Retrieved  Successfully');   
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
     }
}
