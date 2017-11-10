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
        <div class="select-div">Request to add new Standard
            <a href="" onclick="window.history.go(-1); return false;" class="back"><i class="fa fa-chevron-circle-left"></i> Back</a>
        </div>
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
            {!! Form::open(['route' => 'unavailable_standard', 'method' => 'post', 'id' => 'unavailable-standard-form',  'name' => 'unavailable-standard-form', 'class' => 'loginForm cf validate_form']) !!}    
            {!! Form::hidden('action', 'add') !!}
            <li class="form-group">
                <label>STANDARD NAME</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('name', null, ['placeholder'=> 'PLEASE ENTER STANDARD NAME', 'class' => 'form-control required']) !!}
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>OTHER DETAILS (OPTIONAL)</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('description', null, ['placeholder'=> 'PLEASE ENTER OTHER DETAILS', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <span class="errormsg">{{ $errors->first('description', ':message') }}</span>
            </li>
            <li class="pt5">
                <button  type="submit" class="btn btnS"><i class="fa fa-link"></i>SUBMIT</button>
            </li>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')
<script>
    $().ready(function () {
        $(".validate_form").validate({
            highlight: function (element) {
                $(element).closest('div.input-group').addClass('error');
                $(element).closest('.form-group').addClass('child-label-red');
            },
            unhighlight: function (element) {
                $(element).closest('div.input-group').removeClass('error');
                $(element).closest('.form-group').removeClass('child-label-red');
            },
            errorPlacement: function () {
                return false;  // suppresses error message text
            }
        });
    });
</script>
@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection