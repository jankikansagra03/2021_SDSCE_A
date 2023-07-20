<!DOCTYPE html>
<html lang="en">
@if (session('succ'))
    <p style="color:green;">{{ session('succ') }}</p>
@endif
@if (session()->has('err'))
    <p style="color:red;">{{ session('err') }}</p>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @foreach ($data as $d)
        @php
            $h = $d['hobbies'];
            $h1 = explode(',', $h);
        @endphp

        <form action="{{ URL::to('/') }}/EditFetchRegister" method="post" enctype="multipart/form-data">
            @csrf
            Enter Name: <input type="text" name="fn" id="fn1" value="{{ $d['fullname'] }}">
            <br>
            <span style="color:red">
                @error('fn')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Email: <input type="email" name="em" id="em1"value="{{ $d['email'] }}" readonly>
            <br>
            <span style="color:red">
                @error('em')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Password: <input type="password" name="pwd" id="pwd1" value="{{ $d['password'] }}">
            <br>
            <span style="color:red">
                @error('pwd')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Confirm Password: <input type="password" name="pwd_confirmation" id="cpwd1"
                value="{{ $d['password'] }}">
            <br>
            <span style="color:red">
                @error('pwd_confirmation')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Age: <input type="number" name="age" id="age1" value="{{ $d['age'] }}">
            <br>
            <span style="color:red">
                @error('age')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Mobile Number: <input type="tel" name="mobile" id="mobile" value="{{ $d['mobile'] }}">
            <br>
            <span style="color:red">
                @error('mobile')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Select Gender: <input type="radio" name="gender" id="gender1" value="Male"
                @if ($d['gender'] == 'Male') checked @endif /> Male
            <input type="radio" name="gender" id="gender2" value="Female"
                @if ($d['gender'] == 'Female') checked @endif /> Female
            <br>
            <span style="color:#ff0000">
                @error('gender')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Select your Hobby:
            <br>
            <input type="checkbox" name="hobby[]" id="hobby1" value="Playing Sports"
                @if (is_array($h1) && in_array('Playing Sports', $h1)) chec0ked @endif />Playing Sports
            <br>
            <input type="checkbox" name="hobby[]" id="hobby1" value="Reading"
                @if (is_array($h1) && in_array('Reading', $h1)) checked @endif />Reading
            <br>
            <input type="checkbox" name="hobby[]" id="hobby1" value="Cooking"
                @if (is_array($h1) && in_array('Cooking', $h1)) checked @endif />Cooking
            <br>
            <span style="color:red">
                @error('hobby')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Select your Qualification:
            <select name="qualification" id="qualification1">
                <option value="Under Graduate" @if ($d['qualification'] == 'Under Graduate') selected @endif>Under Graduate</option>
                <option value="Graduate" @if ($d['qualification'] == 'Graduate') selected @endif>Graduate</option>
                <option value="Post Graduate" @if ($d['qualification'] == 'Post Graduate') selected @endif>Post Graduate</option>
                <option value="Doctorate" @if ($d['qualification'] == 'Doctorate') selected @endif>Doctorate</option>
                <option value="Post Doctorate" @if ($d['qualification'] == 'Post Doctorate') selected @endif>
                    Post Doctorate
                </option>
            </select>
            <br>
            <span style="color:red">
                @error('qualification')
                    {{ $message }}
                @enderror
            </span>
            <br>
            Enter Your address
            <textarea name="address" id="address1">
        {{ $d['address'] }}
        </textarea>
            <br>...
            <span style="color:red">
                @error('address')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <img src="{{ URL::to('/') }}/images/profile_pictures/{{ $d['pic'] }}" height="100px"
                width="150px" />
            Select Profile Picture: <input type="file" name="pic" id="pic1" value="">
            <br>
            <span style="color:red">
                @error('pic')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <input type="submit" value="Register" name="reg" id="reg1">
        </form>
    @endforeach
    <br>
</body>

</html>
http://127.0.0.1:8000/edit_registration/
http://127.0.0.1:8000/EditFetchRegister
