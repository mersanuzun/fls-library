<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/librarian-page.css') }}">
    </head>
    <body>
        <div class="container">
          <div class="content">
            @yield('content')  
          </div>
          <div class="menu">
               <a href="/management/librarian">Main Page</a>
               <a href="/management/librarian/circulation">Circulation</a>
          </div>
        </div>
    </body>
</html>