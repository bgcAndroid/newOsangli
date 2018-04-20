<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse($request)
    {
        if ($request->hasHeader('x-api-key')) {
            return $this->authenticated($request, $this->guard()->user());
        }
            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            return $this->authenticated($request, $this->guard()->user());

    }
    protected function authenticated($request, $user)
    {
        if ($request->ajax()){
            if($user->tokenStatus==1)
            {
                return response()->json(['message'=>true, 'apiToken'=>$user->apiToken],200);
            }

            else
            {
                $this->logout($request);
                return response()->json(['message'=>false],403);
            }

        }
    }
}
