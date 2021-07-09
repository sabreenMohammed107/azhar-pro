<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education_year;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class EducationYearController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Education_year $object)
    {
        $this->middleware('is_admin');
        $this->object = $object;
        $this->viewName = 'admin.educationYear.';
        $this->routeName = 'educationYear.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Education_year::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['_token','current']);
        \Log::info($request->input('current'));
        if($request->input('current')){
            $data['current']=1;
        }else{
            $data['current']=0;
        }
      
        $this->object::create($data);
        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except(['_token','current']);
        \Log::info($request->input('current'));
        if($request->input('current')){
            $data['current']=1;
        }else{
            $data['current']=0;
        }
       
      
        $this->object::findOrFail($id)->update($data);
        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->object::findOrFail($id)->delete();

        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');

        }
        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    
    }
}

