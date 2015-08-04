<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/main-page.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <a href="/">Main Page</a>
                <a href="/faq">FAQ</a>
                <a href="/auth/login">
                    @if (session("username")) 
                        {{session("username")}}
                    @else
                        Login
                    @endif
                </a>
            </div>

            <div class="content">
                @yield('content')  
            </div>

        </div>
    </body>
</html>