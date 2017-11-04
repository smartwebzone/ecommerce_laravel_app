@extends('frontend/layout/layout')


@section('seo')
<meta name="description" content="Reset Password">
<meta name="keywords" content="Reset Password">
<meta name="author"content="Jeevandeep"/>
@endsection

@section('jsonschema')@endsection

@section('title')
Reset Password | Jeevandeep
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
        <h1>Reset Password</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(getLang().'/') }}">Home</a></li>
            <li class="active">Reset Password</li>
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
            <div class="nobottommargin">
                {!! Form::open(['route' => ['forgot.password.confirm.post',$userId,$passwordResetCode],  'id' => 'forgot-form',  'name' => 'forgot-form', 'class' => 'nobottommargin',  'method' => 'post']) !!}
                <!-- Password -->
                <div class="col_half {!! $errors->has('password') ? 'has-error' : '' !!}">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        {!! Form::password('password', array('class'=>'form-control', 'id' => 'password')) !!}
                        @if ($errors->first('password'))
                        <span class="errormsg">{!! $errors->first('password') !!}</span>
                        @endif
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="col_half {!! $errors->has('password_confirm') ? 'has-error' : '' !!}">
                    <label class="control-label" for="password_confirm">Confirm Password</label>
                    <div class="controls">
                        {!! Form::password('password_confirm', array('class'=>'form-control', 'id' => 'password_confirm')) !!}
                        @if ($errors->first('password_confirm'))
                        <span class="errormsg">{!! $errors->first('password_confirm') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col_full nobottommargin">
                    {!! Form::submit('Submit', ['class' => 'button button-3d button-black nomargin']) !!}
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
