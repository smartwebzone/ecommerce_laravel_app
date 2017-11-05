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
        <h2><i class="fa fa-book"></i>Online Store</h2>
        <div class="select-div">forgot password</div>
        <div class="please-select">Please enter your email ID and click 'Forgot Password'. We will send an email at your provided email address. Please check your INBOX and click on the reset password link. If you do not receive the email, please check your junk mailbox, else re-enter your email and click 'Forgot Password'.</div>
        @if(Session::has('error'))
        <div class="flash-message alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="flash-message alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="cf">
            {!! Form::open(['route' => 'forgot-password', 'method' => 'post', 'id' => 'forgot-password-form',  'name' => 'forgot-password-form', 'class' => 'loginForm cf']) !!}    
            <li class="form-group">
                <label>EMAIL ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('email', null, ['placeholder'=> 'PLEASE ENTER YOUR EMAIL ID', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('email', ':message') }}</span>
            </li>
            <li class="pt5">
                <button  type="submit" class="btn btnS"><i class="fa fa-link"></i>FORGOT PASSWORD</button>
                <button type="submit" style="display: none; text-align: left;" class="btn btnS text-left"><i class="fa fa-link"></i>FORGOT PASSWORD</button>
            </li>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection