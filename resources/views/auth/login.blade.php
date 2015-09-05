<!DOCTYPE html>
<html>
    <head>
        <title>MSKU School of Foreign Languages - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ URL::asset('/img/favicon.ico') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    </head>
    <body>
        <div class="container">

            <form method="POST" action="/auth/login" class="form-signin">
                {!! csrf_field() !!}
                <h2 class="form-signin-heading">Please log in to continue</h2>
                <label for="username" class="sr-only">User Name</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required autofocus/>

                <label for="sifre" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>

                <input type="submit" id="girisYapSubmit" name="girisYapSubmit" value="Log in" class="btn btn-lg btn-mmm btn-block"/>
            </form>

        </div> <!-- /container --> 
    </body>
</html>