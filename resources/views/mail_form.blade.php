<form action="{{ URL::to('/') }}/send_email" method="post">
    @csrf
    Name: <input type="text" name="fn" id="fn1">
    <br>
    Email: <input type="email" name="em" id="em1">
    <br>
    <input type="submit" value="Send Mail">
</form>
