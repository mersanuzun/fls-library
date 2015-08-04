<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-min.css') }}">
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
                      <a href="/management/student"> Student Management </a>
                  </li>
                  <li>
                      <a href="/management/department"> Deparment Management </a>
                  </li>
                  <li>
                      <a href="/management/book"> Book Management </a>
                  </li>
              </ul>
               
               
          </div>
        </div>
    </body>
</html>