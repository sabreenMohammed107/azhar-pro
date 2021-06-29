<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Accomodation_request;
use App\Models\Building;
use App\Models\Room;
use App\Models\Student;
use App\Models\Students_room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
class BuildingsController extends Controller
{
    protected $viewName='student.';
    //
    public function index()
    {
        $allRows=Building::orderBy('id', 'DESC')->get();
        $data = Building::limit(3)->orderBy('id', 'DESC')->get();
        return view($this->viewName.'building', compact('data','allRows'));
    }
    public function loadMoreData(Request $request)
{
        if ($request->id > 0) {
            //info($request->id);
            \Log::info('clicked');
            
                    $data = Building::where('id','<',$request->id)->limit(3)->orderBy('id', 'DESC')->get();
        } 
        $allRows=Building::orderBy('id', 'DESC')->get();
        $output = '';
        $last_id = '';

        if (!$data->isEmpty()) {
          
            foreach ($data as $row) {
                $output .= '
                <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
            
                        <div class="category"><h3>'.$row->name .'</h3></div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>'.$row->phone.'</h2>
                        <p class="desc mb-4">'.$row->address .'</p>
                        <p><a href='.URL('/rooms/'.$row->id ).' class="btn btn-primary rounded-0 px-4">Show Available Rooms</a></p>
                    </div>
                </div>
            </div>
                ';
                $last_id = $row->id ;
            
            }

            
        }
            
        // return $output;
    $arr=[
        'output'=>$output,
        'last_id'=>$last_id,
    ];
        // return json_encode($arr);
        return response()->json($arr);
}


public function rooms($id)
{
    
    $allRows=Room::where('building_id',$id)->orderBy('id', 'DESC')->get();
    $data = Room::where('building_id',$id)->limit(6)->orderBy('id', 'DESC')->get();
    return view($this->viewName.'rooms', compact('data','allRows'));
}

public function loadMoreDataRooms(Request $request)
{
        if ($request->id > 0) {
            //info($request->id);
            \Log::info('clicked');
            
            $data = Room::where('id','<',$request->id)->where('building_id',$request->building_id)->limit(6)->orderBy('id', 'DESC')->get();
        } 
        $allRows=Building::orderBy('id', 'DESC')->get();
        $output = '';
        $last_id = '';

        if (!$data->isEmpty()) {
            foreach ($data as $row) {
                $output .= '
                <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                    <a href="#"><img src="'.asset('uploads/rooms').'/'. $row->image.'" alt="Image" class="img-fluid"></a>

                        <div class="category"><h3>'.$row->room_no .'</h3></div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>'.$row->capacity.'</h2>
                        <p class="desc mb-4">'.$row->building->name ?? '' .'</p>
                        <p><a href='.URL('/singleRoom/'.$row->id ).' class="btn btn-primary rounded-0 px-4">Show Available Rooms</a></p>
                    </div>
                </div>
            </div>
                ';
                $last_id = $row->id ;
            
            }

            
        }
            
        // return $output;
    $arr=[
        'output'=>$output,
        'last_id'=>$last_id,
    ];
        // return json_encode($arr);
        return response()->json($arr);
}

public function singleRoom($id){
    $row=Room::where('id',$id)->first();
   $out='';
    $accomodate=null;
    $user = Auth::guard('student')->user();
    if($user){
        $student=Student::where('user_id','=',$user->id)->first();
        if($student){
            $accomodate=Accomodation_request::where('student_id','=',$student->id)->where('request_status_id','=',2)->first();
            if($accomodate){
                $out="done";
            }
        }

    }
        //create leave request
       
            
    return view($this->viewName.'singleRoom', compact('row','out','accomodate'));
}

public function BookRoom(Request $request){
    
    $accomodate=Accomodation_request::where('id', $request->input('accomodate_id'))->first();
    $data=[
        'student_id'=>$accomodate->student_id,
        'room_id'=>$request->input('room_id'),
        'education_year_id'=>$accomodate->education_year_id,
    ];

try {
    Students_room::create($data);
    Session::forget('error');
    Session::flash('message', 'Congratulation Your Room Is Booking'); 
    return redirect()->back();

} catch (QueryException $q) {
    Session::forget('message');
    Session::flash('error', 'Room Not Booking Somthing Error !'); 
    return redirect()->back();

}



}
}
