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
        @if(count($product) > 0)
        <div class="select-div"><i class="fa fa-credit-card"></i>Proceed to payment</div>
        <div class="please-select">You have selected two products in your shopping cart. You are required to complete your transactions for the two products one after another. Please click 'Pay Now' to continue.</div>
        <div class="cf">
            <table class="cart-table">
                <tr>
                    <th class="col-td-1">product</th>
                    <th align="center" class="col-td-2">TOTAL PAYABLE</th>
                    <th class="col-td-3">&nbsp;</th>
                </tr>
                @foreach($product as $ps)
                <tr>
                    <td><div><i class="fa fa-shopping-bag"></i>{{$ps->title}}</div></td>
                    <td class="col-td-2"><div>INR {{$ps->price}}</div></td>
                    <td class="col-td-pay">
                        {!! Form::open(['route' => 'store.pay',  'id' => '',  'name' => 'cart-form', 'class' => '',  'method' => 'post']) !!}
                        <div>
                            <input type="hidden" name="product_id" value="{{$ps->id}}">
                            <button  type="submit" class="btn btnS"><i style="color:white" class="fa fa-link"></i>Pay Now</button>
                        </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                @foreach($orders as $om):
                @foreach($om->product as $op):
                <tr>
                    <td><div><i class="fa fa-shopping-bag"></i>{{$op->title}}</div></td>
                    <td class="col-td-2"><div>INR {{$op->price}}</div></td>
                    <td class="col-td">                        
                        <div style="background: #5cb85c;text-align: center">
                            <i style="color:white" class="fa fa-check"> Paid</i>
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