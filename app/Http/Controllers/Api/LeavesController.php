<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Accomodation_request;
use App\Models\Leaves_request;
use App\Models\Requests_status;
use App\Models\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LeavesController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function leaveRequest(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
           
            'education_year_id' => 'required',
            

        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            //create leave request
                $student=Student::where('user_id','=',$user->id)->first();
$accomodate=Accomodation_request::where('student_id','=',$student->id)->where('request_status_id','=',2)->first();
    if($accomodate){
          //create leave request
          $max = Leaves_request::latest('leave_code')->first();

          $max = ($max != null) ? intval($max['leave_code']) : 0;
          $max++;
        $input = [
            'leave_code'=>$max,
            'student_id' => $student->id,
              'education_year_id' => $request->input('education_year_id'),
              'from_date' => Carbon::parse($request->input('from_date')),
              'to_date' => Carbon::parse($request->input('to_date')),
              'request_date' => Carbon::parse($request->input('request_date')),
                            'request_status_id' => 1,
          ];

          $leave = Leaves_request::create($input);
         
          return $this->sendResponse($leave, 'Leave Request Send Successfully');
    }  else{
        return $this->sendError(null, 'you havent Accomodation');
    }      

            
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }

}

 /**
     *Get request status
     **/
    public function leaveStatus($code)
    {
        $user = Auth::user();
        if ($user) {
            $student = Student::where('user_id', '=', $user->id)->first();
            $row = Leaves_request::where('student_id', '=', $student->id)->where('leave_code', '=', $code)->first();

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

}
