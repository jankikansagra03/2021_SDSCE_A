<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function fetch_data_register(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:20',
            'em' => 'required|email',
            'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd_confirmation' => 'required',
            'age' => 'required',
            'mobile' => 'required|digits:10',
            'gender' => 'required',
            'hobby' => 'required',
            'qualification' => 'required',
            'address' => 'required',
            'pic' => 'required|max:100|mimes:jpg,png,gif,bmp'

        ], [
            'fn.required' => 'Full name cannot be empty',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 30 characters',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'Confirm Password must not be empty',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 25 KB',
            'pic.mimes' => 'Select jpg or png or bmp file to uplaod',
            'hobby.required' => 'Please select a hobby',
            'qualification.required' => 'Please select a qualification',
            'address.required' => 'Address field cannot be empty',
            'gender.required' => 'Please select your Gender',
            'age.required' => 'Please enter your age'
        ]);
        $hobbies = $req->input('hobby');
        $pic_name = $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/profile_pictures', $pic_name);
        return view('display_registeer', compact('req', 'hobbies'));
    }
}
