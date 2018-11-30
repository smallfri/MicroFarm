<?php

namespace App\Http\Controllers\Admin;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Support\Facades\Lang;
//use App\Notifications\ChangePassword;

class ProfileController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        flash(__('Your profile updated successfully.'), 'flash_success');
        $user = Auth::user();

//        return $user->lang;
        return view('admin.profile.index', compact('user'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();



        return view('admin.profile.edit', compact('user'));
    }


    /**
     * @param Request $request
     */
    public function update(Request $request)
    {


        $normal = [
            'name' => 'required'
        ];


        $user = Auth::user();





        $user->name = $request->name;

       $user->save();


        flash(__('Your profile updated successfully.'), 'flash_success');

        return redirect('admin/profile');

    }


    //
    /**
     * @param Request $request
     * @return null|string
     */
    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {

//            dd($request->file('image'));
            $file = $request->file('photo');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', \Carbon\Carbon::now()->toDateTimeString() . uniqid());

            $name = $timestamp . '-' . $file->getClientOriginalName();

//            dd($name);
//            $image->filePath = $name;

            $file->move(public_path() . '/uploads/', $name);

            return $name;
        } else {

            return null;
        }

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('admin.profile.changePassword');
    }

    /**
     * @param Request $request
     */
    public function updatePassword(Request $request)
    {
        //dd('here');

        $messages = [
            'current_password.required' => __('Please enter current password'),
            'password_confirmation.same' => __('The confirm password and new password must match.'),
           // 'password.regex' => __('Password must contain at least one: number, capital letter, lower case, special symbol. '),
        ];

        $this->validate($request,
            [
                'current_password' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ], $messages);


        $cur_password = $request->input('current_password');


        $user = Auth::user();

        if (Hash::check($cur_password, $user->password)) {

            $user->password = Hash::make($request->input('password'));
            $user->save();

            flash('Password changed successfully.', 'success');

           // $user->notify(new ChangePassword($user));

            return redirect()->route('profile.index');

        } else {
            $error = array('current-password' => __('Please enter correct current password'));
//            return response()->json(array('error' => $error), 400);
            return redirect()->back()->withErrors($error);
        }

        flash('Something wrong. Please try again latter.', 'error');

        return redirect()->back();


    }

}
