<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/main-page.css') }}">
    </head>
    <body>
        <div class="container">
          <div class="content">
            @yield('content')  
          </div>
          <div class="menu">
               <a href="/">Main Page</a>
               <a href="/faq">FAQ</a>
               <a href="/login">Log in</a>
          </div>
        </div>
    </body>
</html>