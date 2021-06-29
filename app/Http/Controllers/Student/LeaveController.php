<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Accomodation_request;
use App\Models\Education_year;
use App\Models\Leaves_request;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class LeaveController extends Controller
{
    protected $viewName='student.';
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
public function index(Request $request){
    $user=Auth::guard('student')->user()->id;
    $student=Student::where('user_id','=',$user)->first();
    $accomodate=Accomodation_request::where('student_id','=',$student->id)->where('request_status_id','=',2)->first();
    if($accomodate){
    $rows=Leaves_request::where('student_id','=',$student->id)->get();
    return view($this->viewName.'all-leaves', compact('rows'));
    }else{
$rows=[];
Session::forget('message');
Session::forget('info');
Session::flash('error','You Dont Have Accomodation!'); 

return view($this->viewName.'all-leaves')->with('rows', $rows);
    }
    
}

public function showLeaveStatus(){
    $row=new Leaves_request();
    $code='';
    Session::forget('message');
    Session::forget('info');
    return view($this->viewName.'leave-status',compact('row','code'));
 }

/**
     *Get request status
     **/
    public function leaveStatus(Request $request)
    {
        $user =Auth::guard('student')->user();
        $code=$request->input('code');
        if ($user) {
            $student = Student::where('user_id', '=', $user->id)->first();
            $row = Leaves_request::where('student_id', '=', $student->id)->where('leave_code', '=', $request->input('code'))->first();
         
            
if(!$row){
    Session::forget('message');
        Session::flash('info', 'This Code Not Found'); 
    return view($this->viewName.'leave-status')->with('code',$code);
}
else{
    Session::forget('info');
    Session::flash('message', 'yes'); 

    return view($this->viewName.'leave-status')->with(['code'=>$code,'row'=>$row]);
}
            
           

    }
}




/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function leaveRequest(Request $request)
    {
        $user=Auth::guard('student')->user();
       

        $row = Student::where('user_id', '=', $user->id)->first();
      
        $currentYear=Education_year::where('current',1)->first();
        // return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        return view($this->viewName.'leave-request', compact('row','currentYear'));
   
    }
    public function updateLeaveRequest(Request $request)
    {
      
        $user = Auth::guard('student')->user();
    
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
                     
                      'from_date' => Carbon::parse($request->input('from_date')),
                      'to_date' => Carbon::parse($request->input('to_date')),
                      'request_date' => Carbon::parse($request->input('request_date')),
                                    'request_status_id' => 1,
                  ];
        if(Education_year::where('current','=',1)->first()){
            $input['education_year_id'] = Education_year::where('current','=',1)->first()->id;
        }
                  $leave = Leaves_request::create($input);
                 
              
              
               
                Session::flash('message', 'Thanks; your request has been submitted successfully Your Code is :' .$leave->leave_code.' !'); 
                return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully Your Code is :' .$leave->leave_code.' !' );
            
        

    }else{
        Session::forget('message');
        Session::forget('info');
        Session::flash('error', 'You Dont Have Accomodation!'); 
        // return redirect('/student/leave-request');
    return redirect()->back();
    }

}
}
