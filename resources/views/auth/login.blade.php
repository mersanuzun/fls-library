@extends("layouts.main")
@section("title", "Login")
@section("content")
<div class="login">
    <form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Username
        <input type="text" name="username">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
    
</div>
@endsection