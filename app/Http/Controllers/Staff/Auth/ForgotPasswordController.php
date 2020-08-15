<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
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
 | your application to the admins. Feel free to explore this trait.
 |
 */

    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('staff.auth.passwords.email');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        if($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }
        else {
            flash('Reset Link Sent Successfully.Please check your email.')->success();
            return back()->with('status', trans($response));

        }
    }
}
