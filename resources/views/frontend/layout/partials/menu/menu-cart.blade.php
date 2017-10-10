<?php $total_cart_items = 0; ?>
@foreach($cart as $item)
<?php $total_cart_items += $item->amount; ?>
@endforeach
<!-- Top Cart ============================================= -->
<div id="top-cart">
    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{!! $total_cart_items !!} </span></a>
    <div class="top-cart-content">
        <div class="top-cart-title">
            <h4>Shopping Cart</h4>
        </div>
        <div class="top-cart-items">
            @foreach($cart as $item)
            <div class="top-cart-item clearfix">
                <div class="top-cart-item-image">
                    <a href="#"><img itemprop="image" src="{!! asset('/uploads/products/thumb/')  !!}/{!! $item->product->thumbnail !!}" alt="{!! $item->product->slug !!}" /></a>
                </div>
                <div class="top-cart-item-desc">
                    <a href="#">  {!! $item->product->name!!}  </a>
                    <?php $price = $item->product->prices->find($item->price_id); ?>


                    <span class="top-cart-item-price">  
                        @if($item->product->prices->count()>1)
                        ({!!($price->title)?$price->title:$price->model!!})
                        @endif
                        <?php
                        $pric = floatval(preg_replace('/[\$,]/', '', $price->final_price));
                        $prods_sub = NULL;
                        if ($item->sub_product) {
                            foreach ($item->sub_product as $key=>$sub_product) {
                                $sub_prd = App\Models\ProductSubProducts::find($sub_product);
                                $prods_sub = App\Models\Product::find($sub_prd->sub_product_id);
                                echo (@$prods_sub->name) ? (' - ' . @$sub_prd->label_custom . ' ') : '';
                                $prods_price = App\Models\Product::find($sub_prd->sub_product_id)->prices->first();
                                $prods_price_id = $prods_price->id;
                                if ($item['sub_price_id'][$key]) {
                                    $prods_price_id = $item['sub_price_id'][$key];
                                }
                                $pric+=(floatval(preg_replace('/[\$,]/', '', App\Models\Price::find($prods_price_id)->final_price)) * $sub_prd->quantity);
                            }
                        }
                        ?>
                    </span>

                    <span class="top-cart-item-price">  {!! '$'.number_format($pric*$item->amount, 2, '.', ',') !!}  </span>

                    <span class="top-cart-item-quantity"> x  {!! $item->amount  !!} </span>
                </div>
            </div>
            @endforeach

        </div>
        <div class="top-cart-action clearfix">
            <span class="fleft top-checkout-price">$ {!! $total !!} </span>
            <button id="view-cart" class="button button-3d button-small nomargin fright gotocart" onclick="document.location = '{!! url(getLang().'/cart') !!}'">View Cart</button>
        </div>
    </div>
</div><!-- #top-cart end -->
