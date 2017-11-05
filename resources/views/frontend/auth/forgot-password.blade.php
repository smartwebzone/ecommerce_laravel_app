@extends('frontend/layout/layout')


@section('seo')
    <meta name="description" content="Forgot Password">
    <meta name="keywords" content="Forgot Password, Reset Password, Password Assistance, Forgot Account">
    <meta name="author"content="Jeevandeep"/>
@endsection

@section('jsonschema')@endsection

@section('title')
Forgot Password | Jeevandeep
@endsection

@section('bodyschema')@endsection

@section('header_styles')
<style type="text/css">
    .content-wrap { position: relative; padding: 50px 0; }
</style>
@endsection

@section('scripts')@endsection

@section('ppscripts')

@endsection

@section('submenu')

@endsection




@section('page-title')
<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Forgot Password</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(getLang().'/') }}">Home</a></li>
            <li class="active">Forgot Password</li>
        </ol>
    </div>
</section><!-- #page-title end -->
@endsection

@section('content')
<!-- Content
============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
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
                    <div class="nobottommargin">
                    {!! Form::open(['route' => 'forgot.password.post',  'id' => 'forgot-form',  'name' => 'forgot-form', 'class' => 'nobottommargin',  'method' => 'post']) !!}
                            <p>Enter the email address associated with your Jeevandeep account.</p>
                            <div class="col_half {{ $errors->first('email', 'has-error') }}">
                                <label for="email">Email Address:</label>
                                {!! Form::email('email', NULL, ['class' => 'form-control','id' => 'email']) !!}
                                 <span class="errormsg">{{ $errors->first('email', ':message') }}</span>
                            </div>

                            <div class="clear"></div>
                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Reset Password</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section><!-- #content end -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection
