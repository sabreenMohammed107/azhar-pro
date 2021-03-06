<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            DB::beginTransaction();
            try {
                // Disable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $input['is_admin'] = 0;
                $user = User::create($input);
                $user->accessToken = $user->createToken('MyApp')->accessToken;
                $data = [
                    'user_id' => $user->id,
                ];
                Student::create($data);

                DB::commit();
                // Enable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                return $this->sendResponse($user, 'User has been registed');
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return $this->sendError(null, 'Error happens!!');
            }
           

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $user->accessToken = $user->createToken('MyApp')->accessToken;

                return $this->sendResponse($user, 'User login successfully.');
            } else {
                return $this->sendError('Invalid Useremail or Password!');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function logout(Request $request)
    {
        try
        {
            $token = $request->user()->token();
            $token->revoke();

            return $this->sendError(null, 'You have been successfully logged out!');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'You don\'\t Login');
        }
    }
}
