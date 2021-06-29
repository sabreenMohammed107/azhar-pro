<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Student;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;
use Illuminate\Support\Facades\DB;
class RegisterStudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /** Overrriding native method */
    public function showRegisterForm()
    {
        return view('student.register');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(Request $data)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_admin' => 0,
            'password' => Hash::make($data['password']),
        ]);
        $Userdata = [
            'user_id' => $user->id,
        ];
        Student::create($Userdata);

        DB::commit();
        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    } catch (\Throwable $th) {
        //throw $th;
        DB::rollBack();

    }

    //   return redirect('/home');
    \Auth::guard('student')->login($user);
    
    /*

this is helper that enables you to do anything with register user or return to a specific URL. By default laravel only redirect to auth middleware after registration since  $this->guard()->login($user); enables Auth guard therefore if you want to redirect to LOGIN, it will be impossible because LOGIN is a Guest guard

*/
        return $this->registered($data, $user)
            ?: redirect('/');
    
    }
}
