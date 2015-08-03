<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/master-page.css') }}">
    </head>
    <body>
        <div class="container">
          <div class="content">
            @yield('content')  
          </div>
          <div class="menu">
               <a href="/management/admin">Main Page</a>
               <a href="/management/admin/user-management">User Management</a>
          </div>
        </div>
    </body>
</html>