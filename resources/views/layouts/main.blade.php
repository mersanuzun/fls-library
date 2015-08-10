<!DOCTYPE html>
<html>
    <head>
        <title>MSKU School of Foreign Languages - @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ URL::asset('/img/favicon.ico') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.vertical-tabs.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/sb-admin-2.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/main-page.css') }}">
    </head>
    <body>
        <div id="fls_header_bg" style="background-image: url({{ URL::asset('/img/page-header.JPG') }});"></div>
        <div id="top_menu">

        </div>
        <div id="main_menu">
            <nav class='nav navbar-mmm'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button> 
                    <a class='navbar-brand' href='/'>       
                        <span class='glyphicon glyphicon-book'></span>     
                    </a>
                </div>
                <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                    <ul class='nav navbar-nav'> 
                        <li><a href='/'><span class='glyphicon glyphicon-home'></span> Home </a></li>
                        <li><a href='/info'><span class='glyphicon glyphicon-info-sign'></span> Info</a></li>
                        <li><a href='/faq'><span class='glyphicon glyphicon-question-sign'></span> FAQ  </a></li> 
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <li>
                            <a href="/auth/login"> @if (session("username")) <span class="glyphicon glyphicon-user"></span> {{session("username")}} @else Login <span class="glyphicon glyphicon-log-in"></span> @endif </a>  
                        </li>
                    </ul>     
                </div>
            </nav>        
        </div>


        <div id="content_container">
            @yield('content') 
        </div>
        
        <!-- Footer Begin 
        <footer class="footer">
            <div class="container">
                <p class="text-center">&COPY; 2015 Muğla Sıtkı Koçman University Foreign Language School</p>
            </div>
        </footer><!-- Footer End -->
        
        <!-- Script Files Begin -->
        <script src="{{ URL::asset('/js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- Script Files End -->
    </body>
</html>
