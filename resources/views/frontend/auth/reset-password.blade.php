@extends('frontend/layout/account')

@section('title')
Login or Register | The Grace Company
@endsection

@section('bodyschema')@endsection

@section('header_styles')
<style type="text/css">
.icheckbox_square,.iradio_square{display:block;margin:0;padding:0;width:30px;height:22px;background:url(square.png) no-repeat;border:none;cursor:pointer;}
[class^="icheckbox_"],[class*="icheckbox_"],[class^="iradio_"],[class*="iradio_"]{float:left;margin:0 5px 0 -20px;}
</style>
@endsection

@section('scripts')@endsection

@section('ppscripts')

@endsection

@section('submenu')

@endsection




@section('page-title-off')
<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>My Account</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(getLang().'/') }}">Home</a></li>
            <li class="active">Login</li>
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

                    <div class="nobottommargin">

                        <h3>Forgot your password.</h3>
                        <p>Request reset instructions for your login.</p>
                    {!! Form::open(['route' => 'signup',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'nobottommargin',  'method' => 'post']) !!}

                            <div class="col_half">
                                <label for="register-form-email">Email Address:</label>
                                {!! Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>

                            <div class="clear"></div>
                            <div class="col_full nobottommargin">
                            <br style="clear:both" />
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
