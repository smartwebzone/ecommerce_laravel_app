@extends('frontend/layout/right-sidebar')


@section('htmlschema')
itemscope itemtype="http://schema.org/"
@endsection

@section('seo')@endsection
@section('jsonschema')@endsection

@section('title')
Orders History
@endsection

@section('bodyschema')@endsection

@section('bodytag')
rows page
@endsection

@section('header_styles')
<style>
    .order-head{
        background: #f6f6f6!important;
        border: 1px #ddd solid;
    }
</style>
@endsection
@section('scripts')@endsection
@section('ppscripts')@endsection

@section('submenu')
@include('frontend.layout.partials.menu.submenu-items', ['items'=> $menu_pagedisclusures->roots()])
@endsection

@section('page-title')
<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Orders History</h1>
    </div>

</section>


@endsection

@section('content')
<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <table class="table cart">


                @foreach($orders as $order)
                <thead class="order-head">
                    <tr>
                        <th class="cart-product-id">Order ID</th>

                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-thumbnail">Order Date</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-quantity">Quantity</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>

                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($order->product as $item)

                    <?php
                    $product_link = url(getLang() . '/product/' . $item->product->slug);
                    $price = $item->product->prices->find($item->price_id);

                    $suborderDetails = App\Models\OrderSubProduct::where('order_product_id', $item->id)->get();

                    $subprice = 0;
                    $sub_prd = '';
                    ?>
                    <tr class="cart_item product-{{ $item->product->id }}">
                        <td>{{ $order->order_no }}</td>


                        <td class="cart-product-thumbnail">
                            <a href="{{ $product_link }}"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $item->product->thumbnail }}" /></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="{{ $product_link }}">
                                {{ $item->product->name }} 
                                @if($item->product->prices->count()>1)
                                ({!!(@$price->title)?@$price->title:@$price->model!!})
                                @endif
                                <?php
                                if ($suborderDetails) {
                                    foreach ($suborderDetails as $key => $sd):
                                        $prods_price = App\Models\Product::find($sd->product_id)->prices->first();
                                        $prods_price_id = $prods_price->id;
                                        if ($sd->price_id) {
                                            $prods_price_id = $sd->price_id;
                                        }
                                        $subprice += $sd->order_price;//App\Models\Price::find($prods_price_id)->final_price;
                                        $sub_prd = App\Models\ProductSubProducts::where('product_id', $item->product_id)->where('sub_product_id', $sd->product_id)->first();
                                        echo (@$sub_prd->id) ? (' - ' . @$sub_prd->label_custom . ' ') : '';
                                    endforeach;
                                }
                                ?>
                                @if($item->options)
                                @foreach($options as $optionValue)
                                @if(in_array($optionValue->id,explode(',',$item->options)))
                                - {{ $optionValue->value }}
                                @endif
                                @endforeach
                                @endif
                            </a>
                        </td>
                        <td class="cart-product-price">
                            <div class="quantity clearfix">{{ $order->created_at }}</div>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount">{!! $item->product->price+$subprice !!}</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                {{ $item->amount }}
                            </div>
                        </td>

                        <td class="cart-product-thumbnail">&nbsp;</td>

                        <td class="cart-product-subtotal">
                            <span class="amount"><?= '$' . number_format((floatval(preg_replace('/[\$,]/', '', $item->product->price)) + $subprice) * $item->amount, 2, '.', ',') ?></span>

                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="cart-product-quantity"><b>Shipping :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= '$' . number_format(floatval(preg_replace('/[\$,]/', '', $order->shipping_amount)), 2, '.', ',') ?></span></td>

                        <td class="cart-product-quantity"><b>Tax :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= '$' . number_format(floatval(preg_replace('/[\$,]/', '', $order->tax_amount)), 2, '.', ',') ?></span></td>

                        <td class="cart-product-quantity"><b>Discount :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount">- <?= '$' . number_format(floatval(preg_replace('/[\$,]/', '', $order->discount_amount)), 2, '.', ',') ?></span></td>

                        <td class="cart-product-quantity"><b>Total :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= '$' . number_format(floatval(preg_replace('/[\$,]/', '', $order->amount)), 2, '.', ',') ?></span></td>
                    </tr>
                    <tr>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                        <td class="cart-product-thumbnail">&nbsp;</td>
                    </tr>
                </tbody>
                @endforeach


            </table>

            <!--<a href="{{ url(getLang().'/shop')}}" class="button button-3d nomargin button-blue"><i class="fa fa-trash-o"></i> Continue Shopping</a>-->


        </div>

    </div>

</section><!-- #content end -->
@endsection

@section('footer_scripts')@endsection

@section('pp_footer_scripts-off')
<script>
    var ToC =
            "<nav role='navigation' class='table-of-contents'>" +
            "<h2>On this page:</h2>" +
            "<ul>";

    var newLine, el, title, link;

    $(".postcontent h2, .postcontent h3").each(function () {

        el = $(this);
        title = el.text();
        link = "#" + el.attr("id");

        newLine =
                "<li>" +
                "<a href='" + link + "'>" +
                title +
                "</a>" +
                "</li>";

        ToC += newLine;

    });

    ToC +=
            "</ul>" +
            "</nav>";

    $("#toc-content").prepend(ToC);
</script>
@endsection

@section('inlinejs')@endsection