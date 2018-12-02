<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Hash;
use App\ActionLog;
use Illuminate\Http\Request;
use Session;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

	
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
		$credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_active' => 1
        );

        $user = User::where("email", $request->email)->where('status','active')->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                if ($user->is_active == 1 && Auth::attempt($credentials)) {
                    Session::flash('flash_success',"Login Success !!");
					if(Auth::user()->hasRole('SU')){
						return redirect('/seed/create');
					}else{
						return redirect('/seed/create');
					}
                    
                } else {
                    Session::flash('flash_error',"Your Account Has Not Activated Yet");
                    Session::flash('is_active_error', 'Yes');
                }
            } else {
                Session::flash('flash_error',"Invalid Username or Password");
            }
        } else {
            Session::flash('flash_error',"Invalid Username or Password");
        }

        return redirect()->back()->withInput();

    }


    

}
