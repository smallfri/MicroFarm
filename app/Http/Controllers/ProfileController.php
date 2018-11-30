<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\FbuserDB;
use Hash;
class ProfileController extends Controller
{
     
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $userid = Auth::user()->id;
        $user = User::where('id',$userid)->first();
        return view('user-backend.profile.editprofile', compact('user'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',       
        ]);
        $user = User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->save();    
        return redirect('Dashboard')->with('flash_message', 'Profile Updated Successfully');

    }

     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('user-backend.profile.change_password');
    }

    /**
     * @param Request $request
     */
    public function updatePassword(Request $request)
    {        
        $messages = [
            'current_password.required' => __('Please enter current password'),
            'password_confirmation.same' => __('The confirm password and new password must match.'),
        ];
        $this->validate($request,
            [
                'current_password' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ], $messages);
        $cur_password = $request->input('current_password');
        $user = User::find(Auth::user()->id);
        if (Hash::check($cur_password, $user->password)) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect('profile/change-password')->with('flash_message', 'Password Change Successfully');
        } 
        else {
            $error = array('current_password' => __('Please enter correct current password'));
            return redirect()->back()->withErrors($error);
        }
        return redirect()->back();
    }   

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $userid = Auth::user()->id;
        $user = User::where('id',$userid)->first();
        return view('user-backend.profile.show', compact('user'));
    }

}
