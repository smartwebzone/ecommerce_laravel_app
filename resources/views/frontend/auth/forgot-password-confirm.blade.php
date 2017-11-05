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
        {{$cart_menu = false}}
        @include('frontend.layout.jeevandeep.header')
        <div class="select-div">RESET YOUR PASSWORD</div>
        <div class="please-select">Please reset your password. Use alphanumeric characters with a minimum of 8 characters. You can also use symbols such as @#$%^&*.</div>
        <div class="cf">
        {!! Form::open(['route' => ['forgot-password-confirm-post',$userId,$passwordResetCode],  'id' => 'forgot-form',  'name' => 'forgot-form', 'class' => 'loginForm cf',  'method' => 'post']) !!}
                <li class="form-group">
                    <label>ENTER PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <div class="icon-addon">
                            <input placeholder="ENTER PASSWORD" name="password" class="form-control" id="" type="password">
                        </div>
                    </div>
                    <span class="errormsg">{{ $errors->first('password', ':message') }}</span>
                </li>
                <li class="form-group">
                    <label>RE-ENTER PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <div class="icon-addon">
                            <input placeholder="RE-ENTER PASSWORD" class="form-control" id="" name="password_confirm" type="password">
                        </div>
                    </div>
                    <span class="errormsg">{{ $errors->first('password_confirm', ':message') }}</span>
                </li>
                <li class="fullBtn">
                    <button  type="submit" class="btn btnS"><i class="fa fa-link"></i>RESET PASSWORD</button>
                </li>
            </form>
        </div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection