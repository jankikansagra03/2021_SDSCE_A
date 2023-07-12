<table border="1">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Age</th>
        <th>Mobile</th>
        <th>Gender</th>
        <th>Hobby</th>
        <th>Qualification</th>
        <th>Address</th>
        <th>profile_picture</th>
        <th>Role</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $d)
        <tr>
            <td>{{ $d['fullname'] }}</td>
            <td>{{ $d['email'] }}</td>
            <td>{{ $d['password'] }}</td>
            <td>{{ $d['age'] }}</td>
            <td>{{ $d['mobile'] }}</td>
            <td>{{ $d['gender'] }}</td>
            <td>{{ $d['hobby'] }}</td>
            <td>{{ $d['qualification'] }}</td>
            <td>{{ $d['address'] }}</td>
            <td><img src="Images/profile_pictures/{{ $d['pic'] }}" alt="" height="100px" width="100px"> </td>
            <td>{{ $d['role'] }}</td>
            <td>{{ $d['status'] }}</td>
            <td><a href="edit_registration/{{ $d['email'] }}"><input type="button" value="Edit"></a></td>
            <td><a href="delete_registration/{{ $d['email'] }}"><input type="button" value="Delete"></a< /td>
            <td>
                @if ($d['status'] == 'Active')
                    <a href="deactivate_user/{{ $d['email'] }}"><input type="button" value="Deactivate"></a>
                @else
                    <a href="activate_user/{{ $d['email'] }}"><input type="button" value="Activate"></a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
