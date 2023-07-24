<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\File;

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
            'pic' => 'required|max:300|mimes:jpg,png,gif,bmp'

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
        $h = "";
        foreach ($req->hobby as $a) {
            $h = $h . $a . ",";
        }
        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/profile_pictures', $pic_name);
        $reg = new Registration();
        $reg->fullname = $req->fn;
        $reg->email = $req->em;
        $reg->password = $req->pwd;
        $reg->mobile = $req->mobile;
        $reg->gender = $req->gender;
        $reg->qualification = $req->qualification;
        $reg->age = $req->age;
        $reg->hobbies = $h;
        $reg->address = $req->address;
        $reg->pic = $pic_name;
        if ($reg->save()) {
            session()->flash('succ', 'Data saved successfully');
        } else {
            session()->flash('err', 'error in saving data');
        }
        return view('register');
    }
    public function fetch_registration_data()
    {
        $data = Registration::select()->get();
        return view('Display_registration', compact('data'));
    }
    public function edit_registered_user($email)
    {
        $data = Registration::where('email', $email)->get();
        return view('display_data_for_edit', compact('data'));
    }
    public function update_registration(Request $req)
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
            'pic' => 'max:300|mimes:jpg,png,gif,bmp'

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
            'pic.max' => 'Select a file of max 25 KB',
            'pic.mimes' => 'Select jpg or png or bmp file to uplaod',
            'hobby.required' => 'Please select a hobby',
            'qualification.required' => 'Please select a qualification',
            'address.required' => 'Address field cannot be empty',
            'gender.required' => 'Please select your Gender',
            'age.required' => 'Please enter your age'
        ]);
        $h = implode(",", $req->hobby);

        $result = Registration::where('email', $req->em)->first();
        if ($req->hasFile('pic')) {

            $file_name = "images/profile_pictures/" . $result['pic'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }

            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/profile_pictures/', $pic_name);
            $result->where('email', $req->em)->update(array('fullname' => $req->fn, 'password' => $req->pwd, 'mobile' => $req->mobile, 'age' => $req->age, 'gender' => $req->gender, 'hobbies' => $h, 'qualification' => $req->qualification, 'address' => $req->address, 'pic' => $pic_name));
        } else {
            $result->where('email', $req->em)->update(array('fullname' => $req->fn, 'password' => $req->pwd, 'mobile' => $req->mobile, 'age' => $req->age, 'gender' => $req->gender, 'hobbies' => $h, 'qualification' => $req->qualification, 'address' => $req->address));
        }
        return redirect('Fetch_Registration');
    }
    public function delete_user_registration($email)
    {
        $result = Registration::where('email', $email)->update(array('status' => 'deleted'));
        if ($result) {
            return $this->fetch_registration_data();
        }
    }
    public function deactivate_user($email)
    {
        $result = Registration::where('email', $email)->update(array('status' => 'Inactive'));
        if ($result) {
            return $this->fetch_registration_data();
        }
    }
    public function activate_user($email)
    {
        $result = Registration::where('email', $email)->update(array('status' => 'Active'));
        if ($result) {
            return $this->fetch_registration_data();
        }
    }
    public function reactivate_user($email)
    {
        
    }
}
