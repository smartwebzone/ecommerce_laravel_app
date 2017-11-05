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

@section('header_styles')@endsection


@section('content')
<!-- Start Wrapper -->
<div class="wrapper content cf">
	<!-- Start Select School -->
    <div class="enquire login-register cf">
    	@include('frontend.layout.jeevandeep.header')
        <div class="select-div">Validate your email</div>
        <div class="please-select">We have sent an email at your provided email address. Please check your INBOX and click on the validation link. If you did not receive the email, please check your junk mailbox, else click on the resend validation email button.</div>
        <div class="cf">
            <form class="loginForm cf">
                <li class="resend"><a href="{{url('/signin')}}" class="btn btnS"><i class="fa fa-link"></i>RESEND VALIDATION EMAIL</a>
                	<button type="submit" style="display: none" class="btn btnS"><i class="fa fa-link"></i>RESEND VALIDATION EMAIL</button></li>
                <li class="validate-forgot forgot" style="padding-left: 35px; width: auto; text-align: left;"><i class="fa fa-link"></i><a href="{{url('/profile')}}">Proceed to Create Profile</a></li>
                
            </form>
        </div>
        <div class="italic">Proceed to create profile is just a placeholder button for this walkthrough</div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection