Name:: {{ $req['fn'] }}
<br>
Email:: {{ $req['em'] }}
<br>
Age:: {{ $req['age'] }}
<br>
Mobile Number:: {{ $req['mobile'] }}
<br>
Gender:: {{ $req['gender'] }}
<br>
Hobbies::
@foreach ($hobbies as $h1)
    {{ $h1 }},
@endforeach

<br>
Password:: {{ $req['pwd'] }}
<br>
Confirm Password:: {{ $req['pwd_confirmation'] }}
<br>
Quallification:: {{ $req['qualification'] }}
<br>
Address:: {{ $req['address'] }}
<br>
