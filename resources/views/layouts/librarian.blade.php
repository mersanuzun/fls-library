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
        <link rel="stylesheet" href="{{ URL::asset('/css/librarian-page.css') }}">
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
                    <a class="navbar-brand" href="/auth/login">MSKU School of Foreign Languages - Librarian</a>
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
                                <a href="/auth/login"><i class="fa fa-home fa-fw"></i> Home </a>
                            </li>
                            <li>
                                <a href="/management/librarian/circulation"><i class="fa fa-refresh fa-fw"></i> Circulation </a>
                            </li>
                            <li>
                                <a href="/management/student"><i class="fa fa-graduation-cap fa-fw"></i> Student Management <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/management/student"><i class="fa fa-list-ul"></i> Student List </a>
                                    </li>
                                    <li>
                                        <a href="/management/student/add"><i class="fa fa-plus-square"></i> Add Student </a>
                                    </li>
                                    <li>
                                        <a href="/management/department"><i class="fa fa-list-ul"></i> Department List </a>
                                    </li>
                                    <li>
                                        <a href="/management/department/add"><i class="fa fa-plus-square"></i> Add Department </a>
                                    </li>
                                </ul> <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="/management/book"><i class="fa fa-book fa-fw"></i> Book Management <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/management/book"><i class="fa fa-list-ul"></i> Book List </a>
                                    </li>
                                    <li>
                                        <a href="/management/book/add"><i class="fa fa-plus-square"></i> Add Book </a>
                                    </li>
                                    <li>
                                        <a href="/management/booklevel"><i class="fa fa-list-ul"></i> Book Level List </a>
                                    </li>
                                    <li>
                                        <a href="/management/booklevel/add"><i class="fa fa-plus-square"></i> Add Book Level </a>
                                    </li>
                                </ul> <!-- /.nav-second-level -->
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

        </div><!-- /#wrapper -->

        <!-- Script Files Begin -->
        <script src="{{ URL::asset('/js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/metisMenu.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/sb-admin-2.js') }}" type="text/javascript"></script>
        <!-- Script Files End -->
    </body>
</html>