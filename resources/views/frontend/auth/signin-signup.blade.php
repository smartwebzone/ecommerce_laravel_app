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
                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                    </div>
                </div>
            </li>
            <li class="form-group">
                <label>PASSWORD</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <div class="icon-addon">
                        <input placeholder="PLEASE ENTER YOUR PASSWORD" type="password" id="login-form-password" name="password" value="" class="form-control" />
                        <span class="help-block">{{ $errors->first('password', ':message') }}</span>

                    </div>
                </div>
            </li>
            <button  type="submit" class="btn btnS"><i class="fa fa-link"></i>LOGIN</button></li>
            <li class="forgot"><i class="fa fa-link"></i><a href="{{ url(getLang() . '/forgot-password') }}">Forgot Password</a></li>

            {!! Form::close() !!}
            {!! Form::open(['route' => 'registerEmail',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'loginForm cf',  'method' => 'post']) !!}
            <input type="hidden" name="redirect" value="{!! @$redirect !!}" class="form-control" />
            <input type="hidden" name="refrer" value="{!! @$refrer !!}" class="form-control" />
            <div class="form-sub-title"><span>Register</span> if you are a returning user</div>
            <li class="form-group">
                <label>EMAIL ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                    <div class="icon-addon">

                        {!! Form::email('email_signup',  Input::old('email_signup'), ['class' => 'form-control','placeholder'=>"PLEASE ENTER YOUR EMAIL ID"]) !!}
                        <span class="help-block">{{ $errors->first('email_signup', ':message') }}</span>
                    </div>
                </div>
            </li>
            <li>
                <button type="submit"  class="btn btnS"><i class="fa fa-link"></i>REGISTER</button></li>
            </form>
        </div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->

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
