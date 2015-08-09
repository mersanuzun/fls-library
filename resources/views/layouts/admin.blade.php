<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/timeline.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/sb-admin-2.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/admin-page.css') }}">
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/auth/login"> MSKU School of Foreign Languages - Admin Dashboard </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/"><i class="fa fa-university fa-fw"></i> Library </a>
                    </li>
                    <li>
                        <a href="/auth/logout"> Logout <i class="fa fa-sign-out fa-fw"></i></a>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="/auth/login"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                            </li>
                            <li>
                                <a href="/management/admin/user-management"><i class="fa fa-user fa-fw"></i> User Management <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/management/admin/user-management"><i class="fa fa-list-alt"></i> User List </a>
                                    </li>
                                    <li>
                                        <a href="/management/admin/user-management/add"><i class="fa fa-plus-square"></i> Add User </a>
                                    </li>
                                </ul> <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="/management/admin/reports"><i class="fa fa-files-o fa-fw"></i> Reports </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                @yield('content') 
            </div><!-- /#page-wrapper -->





        </div><!-- /#page-wrapper -->

        <!-- Script Files Begin -->
        <script src="{{ URL::asset('/js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/metisMenu.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/sb-admin-2.js') }}" type="text/javascript"></script>
        <!-- Script Files End -->
    </body>
</html>