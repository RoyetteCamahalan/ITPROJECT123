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

    <link id="bs-css" href="{{ asset('/css/styles.css') }}" rel="stylesheet">

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
@yield('content')
 <!--/.fluid-container-->

<!-- external javascript -->
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

</body>
</html>
