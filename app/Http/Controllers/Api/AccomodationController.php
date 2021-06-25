<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Accomodation_request;
use App\Models\Student;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
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
            'education_year_id' => 'required',
            // 'request_date' => 'required',
            
        ]);
   
        if($validator->fails()){
            return $this->convertErrorsToString($validator->messages());
        }
   
        try
        {
            \Log::info(Auth::user());
            $input = [
                'student_id'=> Student::where('user_id','=',$user->id)->first()->id   ,
                'education_year_id'=>$request->input('education_year_id'),
                'request_date'=> Carbon::parse($request->input('request_date')),
                'notes'=>$request->input('notes'),
                'request_status_id'=>1,
            ];
            
          
            $accomodate = Accomodation_request::create($input);
            // $user->accessToken =  $user->createToken('MyApp')->accessToken;
            
            return $this->sendResponse($accomodate,'Accomomdate Request Send Successfully');

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }
   
}
