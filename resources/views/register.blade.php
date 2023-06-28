<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="FetchRegister" method="post" enctype="multipart/form-data">
        @csrf
        Enter Name: <input type="text" name="fn" id="fn1">
        <br>
        <span style="color:red">
            @error('fn')
                {{ $message }}
            @enderror
        </span>
        <br>
        Enter Email: <input type="email" name="em" id="em1">
        <br>

        <br>
        Enter Password: <input type="password" name="pwd" id="pwd1">
        <br>

        <br>
        Enter Confirm Password: <input type="password" name="pwd_confirmation" id="cpwd1">
        <br>

        <br>
        Enter Age: <input type="number" name="age" id="age1">
        <br>

        <br>
        Enter Mobile Number: <input type="tel" name="mobile" id="mobile">
        <br>

        <br>
        Select Gender: <input type="radio" name="gender" id="gender1" value="Male" /> Male
        <input type="radio" name="gender" id="gender2" value="Female" /> Female
        <br>

        <br>
        Select your Hobby:
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Playing Sports" />Playing Sports
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Reading" />Reading
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="Cooking" />Cooking
        <br>

        <br>
        Select your Qualification:
        <select name="qualification" id="qualification1">
            <option value="Under Graduate">Under Graduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Post Graduate">Post Graduate</option>
            <option value="Doctorate">Doctorate</option>
            <option value="Post Doctorate">Post Doctorate</option>
        </select>
        <br>

        <br>
        Enter Your address
        <textarea name="address" id="address1">

        </textarea>
        <br>

        <br>
        Select Profile Picture: <input type="file" name="pic" id="pic1">
        <br>

        <br>
        <input type="submit" value="Register" name="reg" id="reg1">
    </form>
    <br>
</body>

</html>
