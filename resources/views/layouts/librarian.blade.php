<html>
    <head>
        <title>@yield('title')</title>
<<<<<<< HEAD:resources/views/layouts/master.blade.php
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('/css/master-page.css') }}">
=======
        <link rel="stylesheet" href="{{ URL::asset('/css/librarian-page.css') }}">
>>>>>>> 93c923903861d1210d313dfff1b528cdb49be7dc:resources/views/layouts/librarian.blade.php
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
                      <a href="/auth/login"> Login </a>
                  </li>
              </ul>
               
               
          </div>
        </div>
    </body>
</html>