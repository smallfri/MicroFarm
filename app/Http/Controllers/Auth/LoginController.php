<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Userseed;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_active' => 1
        );

        $user = User::where("email", $request->email)->where('status','active')->first();

        if ($user) {

            if (Hash::check($request->get('password'), $user->password)) {

                if ($user->is_active == 1 && Auth::attempt($credentials)) {

                    Session::flash('flash_success',"Login Success !!");

                    //redirect based on having seeds or not
                    $userSeeds = Userseed::where('user_id', $user->id)->where('deleted_at',NULL)->get();

                    if(count($userSeeds)>0)
                    {
                        return redirect('/seed/summary');
                    }
                    else{
                        Session::flash('flash_success',"Please choose at least one seed to get started.");

                        return redirect('/seed/create');
                    }

//                    if(Auth::user()->hasRole('SU')){
//                        return redirect('/seed/create');
//                    }else{
//                        return redirect('/seed/create');
//                    }

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
