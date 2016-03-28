<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>ECE Calls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="{{ asset('/css/bootstrap-cerulean.min.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/charisma-app.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.print.css') }}" media='print'>
    <link id="bs-css" href="{{ asset('/bower_components/chosen/chosen.min.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/bower_components/colorbox/example3/colorbox.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/bower_components/responsive-tables/responsive-tables.css') }}" rel="stylesheet">

    <link id="bs-css" href="{{ asset('/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/jquery.noty.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/noty_theme_default.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/elfinder.min.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/elfinder.theme.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/jquery.iphone.toggle.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/uploadify.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
    <link id="bs-css" href="{{asset('/css/select2.css')}}" rel="stylesheet" />
    <link id="bs-css" href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="{{ asset('/bower_components/jquery/jquery.min.js') }}"></script>
    <!-- The styles -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/logo_ece.png">

</head>

<body>
   <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home"> <img alt="Charisma Logo" src="img/ece_logo.jpg" class="hidden-xs"/>
                <span>ECE Calls</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{ Auth::user()->fname }}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->
        </div>
    </div>
    <!-- topbar ends -->



<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="doctors"><i class="fa fa-user-md"></i><span> Doctors</span></a>
                        </li>
                        <li><a class="ajax-link" href="institutions"><i class="glyphicon glyphicon-tower"></i><span> Institutions</span></a>
                        </li>
                        <li><a class="ajax-link" href="plans"><i class="glyphicon glyphicon-calendar"></i><span> Coverage Plans</span></a>
                        </li>
                        <li><a class="ajax-link" href="products"><i class="glyphicon glyphicon-qrcode"></i><span> Products</span></a>
                        </li>
                        <li><a class="ajax-link" href="material_inventory"><i class="fa fa-cube"></i><span> Material Inventories</span></a>
                        </li>
                        <li><a class="ajax-link" href="employees"><i class="glyphicon glyphicon-user"></i><span> Employees</span></a>
                        </li>
                        <li><a class="ajax-link" href="reports"><i class="glyphicon glyphicon-file"></i><span> Reports</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <!--bread-->
    <!--ul class="breadcrumb">
        <li>Home</li>
        <li>Dashboard</li>
    </ul-->
</div>









@yield('content') 

    

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">ECE Marketing</a> 2016</p>
        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>
        @if(Session::has("flash_message"))
                <script type="text/javascript">
                    $("div.alert").not(".alert-important").delay(5000).slideUp(function(){
                        $(this).remove();
                    });
                </script>
        @endif
</div>
 <!--/.fluid-container-->

<!-- external javascript -->
<script src="{{ asset('/css/select2.min.js') }}"></script>
<script src="{{ asset('/css/select2.js') }}"></script>

<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- library for cookie management -->
<script src="{{ asset('/js/jquery.cookie.js') }}"></script>
<!-- calender plugin -->
<script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<!-- data table plugin -->
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<!-- select or dropdown enhancer -->
<script src="{{ asset('/bower_components/chosen/chosen.jquery.min.js') }}"></script>
<!-- plugin for gallery image view -->
<script src="{{ asset('/bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<!-- notification plugin -->
<script src="{{ asset('/js/jquery.noty.js') }}"></script>
<!-- library for making tables responsive -->
<script src="{{ asset('/bower_components/responsive-tables/responsive-tables.js') }}"></script>
<!-- tour plugin -->
<script src="{{ asset('/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
<!-- star rating plugin -->
<script src="{{ asset('/js/jquery.raty.min.js') }}"></script>
<!-- for iOS style toggle switch -->
<script src="{{ asset('/js/jquery.iphone.toggle.js') }}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{ asset('/js/jquery.autogrow-textarea.js') }}"></script>
<!-- multiple file upload plugin -->
<script src="{{ asset('/js/jquery.uploadify-3.1.min.js') }}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{ asset('/js/jquery.history.js') }}"></script>
<!-- application script for Charisma demo -->
<script src="{{ asset('/js/charisma.js') }}"></script>
<script src="{{ asset('/js/uret.js') }}"></script>
<script src="{{ asset('/js/fn.uret.js') }}"></script>
<!--script src="{{asset('/js/autocomplete.js')}}"></script!-->

</body>
</html>
