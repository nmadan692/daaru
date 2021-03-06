<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Daaruu\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating staff for the application and
   | redirecting them to your staff dashboard screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::STAFF;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('staff.auth.login');
    }

    /**
     * Attempt staff user login
     *
     * @param  Request  $request
     * @return mixed
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(array_merge($this->credentials($request), ['role_id' => RoleConstant::STAFF_ID]),
            $request->filled('remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect(RouteServiceProvider::STAFFLOGIN);
    }

    /**
     * Set admin guard to admin
     *
     * @return mixed
     */
    public function guard()
    {
        return Auth::guard('staff');
    }
}
