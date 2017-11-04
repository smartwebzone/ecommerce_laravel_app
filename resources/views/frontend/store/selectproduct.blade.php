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
<div class="wrapper select-product content cf">
    <!-- Start Select School -->
    <div class="cf">
        <h2><i class="fa fa-book"></i>Online Store 
            <ul class="user-cart">
                <li><a href="my-account.html"><i class="fa fa-group"></i><span>My Account</span></a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-basket"></i><span>Cart</span></a></li>
            </ul>
        </h2>
        <div class="select-div">Select products that you wish to purchase</div>
        <div class="please-select">Welcome <span>{{Sentinel::getUser()->first_name.' '.Sentinel::getUser()->last_name}}</span>. All available products for the <span>{{$school->name}}, </span>for <span>{{$standard->name}}</span> are listed here. Please select the product or products that you wish to purchase and click 'Proceed'.</div>
        {!! Form::open(['action' => 'StoreController@confirm' , 'method' => 'post']) !!}
        @foreach($product as $ps)
        @if(!$ps->books->count())
        <?php continue; ?>
        @endif
        <div class="select-product-blog cf">
            <div class="checkbox checkbox-primary selectCheck cf">
                <input id="{{$ps->id}}" name="product[]" value="{{$ps->id}}" type="checkbox">
                <label for="{{$ps->id}}">Check this box to purchase this product.<span> You have previously purchased this product on 09 August 2017.</span></label>
            </div>
            <div class="product-set cf">
                <h5><i class="fa fa-shopping-bag"></i>{{$ps->title}}</h5>	
                <p class="pb5 italic">{{$ps->description}}</p>
                <div class="cf">
                    <table>
                        <tr>
                            <th class="name">NAME</th>
                            <th class="quantity">Quantity</th>
                            <th class="cost">Cost per item</th>
                            <th class="subtotal">subtotal</th>
                            <th class="gst">GST</th>
                            <th class="mrp">MRP</th>
                        </tr>
                        <?php $subtotal = 0; ?>
                        <?php $totaltax = 0; ?>
                        <?php $totalmrp = 0; ?>
                        @foreach($ps->books as $book)
                        <tr>
                            <td class="name">{{$book->name}}</td>
                            <td class="quantity">1.00</td>
                            <td class="cost">INR {{$book->price}}</td>
                            <td class="subtotal">INR {{$book->price}}</td>
                            <td class="gst">{{$book->tax}}%</td>
                            <td class="mrp">INR {{$book->price_after_tax}}</td>
                        </tr>
                        <?php $subtotal+=$book->price; ?>
                        <?php $totalmrp+=$book->price_after_tax; ?>
                        <?php $totaltax+=$book->price_after_tax - $book->price; ?>
                        @endforeach
                    </table>
                    <div class="table-hr"></div>
                    <table>
                        <tr>
                            <td class="name text-right">Total without tax</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal">{{$subtotal}}</td>
                            <td class="gst nobg"></td>
                            <td class="mrp nobg"></td>
                        </tr>
                        <tr>
                            <td class="name text-right">SGST in inr</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst">INR {{$totaltax/2}}</td>
                            <td class="mrp nobg"></td>
                        </tr>
                        <tr>
                            <td class="name text-right">CGST in inr</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst">INR {{$totaltax/2}}</td>
                            <td class="mrp nobg"></td>
                        </tr>
                    </table>
                    <div class="table-hr"></div>
                    <table>
                        <tr>
                            <td class="name text-right greybg">total mrp (A)</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp greybg">INR {{$totalmrp}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="nobg" height="2"></td>
                        </tr>
                        <tr>
                            <td class="name text-right">shipping costs</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp">INR {{$ps->instate_shipping_charges}}</td>
                        </tr>
                        <?php $shippingtax = (($ps->instate_shipping_charges * 18) / 100); ?>
                        <tr>
                            <td class="name text-right">SGST on shipping costs in inr</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp">INR {{$shippingtax/2}}</td>
                        </tr>
                        <tr>
                            <td class="name text-right">CGST on shipping costs in inr</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp">INR {{$shippingtax/2}}</td>
                        </tr>
                    </table>
                    <div class="table-hr"></div>
                    <table>
                        <tr>
                            <td class="name text-right greybg">total shipping costs (b)</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp greybg">INR {{$shippingtax+$ps->instate_shipping_charges}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="nobg" height="2"></td>
                        </tr>
                    </table>
                    <div class="table-hr"></div>
                    <table>
                        <tr>
                            <td class="name text-right greybg">total PAYABLE (A+b)</td>
                            <td class="quantity nobg"></td>
                            <td class="cost nobg"></td>
                            <td class="subtotal nobg"></td>
                            <td class="gst nobg"></td>
                            <td class="mrp greybg">INR {{$ps->price}}</td>
                        </tr>
                    </table>
                    <div class="table-hr"></div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="fullBtn pt20 pb25">
            <button type="submit" class="btn btnS"><i class="fa fa-link"></i>PROCEED</button>
        </div>
        </form>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->

@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection