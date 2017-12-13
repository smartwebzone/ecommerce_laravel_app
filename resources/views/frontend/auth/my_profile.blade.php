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
My Profile | Jeevandeep Prakashan Pvt. Ltd.
@endsection

@section('bodyschema')@endsection
@section('bodytag')@endsection

@section('header_styles')@endsection


@section('content')
<!-- Start Wrapper -->
<div class="wrapper content create-profile my-account cf">
    @include('frontend.layout.jeevandeep.header')
    <div class="select-div"><strong>My Account</strong></div>
    <div class="please-select">Welcome <span>{{Sentinel::getUser()->parent_first_name.' '.Sentinel::getUser()->parent_last_name}}</span> to your Jeevandeep Online Store account. You can view or edit your profile, view your orders and their status as well as download invoices for your completed orders from this page.</div>
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
    <!-- Start Lets Connect -->
    <div class="cf">
        @include('frontend.layout.jeevandeep.account-left')
        <div class="account-right">
            <div class="enquire">

                {!! Form::model($user, ['route' => 'signup',  'id' => 'my-profile-form',  'name' => 'my-profile-form', 'class' => 'cf validate_form',  'method' => 'post']) !!}
                {!! Form::hidden('redirect_url', Route::currentRouteName()) !!}
                <div class="cf">
                    <ul class="width100">
                        <li class="form-group">
                            <div class="input-group profile-email">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <div class="icon-addon">
                                    {!! Form::text('email', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="profile-add cf">
                    <li class="form-group">
                        <label>PARENT | GUARDIAN</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('parent_first_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>&nbsp;</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('parent_middle_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>&nbsp;</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('parent_last_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>CHILD</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('first_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>&nbsp;</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('middle_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>&nbsp;</label>
                        <div class="input-group grey">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('last_name', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </li>
                    <li class="form-group">
                        <label>MOBILE <font style='font-size: 12px'>(10 digits)</font></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('mobile', null, ['placeholder'=> 'MOBILE', 'class' => 'form-control required']) !!}
                            </div>
                        </div>
                        <span class="errormsg">{{ $errors->first('mobile', ':message') }}</span>
                    </li>
                    <li class="form-group">
                        <label>LANDLINE <font style='font-size: 12px'>(STD code-Landline number)</font></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <div class="icon-addon">
                                {!! Form::text('landline', null, ['placeholder'=> 'LANDLINE', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <span class="errormsg">{{ $errors->first('landline', ':message') }}</span>
                    </li>
                </div>
                <div class="shipping-address cf">
                    <ul>
                        <li class="textArea form-group">
                            <label>SHIPPING ADDRESS</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('address1', @$shipping_address['address1'], ['placeholder'=> 'ADDRESS LINE 1', 'class' => 'form-control required']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('address2', @$shipping_address['address2'], ['placeholder'=> 'ADDRESS LINE 2', 'class' => 'form-control']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('area', @$shipping_address['area'], ['placeholder'=> 'AREA AND NEAREST LANDMARK', 'class' => 'form-control']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::text('city', @$shipping_address['city'], ['placeholder'=> 'CITY', 'class' => 'form-control required']) !!}
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::text('zip', @$shipping_address['zip'], ['placeholder'=> 'PINCODE', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::select('state', getStateDropdown(), @$shipping_address['state'], array('class' => 'form-control required','style' => 'padding:6px 2px;')) !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul>
                        <li class="textArea form-group">
                            <label>BILLING ADDRESS
                                <div class="checkbox selectCheck cf">
                                    <input type="checkbox" name="same_as_address" id="same_as_address" value="1">
                                    <label for="same_as_address" class="label_same_as_address">Check this box to copy the shipping address</label>
                                </div>
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('billaddress1', @$billing_address['address1'], ['placeholder'=> 'ADDRESS LINE 1', 'class' => 'form-control required']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('billaddress2', @$billing_address['address2'], ['placeholder'=> 'ADDRESS LINE 2', 'class' => 'form-control']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                {!! Form::textarea('billarea', @$billing_address['area'], ['placeholder'=> 'AREA AND NEAREST LANDMARK', 'class' => 'form-control']) !!}
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::text('billcity', @$billing_address['city'], ['placeholder'=> 'CITY', 'class' => 'form-control required']) !!}
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::text('billzip', @$billing_address['zip'], ['placeholder'=> 'PINCODE', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <div class="icon-addon">
                                    {!! Form::select('billstate', getStateDropdown(), @$billing_address['state'], array('class' => 'form-control required','style' => 'padding:6px;')) !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="fullBtn pt10 pb25"><button type="submit" class="btn btnS"><i class="fa fa-link"></i>SAVE</button></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- End Wrapper -->
@endsection

@section('footer_scripts')
<script>
    $().ready(function () {
        $(".validate_form").validate({
            rules: {
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                },
                landline: {
                },
                zip: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6,
                },
                billzip: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6,
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
            errorPlacement: function () {
                return false;  // suppresses error message text
            }
        });
        $("#same_as_address").click(function () {
            if ($('#same_as_address').is(':checked')) {
                $('[name="billaddress1"]').val($('[name="address1"]').val());
                $('[name="billaddress2"]').val($('[name="address2"]').val());
                $('[name="billarea"]').val($('[name="area"]').val());
                $('[name="billcity"]').val($('[name="city"]').val());
                $('[name="billzip"]').val($('[name="zip"]').val());
                $('[name="billstate"]').val($('[name="state"]').val());
            } else {
                $('[name="billaddress1"],[name="billaddress2"],[name="billarea"],[name="billcity"],[name="billzip"],[name="billstate"]').val('');
            }
        });
    });
</script>
@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection