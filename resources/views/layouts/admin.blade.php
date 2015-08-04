<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/admin-page.css') }}">
    </head>
    <body>
        <div class="row" id="dynamic-content">
            <div class="container">
                <div class="menu">
                    <a href="/management/admin">Main Page</a>
                    <a href="/management/admin/user-management">User Management</a>
                    <a href="/management/admin/reports">Reports</a>
                </div>
            </div>
        </div>

        <div class="row" id="dynamic-content">
            <div class="container">
                <div class="main">
                    @yield('content')
                </div><!-- .main sonu -->  
            </div><!-- .container sonu -->
        </div><!-- .row sonu -->
    </body>
</html>