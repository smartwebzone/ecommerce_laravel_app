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
<div class="wrapper content create-profile cf">
    <h2><i class="fa fa-book"></i>Online Store</h2>
    <div class="select-div"><strong>CREATE YOUR PROFILE</strong></div>
    <div class="please-select">Thank you for validating your email. Please create your profile here.</div>
    <!-- Start Lets Connect -->
    <div class="enquire">
        {!! Form::model($user, ['route' => 'signup',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'cf',  'method' => 'post']) !!}
        <div class="profile-add cf">
            <li class="form-group">
                <label>PARENT | GUARDIAN</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('parent_first_name', null, ['placeholder'=> 'FIRST NAME', 'class' => 'form-control']) !!}
                    </div>

                </div>
                <span class="errormsg">{{ $errors->first('parent_first_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('parent_middle_name', null, ['placeholder'=> 'MIDDLE NAME', 'class' => 'form-control']) !!}
                    </div>

                </div>
                <span class="errormsg">{{ $errors->first('parent_middle_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('parent_last_name', null, ['placeholder'=> 'LAST NAME', 'class' => 'form-control']) !!}
                    </div>

                </div>
                <span class="errormsg">{{ $errors->first('parent_last_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>CHILD</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('first_name', null, ['placeholder'=> 'FIRST NAME', 'class' => 'form-control']) !!}
                    </div>

                </div>
                <span class="errormsg">{{ $errors->first('first_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('middle_name', null, ['placeholder'=> 'MIDDLE NAME', 'class' => 'form-control']) !!}
                    </div>

                </div>
                <span class="errormsg">{{ $errors->first('middle_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('last_name', null, ['placeholder'=> 'FAMILY NAME', 'class' => 'form-control']) !!}
                    </div>
                    
                </div>
                <span class="errormsg">{{ $errors->first('last_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>MOBILE</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('mobile', null, ['placeholder'=> 'MOBILE', 'class' => 'form-control']) !!}
                    </div>
                </div>
                  <span class="errormsg">{{ $errors->first('mobile', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>LANDLINE</label>
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
                        {!! Form::textarea('address1', null, ['placeholder'=> 'ADDRESS LINE 1', 'class' => 'form-control']) !!}
                    </div>
                    <span class="errormsg">{{ $errors->first('address1', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        {!! Form::textarea('address2', null, ['placeholder'=> 'ADDRESS LINE 2', 'class' => 'form-control']) !!}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        {!! Form::textarea('area', null, ['placeholder'=> 'AREA AND NEAREST LANDMARK', 'class' => 'form-control']) !!}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('city', null, ['placeholder'=> 'CITY', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <span class="errormsg">{{ $errors->first('city', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('zip', null, ['placeholder'=> 'PINCODE', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <span class="errormsg">{{ $errors->first('zip', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('state', null, ['placeholder'=> 'STATE', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <span class="errormsg">{{ $errors->first('state', ':message') }}</span>
                </li>
            </ul>
            <ul>
                <li class="textArea form-group">
                    <label>BILLING ADDRESS
                        <div class="checkbox selectCheck cf">
                            <input id="1" type="checkbox">
                            <label for="1">Check this box to copy the shipping address</label>
                        </div>
                    </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        {!! Form::textarea('billaddress1', null, ['placeholder'=> 'ADDRESS LINE 1', 'class' => 'form-control']) !!}
                    </div>
                    <span class="errormsg">{{ $errors->first('billaddress1', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        {!! Form::textarea('billaddress2', null, ['placeholder'=> 'ADDRESS LINE 2', 'class' => 'form-control']) !!}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        {!! Form::textarea('billarea', null, ['placeholder'=> 'AREA AND NEAREST LANDMARK', 'class' => 'form-control']) !!}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('billcity', null, ['placeholder'=> 'CITY', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('billzip', null, ['placeholder'=> 'PINCODE', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            {!! Form::text('billstate', null, ['placeholder'=> 'STATE', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="fullBtn">
            <button type="submit" class="btn btnS"><i class="fa fa-link"></i>PROCEED</button></div>
        </form>
    </div>
</div>
<!-- End Wrapper -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection