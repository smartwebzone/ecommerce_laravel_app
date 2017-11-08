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
<div class="wrapper confirm-shipping-address content cf">
	<!-- Start Lets Connect -->
    	@include('frontend.layout.jeevandeep.header')
        <div class="select-div"><strong>Confirm Shipping Address and Select preferred delivery Date</strong></div>
        <div class="please-select">Hi <span>{{Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name}}</span>. You have selected the following products for the <span>{{$school->name}}</span> for <span>{{$standard->name}}</span>. Please confirm your shipping address for these products and your preferred delivery date and then click 'Proceed'.</div>
        <div class="seleceted-product-price">
        	<table>
            	<tr>
                	<th class="set">SELECTED products</th>
                	<th class="set-price">TOTAL PAYABLE</th>
                </tr>
                
                @foreach($product as $ps)
                <tr>
                	<td class="set"><i class="fa fa-shopping-bag"></i>{{$ps->title}}</td>
                	<td class="set-price">INR {{$ps->price}}</td>
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
<!--                <ul>
                    <li>
                        <div class="checkbox checkbox-primary selectCheck cf">
                            <input id="22" type="checkbox">
                            <label for="22">Check this box if the shipping address is correct, else edit and click 'Save and Proceed'.</label>
                        </div>
                    </li>
                </ul>-->
             </div>

			<div class="confirm-add"><h5><i class="fa fa-calendar"></i>preferred delivery date</h5></div>
            <div class="cf">
            	<ul>
                    <div class="cf">
                        <ul>
                            <li class="form-group">
                                <label>SELECT MONTH</label>
                                 <a class="btn btn-select btn-select-light">
                                    <input type="hidden" class="btn-select-input" id="" name="month" value="" />
                                    <span class="btn-select-value">SELECT MONTH</span>
                                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                                    <ul>
                                        <li>January</li>
                                        <li>February</li>
                                        <li>March</li>
                                        <li>April</li>
                                        <li>May</li>
                                        <li>June</li>
                                        <li>July</li>
                                        <li>August</li>
                                        <li>September</li>
                                        <li>October</li>
                                        <li>November</li>
                                        <li>December</li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="form-group">
                                <label>SELECT DATE</label>
                                <a class="btn btn-select btn-select-light">
                                    <input type="hidden" class="btn-select-input" id="" name="date" value="" />
                                    <span class="btn-select-value">SELECT DATE</span>
                                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                                    <ul>
                                        <li>01</li>
                                        <li>02</li>
                                        <li>03</li>
                                        <li>04</li>
                                        <li>05</li>
                                        <li>06</li>
                                        <li>07</li>
                                        <li>08</li>
                                        <li>09</li>
                                        <li>10</li>
                                        <li>11</li>
                                        <li>12</li>
                                        <li>13</li>
                                        <li>14</li>
                                        <li>15</li>
                                        <li>16</li>
                                        <li>17</li>
                                        <li>18</li>
                                        <li>19</li>
                                        <li>20</li>
                                        <li>21</li>
                                        <li>22</li>
                                        <li>23</li>
                                        <li>24</li>
                                        <li>25</li>
                                        <li>26</li>
                                        <li>27</li>
                                        <li>28</li>
                                        <li>29</li>
                                        <li>30</li>
                                        <li>31</li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
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
<script>
$(document).ready(function () {
    $(".validate_form").validate({
            errorPlacement: function(){
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
    }
    else {
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
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection