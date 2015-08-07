@extends("layouts.main")
@section("title", "Login")
@section("content")

<form method="POST" action="/auth/login" class="form-signin">
    {!! csrf_field() !!}

    <label for="username" class="sr-only">User Name</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required autofocus="true"/>
    <br>
    <label for="sifre" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
    <br>
    <input type="submit" id="girisYapSubmit" name="girisYapSubmit" value="Log in" class="btn btn-lg btn-mmm btn-block"/>
</form>

@endsection