<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('/css/master-page.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/librarian-page.css') }}">

    </head>
    <body>
        <div class="container">
          <div class="content">
            @yield('content')  
          </div>
          <div class="menu">
              <ul >
                  <li>
                      <a href="/management/librarian">Main Page</a>
                  </li>
                  <li>
                     <a href="/management/librarian/circulation">Circulation</a>       
                  </li>
                  <li>
                      <a href="/auth/logout"> Logout </a>
                  </li>
              </ul>
               
               
          </div>
        </div>
    </body>
</html>