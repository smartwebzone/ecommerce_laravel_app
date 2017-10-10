@extends('frontend/layout/layout')


@section('seo')
<meta name="description" content="Login or Register for a Grace Company Account">
<meta name="keywords" content="Login, Register, create account">
<meta name="author"content="The Grace Company"/>
@endsection

@section('jsonschema')@endsection

@section('title')
Login or Register | The Grace Company
@endsection

@section('bodyschema')@endsection

@section('header_styles')
<style type="text/css">
    .icheckbox_square,.iradio_square{display:block;margin:0;padding:0;width:30px;height:22px;background:url(square.png) no-repeat;border:none;cursor:pointer;}
    [class^="icheckbox_"],[class*="icheckbox_"],[class^="iradio_"],[class*="iradio_"]{float:left;margin:0 5px 0 -20px;}
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
        <h1>My Account</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(getLang().'/') }}">Home</a></li>
            <li class="active">My Account</li>
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
            <div class="col_one_third nobottommargin">
                <div class="well well-lg nobottommargin">
                    {!! Form::open(['route' => 'signin', 'method' => 'post', 'id' => 'login-form',  'name' => 'login-form', 'class' => 'nobottommargin']) !!}
                    <input type="hidden" name="redirect" value="{!! @$redirect !!}" class="form-control" />
                    <input type="hidden" name="refrer" value="{!! @$refrer !!}" class="form-control" />
                    <span class="{{ ($errors->first('general_login', 'has-error'))?'has-error':'hide' }}">
                    <span class="help-block">{{ $errors->first('general_login', ':message') }}</span>
                    </span>
                    <h3>Login to your Account</h3>
                    <div class="col_full {{ $errors->first('email', 'has-error') }}">
                        <label for="login-form-username">Email:</label>
                        <input type="text" id="login-form-email" name="email" value="{!! Input::old('email') !!}" class="form-control" />
                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                    </div>
                    <div class="col_full {{ $errors->first('password', 'has-error') }}">
                        <label for="login-form-password">Password:</label>
                        <input type="password" id="login-form-password" name="password" value="" class="form-control" />
                        <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                        <a href="{{ url(getLang() . '/forgot-password') }}">Forgot Password</a>
                    </div>
                    <div class="col_full nobottommargin">
                        <button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        {{-- <a href="{{ route('forgot-password') }}" class="fright">Forgot Password?</a> --}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col_two_third col_last nobottommargin">
                <div class="well well-lg nobottommargin">
                    {!! Form::open(['route' => 'signup',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'nobottommargin',  'method' => 'post']) !!}
                    <input type="hidden" name="redirect" value="{!! @$redirect !!}" class="form-control" />
                    <input type="hidden" name="refrer" value="{!! @$refrer !!}" class="form-control" />
                    <span class="{{ ($errors->first('general_signup', 'has-error'))?'has-error':'hide' }}">
                    <span class="help-block">{{ $errors->first('general_signup', ':message') }}</span>
                    </span>
                    <h3>Don't have an Account? Register Now.</h3>
                    <div class="col_half {{ $errors->first('first_name', 'has-error') }}">
                        <label for="register-form-name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" value="{!! Input::old('first_name') !!}" class="form-control" />
                        <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
                    </div>
                    <div class="col_half col_last {{ $errors->first('last_name', 'has-error') }}">
                        <label for="register-form-name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" value="{!! Input::old('last_name') !!}" class="form-control" />
                        <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
                    </div>
                    <div class="clear"></div>
                    <div class="col_half {{ $errors->first('register-form-username', 'has-error') }} hide">
                        <label for="register-form-username">Username:</label>
                        <input type="text" id="register-form-username" name="register-form-username" value="{!! Input::old('register-form-username') !!}" class="form-control" disabled style="text-transform: capitalize;" />
                        <span class="help-block">{{ $errors->first('register-form-username', ':message') }}</span>
                    </div>
                    <div class="col_half {{ $errors->first('display_name', 'has-error') }}">
                        <label for="register-form-phone">Display Name:</label>
                        <input type="text" id="display_name" name="display_name" value="{!! Input::old('display_name') !!}" class="form-control" />
                        <span class="help-block">{{ $errors->first('display_name', ':message') }}</span>
                    </div>
                    <div class="col_half col_last {{ $errors->first('phone', 'has-error') }}">
                        <label for="register-form-phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="{!! Input::old('phone') !!}" class="input-mask-phone form-control " />
                        <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                    </div>
                    <div class="clear"></div>
                    <div class="col_half {{ $errors->first('email_signup', 'has-error') }}">
                        <label for="register-form-email">Email Address:</label>
                        {!! Form::email('email_signup',  Input::old('email_signup'), ['class' => 'form-control']) !!}
                        <span class="help-block">{{ $errors->first('email_signup', ':message') }}</span>
                    </div>
                    <div class="col_half col_last {{ $errors->first('email_confirm', 'has-error') }}">
                        <label for="register-form-email">Re -Enter Email Address:</label>
                        <input type="text" id="email_confirm" name="email_confirm" value="{!! Input::old('email_confirm') !!}" class="form-control"/>
                        <span class="help-block">{{ $errors->first('email_confirm', ':message') }}</span>
                    </div>                    
                    <div class="clear"></div>
                    <div class="col_half {{ $errors->first('password_signup', 'has-error') }}">
                        <label for="register-form-password">Choose Password:</label>
                        {!! Form::password('password_signup', ['class' => 'form-control']) !!}
                        <span class="help-block">{{ $errors->first('password_signup', ':message') }}</span>
                    </div>
                    <div class="col_half col_last {{ $errors->first('password_confirm', 'has-error') }}">
                        <label for="register-form-repassword">Re-enter Password:</label>
                        <input type="password" id="password_confirm" name="password_confirm" value="" class="form-control"/>
                        <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
                    </div>
                    <div class="clear"></div>

                    <!--            <div class="checkbox">
                                   <label>
                                       <input type="checkbox" class="square-grey"  checked name="subscribed" >  I accept <a href="#"> Terms and Conditions</a>
                                   </label>
                               </div> -->
                    <div class="clear"></div>
                    <div class="col_full nobottommargin">
                        <br style="clear:both" />
                        <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->
<script>
    $(document).ready(function () {
        $('#register-form-username,#first_name,#last_name').blur(function () {
            $('input[name="register-form-username"]').val(
                    $('#first_name').val() + " " +
                    $('#last_name').val());
        });
        $('input[name="register-form-username"]').val(
                $('#first_name').val() + " " +
                $('#last_name').val());
    });
</script>
@endsection

@section('footer_scripts')@endsection

@section('pp_footer_scripts')@endsection

@section('inlinejs')@endsection
