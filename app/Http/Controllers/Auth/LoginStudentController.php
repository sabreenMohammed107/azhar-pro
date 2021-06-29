<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use App\User as AppUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class LoginStudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
    {
     $this->middleware('guest:student')->except('logout');
    }

    public function showLoginStudentForm()
    {
        return view('student.login');
    }
   

    public function attemptLogin(Request $request)
    {
       
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        
        // if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password]))
        if(auth()->guard('student')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
           
          
    
        if(auth()->guard('student')->user()->is_admin == 1){
            $this->guard('student')->logout();

            $request->session()->invalidate();
    
            return $this->loggedOut($request) ?: redirect('/student/login');
        }else{
            return redirect()->intended(url('/'));
        }
    
           
           
        }
      
        return redirect()->back()->withInput($request->only(['email', 'remember']));
    }

   
    public function logout(Request $request)
    {
        \Auth::guard('student')->logout();
        return redirect('/');
    }

   

  
   
}
