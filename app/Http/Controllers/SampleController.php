<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function fetch_data_register(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:30',
            'em' => 'required',
            'pwd' => 'required|min:10|max:16|confirmed',
            'pwd_confirmation' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
            'address' => 'required',
            'hobby' => 'required',
            'pic' => 'required|size:36000|mimes:jpg,png,gif,bmp',
            'mobile' => 'required|numeric|length:10'

        ], [
            'fn.required' => 'Firstname cannot be empty',
            'fn.min' => 'Firstname must have more than 3 characters',
            'fn.max' => 'Firstname cannot have morethan 30 characetsr'
        ]);
        $hobbies = $req->input('hobby');
        return view('display_registeer', compact('req', 'hobbies'));
    }
}
