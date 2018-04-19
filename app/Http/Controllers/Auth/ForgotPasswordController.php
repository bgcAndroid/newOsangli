<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function sendResetLinkResponse($response)
    {
//        if($request->hasHeader('x-api-key'))
//        {
//            return response()->json(trans($response),200);
//        }
        return response()->json(trans($response),200);
    }
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if($request->hasHeader('x-api-key'))
        {
            return response()->json(['email' => trans($response)],200);
        }
        return response()->json(['email' => trans($response)],200);
    }
}
