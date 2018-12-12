<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/',
            'password' => 'required|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return User
     */
    protected function create($request)
    {

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'activation_token' => sha1(time() . uniqid() . $request['email']),
            'activation_time' => \Carbon\Carbon::now(),
        ]);

    }
    public function sendEmail(User $user)
    {

        return $user->notify(new \App\Notifications\ActivationLink($user));
    }

    public function activateAccount($token)
    {

        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            Session::flash('flash_error', 'This link is expired.');
            return redirect('/');
        }
        $user->role_id = 3;
        $user->activation_token = null;
        $user->activation_time = null;
        $user->is_active = 1;
        $user->save();


        if (!$this->guard()->check()) {
            // $this->guard()->login($user);
        }
        return redirect('/login')->with('flash_success', 'Your account has been activated.');
        // return redirect()->intended($this->redirectPath())

    }

    public function sendadminEmail(User $user)
    {
        $admin=User::find(55);
        return $admin->notify(new\App\Notifications\AdminMail($user));
    }

    public function resendActivationEmail(Request $request)
    {
        return view('auth.passwords.resendmail');
    }

    public function resendActivationEmailToUser(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user && $user->is_active == 0){
            $user->activation_token = sha1(time() . uniqid() .$request->email);
            $user->save();

            $this->sendEmail($user);
            return back()->with('flash_success', 'We resent you account activation email. Please check your email inbox.');
        }else{
            return back()->with('flash_error', 'No user Found.');
        }

    }
}
