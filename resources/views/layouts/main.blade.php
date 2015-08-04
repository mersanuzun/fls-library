<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/main-page.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <a href="/">Main Page</a>
                <a href="/faq">FAQ</a>
                <a href="/login">Log in</a>
            </div>

            <div class="content">
                @yield('content')  
            </div>

        </div>
    </body>
</html>