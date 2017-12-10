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
        @if(app('request')->input('error'))
        <div class="alert alert-danger">{{app('request')->input('error')}}</div>
        @endif
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
        @if(count($cart_data) > 0 || app('request')->input('success') == 1)
        <div class="select-div"><i class="fa fa-shopping-basket"></i>Your Shopping Cart</div>
        <div class="please-select">This is your shopping cart. If you have any items pending payment, please click 'Pay Now' to continue.</div>
        <div class="cf">
            <table class="cart-table">
                <tr>
                    <th>&nbsp;</th>
                    <th class="col-td-1">product</th>
                    <th align="center" class="col-td-2">TOTAL PAYABLE</th>
                    <th class="col-td-3">&nbsp;</th>
                </tr>
                @foreach($cart_data as $row)
                <tr>
                    <td class="text-center"><div><a href="{{route('store.cart.delete',$row->id)}}" onclick="return confirm('Are you sure want to delete this prodct from cart?')"><i class="fa fa-trash" style="margin-right:0px;"></i></a></div></td>
                    <td><div><a rel="group" class="thickbox" href="{!! route('store.product', [$row->product_id]) !!}?width=905&height=505" title="{!! $row->product()->find($row->product_id)->title !!}"><i class="fa fa-shopping-bag"></i>{{$row->product()->find($row->product_id)->title}}</a></div></td>
                    <td class="col-td-2"><div>INR {{$row->product()->find($row->product_id)->price}}</div></td>
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
                    <td class="text-center"><div><a href="javascript:;" class="disabled"><i class="fa fa-trash" style="margin-right:0px;"></i></a></div></td>
                    <td><div><a rel="group" class="thickbox" href="{!! route('store.orderproduct', [$om->id]) !!}?width=905&height=505" title="{!! $op->title !!}"><i class="fa fa-shopping-bag"></i>{{$op->title}}</a></div></td>
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