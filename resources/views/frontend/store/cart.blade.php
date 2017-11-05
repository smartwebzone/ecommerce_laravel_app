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
<div class="wrapper cart-blog content cf">
    <!-- Start Select School -->
    <div class="cf">
        @include('frontend.layout.jeevandeep.header')
        @if(count($cart_data) > 0 || app('request')->input('success') == 1)
        <div class="select-div"><i class="fa fa-credit-card"></i>Proceed to payment</div>
        <div class="please-select">You have selected {{inWords($total_products)}} in your shopping cart. You are required to complete your transactions for the {{inWords($total_products)}} one after another. Please click 'Pay Now' to continue.</div>
        <div class="cf">
            <table class="cart-table">
                <tr>
                    <th class="col-td-1">product</th>
                    <th align="center" class="col-td-2">TOTAL PAYABLE</th>
                    <th class="col-td-3">&nbsp;</th>
                </tr>
                @foreach($cart_data as $row)
                <tr>
                    <td><div><i class="fa fa-shopping-bag"></i>{{$row->product()->get()[0]->title}}</div></td>
                    <td class="col-td-2"><div>INR {{$row->product()->get()[0]->price}}</div></td>
                    <td class="col-td-pay">
                        {!! Form::open(['route' => 'store.pay',  'id' => '',  'name' => 'cart-form', 'class' => '',  'method' => 'post']) !!}
                        <div style="padding:0px;">
                            <input type="hidden" name="product_id" value="{{$row->product_id}}">
                            <input type="hidden" name="preferred_delivery_date" value="{{$row->preferred_delivery_date}}">
                            <button  type="submit" class="btn btnS"><i style="color:white" class="fa fa-link"></i>Pay Now</button>
                        </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                @foreach($orders as $om)
                @foreach($om->product as $op)
                <tr>
                    <td><div><i class="fa fa-shopping-bag"></i>{{$op->title}}</div></td>
                    <td class="col-td-2"><div>INR {{$op->price}}</div></td>
                    <td class="col-td-pay">                        
                        <div style="padding:0px; background-color: #5cb85c;">
                            <button type="button" class="btn btnS" style="background-color:#5cb85c;cursor: not-allowed !important;"><i style="color:white" class="fa fa-check"></i>Paid</button>
                        </div>    
                    </td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </div>
        @else
        <div class="cf" style="min-height:300px;">
            <div class="select-div"><i class="fa fa-shopping-basket"></i>Cart</div>
            <div class="alert alert-info">
                Your cart is empty. <a href="{{route('store.selectSchool')}}">Continue Shopping</a>
            </div>
        </div>
        @endif
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection