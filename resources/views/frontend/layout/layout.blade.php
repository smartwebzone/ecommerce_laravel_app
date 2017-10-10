<!DOCTYPE html>
<html dir="ltr" lang="en-US" @yield('htmlschema')>
<head>

	<!-- Document Title
	============================================= -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="{!! url('favicon.ico') !!}">
		<link rel="canonical" href="{!! Request::url() !!}" />
                <title>@yield('title', 'Jeevandeep Prakashan Pvt. Ltd.')  </title>

		<meta property="og:url"             content="{!! Request::url() !!}" />
		@yield('seo')

		<meta property="og:image" content="{!! asset('/frontend/images/grace-logo.png') !!}">
		<meta name="googlebot" content="index, follow">
		<meta name="robots" content="index, follow">

	
		@yield('json-ld')

	
		@include('frontend/layout/parts/default-styles')
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		@yield('header_styles')
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

		<!-- start: CSS REQUIRED FOR REV SLIDER -->
		@yield('revcss')
		<!-- end: CSS REQUIRED FOR REV SLIDER -->

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="profile" href="http://microformats.org/profile/specs" />
		<link rel="profile" href="http://microformats.org/profile/hatom" />
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		<script type="text/javascript" src="{!! asset('/assets/js/jquery/jquery.min.js') !!}"></script>

		<script type="text/javascript" src="{!! asset('frontend/js/prettify_js-bundle.js') !!}"></script>
		<!-- Document Title 	============================================= -->



</head>

<body class="no-transition side-push-panel stretched" @yield('bodyschema')>



    <div id="wrapper" class="clearfix">

    <div class="body-overlay"></div>

		

	@include('frontend.layout.partials.header.top-bar')
	@include('frontend.layout.partials.header.header')
	   	{{-- @yield('header') --}}

	    @yield('submenu')
		@yield('slider')
		@yield('intro')
		@yield('page-title')
		@yield('sidebar')
	    <!-- Content ============================================= -->
	 
		@yield('content')
		<!-- Footer ============================================= -->
		
				@include('frontend.layout.partials.footer.footer-widget')
			
			
				@include('frontend.layout.partials.footer.copyr')
			
		</footer><!-- #footer end -->
	</div><!-- #wrapper end -->
    <!-- Go To Top ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>


@yield('footer_scripts')

@yield('pp_footer_scripts')

<!-- start: JS REQUIRED FOR REV SLIDER -->
@yield('revjs')
<!-- end: JS REQUIRED FOR REV SLIDER -->

<script type="text/javascript">
    (function($){
		@yield('inlinejs')
    })(jQuery);
</script>

</body>
</html>
