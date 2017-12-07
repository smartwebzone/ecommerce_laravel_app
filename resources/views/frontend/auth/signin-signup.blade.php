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
        <div class="select-div">Login | Register</div>
        <div class="please-select">Please login if you are a returning user, else register if you are here for the first time.</div>
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
            {!! Form::open(['route' => 'signin', 'method' => 'post', 'id' => 'login-form',  'name' => 'login-form', 'class' => 'loginForm cf']) !!}
            <input type="hidden" name="redirect" value="{!! @$redirect !!}" class="form-control" />
            <input type="hidden" name="refrer" value="{!! @$refrer !!}" class="form-control" />
            <div class="form-sub-title"><span>LOGIN</span> if you are a returning user</div>
            <li class="form-group">
                <label>EMAIL ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                    <div class="icon-addon">
                        <input placeholder="PLEASE ENTER YOUR EMAIL ID" type="text" id="login-form-email" name="email" value="{!! Input::old('email') !!}" class="form-control" />
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('email', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>PASSWORD</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <div class="icon-addon">
                        <input placeholder="PLEASE ENTER YOUR PASSWORD" type="password" id="login-form-password" name="password" value="" class="form-control" />
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('password', ':message') }}</span>
            </li>
            <li>
                <button  type="submit" class="btn btnS"><i class="fa fa-link"></i>LOGIN</button>
            </li>
            <li class="forgot"><i class="fa fa-link"></i><a href="{{ url('/forgot-password') }}">Forgot Password</a></li>

            {!! Form::close() !!}
            {!! Form::open(['route' => 'registerEmail',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'loginForm cf',  'method' => 'post']) !!}
            <input type="hidden" name="redirect" value="{!! @$redirect !!}" class="form-control" />
            <input type="hidden" name="refrer" value="{!! @$refrer !!}" class="form-control" />
            <div class="form-sub-title"><span>Register</span> if you are a new user</div>
            <li class="form-group">
                <label>EMAIL ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                    <div class="icon-addon">
                        {!! Form::email('email_signup',  Input::old('email_signup'), ['class' => 'form-control','placeholder'=>"PLEASE ENTER YOUR EMAIL ID"]) !!}
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('email_signup', ':message') }}</span>
            </li>
            <li>
                <button type="submit"  class="btn btnS"><i class="fa fa-link"></i>REGISTER</button></li>
            </form>
        </div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')
<script>
    $().ready(function () {
        $("#login-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "",
                    email: "Please enter a valid Email ID",
                },
                password: {
                    required: "",
                },
            },
            highlight: function (element) {
                $(element).closest('div.input-group').addClass('error');
                $(element).closest('.form-group').addClass('child-label-red');
            },
            unhighlight: function (element) {
                $(element).closest('div.input-group').removeClass('error');
                $(element).closest('.form-group').removeClass('child-label-red');
            },
            errorElement: "span",
            errorPlacement: function (error,element) {
                $(error).addClass('help-block');
                $(element).closest('div.input-group').after(error);
            }
        });
        $("#register-form").validate({
            rules: {
                email_signup: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email_signup: {
                    required: "",
                    email: "Please enter a valid Email ID",
                },
            },
            highlight: function (element) {
                $(element).closest('div.input-group').addClass('error');
                $(element).closest('.form-group').addClass('child-label-red');
            },
            unhighlight: function (element) {
                $(element).closest('div.input-group').removeClass('error');
                $(element).closest('.form-group').removeClass('child-label-red');
            },
            errorElement: "span",
            errorPlacement: function (error,element) {
                $(error).addClass('help-block');
                $(element).closest('div.input-group').after(error);
            }
        });
    });
</script>
@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection
