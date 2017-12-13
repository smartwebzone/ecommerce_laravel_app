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
<link rel="stylesheet" href="{!! asset('/jeevandeep/css/datepicker3.min.css') !!}" type="text/css" />
<style type="text/css">
    .datepicker.datepicker-inline td, .datepicker.datepicker-inline th, .datepicker.dropdown-menu td, .datepicker.dropdown-menu th {
        padding: 5px !important;
    }
</style>
@endsection


@section('content')

<!-- Start Wrapper -->
<div class="wrapper confirm-shipping-address content cf">
    <!-- Start Lets Connect -->
    @include('frontend.layout.jeevandeep.header')
    <div class="select-div"><strong>Confirm Shipping Address and Select preferred delivery Date</strong></div>
    <div class="please-select">Hi <span>{{Sentinel::getUser()->parent_first_name.' '.Sentinel::getUser()->parent_last_name}}</span>. You have selected the following products for the <span>{{$school->name}}</span> for <span>{{$standard->name}}</span>. Please confirm your shipping address for these products and your preferred delivery date and then click 'Proceed'.</div>
    <div class="seleceted-product-price">
        <table>
            <tr>
                <th class="set">SELECTED products</th>
                <th class="set-price">TOTAL PAYABLE</th>
            </tr>

            @foreach($cart_data as $row)
            <tr>            
            <td class="set"><a rel="group" class="thickbox underline" href="{!! route('store.product', [$row->product_id]) !!}?width=905&height=550" title="{!! $row->product()->find($row->product_id)->title !!}"><i class="fa fa-shopping-bag"></i>{{$row->product()->find($row->product_id)->title}}</a></td>
            <td class="set-price">INR {{$row->product()->find($row->product_id)->price}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="confirm-add"><h5><i class="fa fa-map-marker"></i>Confirm Shipping Address</h5></div>

    {!! Form::open(['action' => 'StoreController@cart' ,'class'=>"enquire shippingForm validate_form", 'method' => 'post']) !!}
    <p class="pb5">SHIPPING ADDRESS</p>
    <div class="cf">
        <ul class="first">
            <li class="textArea form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                    {!! Form::textarea('address1', @$shipping_address['address1'], ['placeholder'=> 'ADDRESS LINE 1', 'class' => 'form-control required']) !!}
                </div>
            </li>
            <li class="textArea form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                    {!! Form::textarea('address2', @$shipping_address['address2'], ['placeholder'=> 'ADDRESS LINE 2', 'class' => 'form-control']) !!}
                </div>
            </li>
            <li class="textArea form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                    {!! Form::textarea('area', @$shipping_address['area'], ['placeholder'=> 'AREA AND NEAREST LANDMARK', 'class' => 'form-control']) !!}
                </div>
            </li>
            <li class="form-group mb7">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('city', @$shipping_address['city'], ['placeholder'=> 'CITY', 'class' => 'form-control required']) !!}
                    </div>
                </div>
            </li>
            <li class="form-group mb7">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('zip', @$shipping_address['zip'], ['placeholder'=> 'PINCODE', 'class' => 'form-control required']) !!}
                    </div>
                </div>
            </li>
            <li class="form-group mb7">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <div class="icon-addon">
                        {!! Form::select('state', getStateDropdown(), @$shipping_address['state'], array('class' => 'form-control required','style' => 'height:37px;')) !!}
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="confirm-add" style="margin-left:0px; margin-right: 0px;"><h5><i class="fa fa-calendar"></i>preferred delivery date</h5></div>
    <div class="cf">
        <ul class="first">
            <li class="form-group mb7">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-chevron-circle-down"></i></span>
                    <div class="icon-addon">
                        {!! Form::text('preferred_delivery_date', null, ['placeholder'=> 'Select Date', 'class' => 'form-control required', 'id' => 'preferred_delivery_date']) !!}
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="fullBtn pt20 pb25">
<!--                            <a href="cart.html" class="btn btnS"><i class="fa fa-link"></i>SAVE AND PROCEED</a>-->
        <button type="submit"  class="btn btnS"><i class="fa fa-link"></i>SAVE AND PROCEED</button></div>
</form>
</div>
<!-- End Wrapper -->
@endsection

@section('footer_scripts')
<script type="text/javascript" src="{!! asset('/jeevandeep/js/bootstrap-datepicker.min.js') !!}"></script>
<script>
$(document).ready(function () {

    $('#preferred_delivery_date').datepicker({
        format: "dd/mm/yyyy",
        startDate: new Date(),
        autoclose: true,
    });
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
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    } else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

</script>
@endsection
@section('pp_footer_scripts')
@endsection
@section('inlinejs')@endsection