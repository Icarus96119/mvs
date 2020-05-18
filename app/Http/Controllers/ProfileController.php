<?php

namespace MVS\Http\Controllers;

use Illuminate\Http\Request;
use MVS\User;
use MVS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use View;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric',
            'email' => ['required', 'string', 'email', 'max:255',
                                      Rule::unique('users')->ignore(Auth::user()->id),
                                  ],
            'mail_address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        // $user->mail_address = $data['mail_address'];
        if($data['password'] != "") $user->password = Hash::make($data['password']);

        $user->save();
        return redirect()->route('headmin.myprofile');
        // return View::make("headmin/viewprofile")->with('success','success');
    }
}
