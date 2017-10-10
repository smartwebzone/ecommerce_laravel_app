<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />


        @include('frontend/layout/parts/default-styles')
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        @yield('header_styles')

        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" type="text/css" href="{!! asset('/frontend/important.css') !!}">

        <link rel="stylesheet" href="{!! asset('/frontend/css/responsive.css') !!}" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <script type="text/javascript" src="{!! asset('/assets/js/jquery/jquery.min.js') !!}"></script>
        <!-- Document Title 	============================================= -->
        <title>@yield('title', 'Secure User Account Area')</title>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5VC635P');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body class=" @yield('bodytag') stretched">
    @include('googletagmanager::script')
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VC635P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div id="wrapper" class="clearfix">

            <!-- Header ============================================= -->
            @include('frontend/layout/partials/header/header',[$cart,$total,$user])

            @yield('content')
            <!-- Footer ============================================= -->
            <footer id="footer" class="dark">
                <div class="container">
                    @include('frontend.layout.partials.footer.footer-widgets')
                </div>
                <!-- Copyrights ============================================= -->
                <div id="copyrights">
                    @include('frontend.layout.partials.footer.copyr')
                </div><!-- #copyrights end -->
            </footer><!-- #footer end -->
        </div><!-- #wrapper end -->
        <!-- Go To Top ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>
        @include('frontend/layout/parts/default-scripts')



<script type="text/javascript">
    $(document).ready(function(){
        var hash = document.location.hash;
        if (hash) {
            $('a[href="'+hash+'"].ui-tabs-anchor').click();
        }
        if($(".ui-tabs").length){
 $(".ui-tabs").tabs({
        activate: function(event, ui) {
             history.pushState(null, null,  "#"+ui.newPanel.attr('id'));
        }
    });
        }
    });
    $(window).on('hashchange', function() {
  var hash = document.location.hash;
        if (hash) {
            $('a[href="'+hash+'"].ui-tabs-anchor').click();
        }
});
</script>
</body>
</html>
