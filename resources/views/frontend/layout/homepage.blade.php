@extends('frontend/layout/layout')

@section('htmlschema')
itemscope itemtype="http://schema.org/LocalBusiness
@endsection

@section('seo')
@endsection

@section('json-ld')
@endsection

@section('goodrelations-off')
@endsection

@section('title')
Jeevandeep Prakashan Pvt. Ltd.
@endsection

@section('bodyschema')@endsection
@section('bodytag')@endsection

@section('header_styles')
<link rel="shortcut icon" type="image/x-icon" href="images/jeevandeep-favicon.ico">
<link rel="stylesheet" href="{!! asset('/frontend/styles.css') !!}" type="text/css" />
<link rel="stylesheet" href="{!! asset('/frontend/developer.css') !!}" type="text/css" />
@endsection


@section('content')
 <!-- Start Banner -->
<div class="banner">
	<div class="wrapper cf">
		<div class="learning">
			LEARNING GIVES CREATIVITY CREATIVITY LEADS TO THINKING THINKING PROVIDES KNOWLEDGE KNOWLEDGE MAKES YOU GREAT
 			<span>― A.P.J. Abdul Kalam</span>
		</div>
	</div>
</div>
<!-- End Banner -->
<!-- Start Know More About -->
<div class="know-more-about">
	<div class="wrapper cf">
		<div class="know-left">
			Jeevandeep believes in creating a world where knowledge and creativity play a central role. We believe in making education in-depth, innovative and interactive. By nurturing and enlightening the young minds of today, we want to create thinkers and doers who will help build a brighter and better tomorrow.
		</div>
		<div class="know-right">
			<a href="#">Know more About Us<i class="fa fa-users"></i></a>
		</div>
	</div>
</div>
<!-- End Know More About -->
<!-- Start Wrapper -->
<div class="pr">
	<div class="jeevandeep-bg"></div>
	<div class="wrapper cf">
		<!-- Start Latest Publications -->
		<div class="publication">
			<h1>Our Latest Publications</h1>
			<ul class="cf">
				<li><img src="{!! asset('/frontend/') !!}/images/icse%20lab%20manual%20cum%20practical%20record%20physics%209.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/icse%20lab%20manual%20cum%20practical%20record%20chemistry%2010.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/lets%20discover%20eng%20literature%20reader%208.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/lets%20discover%20science%207%20cover.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/discover%20geography%208%20new.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/discover%20history%207%20new.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/discover%20mathematics%206%20cover%202017.jpg" alt=""></li>
				<li><img src="{!! asset('/frontend/') !!}/images/discover%20soc%20-%20political%206%20new.jpg" alt=""></li>
			</ul>
		</div>	
		<!-- End Latest Publications -->
		<!-- Start Our Products -->
		<div class="our-product">
			<h1><a href="what-we-do.html">Our Products</a></h1>
			<ul class="cf">
				<li><div class="product-box">
						<span><img src="{!! asset('/frontend/') !!}/images/publication.svg" width="84" height="52" alt=""></span>
						<h4><a href="what-we-do.html">Publications</a></h4>
						<p>Jeevandeep books are a hallmark of the greatest quality in education.</p>
					</div>
				</li>
				<li><div class="product-box">
						<span><img src="{!! asset('/frontend/') !!}/images/elearning.svg" width="34" height="58" alt=""></span>
						<h4><a href="what-we-do.html">E-Learning</a></h4>
						<p>Being digitally empowered is the new way of life. At Jeevandeep, we embrace this notion.</p>
					</div>
				</li>
				<li><div class="product-box">
						<span><img src="{!! asset('/frontend/') !!}/images/stationery.svg" width="54" height="33" alt=""></span>
						<h4><a href="what-we-do.html">Stationery</a></h4>
						<p>We collaborate with a lot of schools across India to create bespoke notebooks.</p>
					</div>
				</li>
			</ul>
		</div>	
		<!-- End Our Products -->
		<!-- Start Team -->
		<div class="team-jeevandeep cf">
			<div class="team-jeevandeep-left">
				<h1>From Team Jeevandeep</h1>
				We aspire to educate, enlighten, and enable the youth to seek and spread the power of knowledge. We believe that by providing quality educational and knowledge tools to the children of today, we create well-informed citizens, who are tolerant of one another, capable of applying logic, innovating ideas and becoming stalwarts of the upcoming generation.
			</div>
			<div class="team-jeevandeep-right">
				<ul class="cf">
					<li><i class="fa fa-caret-right"></i>EDUCATION SPARKS IMAGINATION</li>
					<li><i class="fa fa-caret-right"></i>EDUCATION LEADS TO CREATIVITY</li>
					<li><i class="fa fa-caret-right"></i>EDUCATION ENLIGHTENS THE MIND</li>
					<li><i class="fa fa-caret-right"></i>EDUCATION EMPOWERS THE NATION</li>
				</ul>
			</div>
		</div>
		<!-- End Team -->
	</div>
</div>
<!-- End Wrapper -->

@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection
