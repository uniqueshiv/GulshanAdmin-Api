<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
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
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public function showLoginForm()
     {
          if (Auth::check())
          {
            return view('home');
          }else{
          //dd('showloginform');
             return view('auth.login');
          }

     }

    public function __construct()
    {
        //  dd('ss');
        //$this->middleware('auth:admin');

        //$this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

   //
   //  public function login(Request $request)
   // {
   //   // Validate the form data
   //   $this->validate($request, [
   //     'email'   => 'required|email',
   //     'password' => 'required'
   //   ]);
   //   // Attempt to log the user in
   //   if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
   //     // if successful, then redirect to their intended location
   //     return redirect()->view('/');
   //   }
   //   // if unsuccessful, then redirect back to the login with the form data
   //   return redirect()->back()->withInput($request->only('email', 'remember'));
   // }
}
