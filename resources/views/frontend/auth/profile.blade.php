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

@section('header_styles')
<link rel="shortcut icon" type="image/x-icon" href="images/jeevandeep-favicon.ico">
<link rel="stylesheet" href="{!! asset('/frontend/styles.css') !!}" type="text/css" />
<link rel="stylesheet" href="{!! asset('/frontend/developer.css') !!}" type="text/css" />
@endsection


@section('content')
<!-- Start Wrapper -->
<div class="wrapper content create-profile cf">
    <h2><i class="fa fa-book"></i>Online Store</h2>
    <div class="select-div"><strong>CREATE YOUR PROFILE</strong></div>
    <div class="please-select">Thank you for validating your email. Please create your profile here.</div>
    <!-- Start Lets Connect -->
    <div class="enquire">

        {!! Form::open(['route' => 'signup',  'id' => 'register-form',  'name' => 'register-form', 'class' => 'cf',  'method' => 'post']) !!}
        <!--            <div class="cf">
                        <ul>
                            <li class="form-group">
                                <label>EMAIL ID</label>
                                <div class="input-group profile-email">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <div class="icon-addon">
                                        <input type="email" placeholder="NAME@DOMAIN.COM" class="form-control" id="">
                                    </div>
                                </div>
                            </li>
                        </ul>
        
                    </div>-->
        <div class="profile-add cf">
            <li class="form-group">
                <label>PARENT | GUARDIAN</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="FIRST NAME" name="parent_first_name" class="form-control" id="">

                    </div>

                </div>
                <span class="help-block">{{ $errors->first('parent_first_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="MIDDLE NAME" name="parent_middle_name" class="form-control" id="">
                    </div>

                </div>
                <span class="help-block">{{ $errors->first('parent_middle_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="FAMILY NAME" name="parent_last_name" class="form-control" id="">
                    </div>

                </div>
                <span class="help-block">{{ $errors->first('parent_last_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>CHILD</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="FIRST NAME" name="first_name" class="form-control" id="">

                    </div>

                </div>
                <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="MIDDLE NAME" name="middle_name" class="form-control" id="">

                    </div>

                </div>
                <span class="help-block">{{ $errors->first('middle_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="FAMILY NAME" name="last_name" class="form-control" id="">

                    </div>
                    
                </div>
                <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>MOBILE</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="MOBILE" name="mobile" class="form-control" id="">
                      
                    </div>
                </div>
                  <span class="help-block">{{ $errors->first('mobile', ':message') }}</span>
            </li>
            <li class="form-group">
                <label>LANDLINE</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <div class="icon-addon">
                        <input type="text" placeholder="LANDLINE" name="landline" class="form-control" id="">
                      
                    </div>
                </div>
                  <span class="help-block">{{ $errors->first('landline', ':message') }}</span>
            </li>
        </div>
        <div class="shipping-address cf">
            <ul>
                <li class="textArea form-group">
                    <label>SHIPPING ADDRESS</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <textarea class="form-control" name="address1" placeholder="ADDRESS LINE 1"></textarea>
                        <span class="help-block">{{ $errors->first('address1', ':message') }}</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <textarea class="form-control" name="address2" placeholder="ADDRESS LINE 2"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <textarea class="form-control" name="area" placeholder="AREA AND NEAREST LANDMARK"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="city" placeholder="CITY" class="form-control" id="">
                            
                        </div>
                    </div>
                    <span class="help-block">{{ $errors->first('city', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="zip" placeholder="PINCODE" class="form-control" id="">
                            
                        </div>
                    </div>
                    <span class="help-block">{{ $errors->first('zip', ':message') }}</span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="state" placeholder="STATE" class="form-control" id="">
                            
                        </div>
                    </div>
                    <span class="help-block">{{ $errors->first('state', ':message') }}</span>
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
                        <textarea class="form-control" name="billaddress1" placeholder="ADDRESS LINE 1"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <textarea class="form-control" name="billaddress2" placeholder="ADDRESS LINE 2"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <textarea class="form-control" name="billarea" placeholder="AREA AND NEAREST LANDMARK"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="billcity" placeholder="CITY" class="form-control" id="">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="billzip" placeholder="PINCODE" class="form-control" id="">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="icon-addon">
                            <input type="text" name="billstate" placeholder="STATE" class="form-control" id="">
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