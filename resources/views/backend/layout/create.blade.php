<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <title>Jeevandeep Admin</title>
    <link rel="shortcut icon" href="{!! asset('/clip/favicon.ico') !!}" />
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="The new jeevandeep company custom management suite" name="description" />
    <link rel="canonical" href="{!! url() !!}" />

    <!-- end: META -->
    <!-- start: MAIN CSS -->
    {{--@include('backend.layout.partials.default-styles')--}}

    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/font-awesome/css/font-awesome.min.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/fonts/clip-font.min.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/iCheck/skins/all.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/sweetalert/dist/sweetalert.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main.min.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main-responsive.min.css') !!}" />
    <link type="text/css" rel="stylesheet" media="print" href="{!! asset('/clip/assets/css/print.min.css') !!}" />
    <link type="text/css" rel="stylesheet" id="skin_color" href="{!! asset('/clip/assets/css/theme/light.min.css') !!}" />
        <!-- end: MAIN CSS -->

        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"> --}}
        {{-- <link rel ="stylesheet" href="{!! asset('/clip/assets/plugins/bootstrap/css/bootstrap.min.css') !!}"> --}}

        {{-- <link rel="stylesheet" href="{!! asset('/clip/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}" type="text/css" /> --}}
        <link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
        <link rel="stylesheet" href="{!! asset('/clip/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') !!}">
        <link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/ladda-bootstrap/dist/ladda-themeless.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-social/bootstrap-social.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') !!}" rel="stylesheet" />








        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

        <!-- end: MAIN CSS -->
        <style>
            .panel-body{padding:15px!important;} .panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px;} .panel-heading{background-color:#F5F4F9;background-image:linear-gradient(to bottom,#F5F4F9 0%,#ECEAF3 100%);background-repeat:repeat-x;border-bottom:1px solid #CDCDCD;border-radius:6px 6px 0 0;box-shadow:0 1px 0 #FFFFFF inset;height:36px;padding-left:40px!important;position:relative;} .panel-default>.panel-heading{color:#333;background-color:#f5f5f5;border-color:#ddd;}
        </style>
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        @yield('topcss')
        @yield('topscripts')
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="{!! asset('/clip/assets/css/important.css') !!}">
        <!--[if gte IE 9]><!-->
        <script type="text/javascript" src="{!! asset('/clip/bower_components/jquery/dist/jquery.min.js') !!}"></script>
        <!--<![endif]-->
        @yield('topjs')
    </head>
    <body>
        <!-- start: HEADER -->
        @include('backend.layout.partials.header')
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                @if(!Sentinel::inRole('dealer'))
                @include('backend.layout.clip-sidebar')
                @else
                @include('backend.layout.clip-sidebardealer')
                @endif
                <!-- end: SIDEBAR -->
            </div>

            <!-- start: PAGE -->
            <div class="main-content">
                @yield('modal')
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            @yield('pagetitle')
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    @yield('content')
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->

        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2017 &copy; Jeevandeep Admin .
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <!-- start: RIGHT SIDEBAR -->
        {{--@include('backend.layout.partials.rightsidebar')--}}
        <!-- end: RIGHT SIDEBAR -->
        @yield('eventmodal')


        <!--[if lt IE 9]>
        <script src="{!! asset('/clip/bower_components/respond/dest/respond.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/Flot/excanvas.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery-1.x/dist/jquery.min.js') !!}"></script>
        <![endif]-->
        <script type="text/javascript" src="{!! asset('/clip/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/blockUI/jquery.blockUI.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/iCheck/icheck.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/jquery.cookie/jquery.cookie.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/bower_components/sweetalert/dist/sweetalert.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('/clip/assets/js/min/main.min.js') !!}"></script>

                @if(Request::url(getLang() . '/admin'))

                @endif

        <script src="{!! asset('/clip/jasny-bootstrap/js/jasny-bootstrap.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/moment/min/moment.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/autosize/dist/autosize.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/select2/dist/js/select2.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery-maskmoney/dist/jquery.maskMoney.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.tagsinput/src/jquery.tagsinput.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/summernote/dist/summernote.min.js') !!}"></script>
        <script src="{!! asset('/clip/assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/ckeditor/ckeditor.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/ckeditor/adapters/jquery.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/fileinput.min.js') !!}"></script>
        <script src="{!! asset('/clip/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.pulsate/jquery.pulsate.min.js') !!}"></script>


        <script src="{!! asset('/clip/assets/js/bootstrap-toggle.min.js') !!}" type="text/javascript" charset="utf-8"></script>

        <script src="{!! asset('/clip/assets/js/min/form-elements.min.js') !!}"></script>
       @yield('bottomscripts')

        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();




                @yield('clipinline')
                @yield('js_init')
            });
        </script>
        <script src="{!! asset('/frontend/js/plugins.js') !!}"></script>
        <script src="{!! asset('/frontend/js/functions.js') !!}"></script>

    </body>

    </html>
