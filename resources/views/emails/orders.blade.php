<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin clearfix">
                <p>Hi {{ $username }},</p>
                <p>Thank you for your purchase. If you have any questions that we can help with, please feel free to email us at info@jeevandeep.com. Thanks so much!</p>
            </div><!-- .postcontent end -->
            <!-- Sidebar
            ============================================= -->
            <br><br><br><br>
            <div class="clearfix">
                <h4>Orders</h4>
            </div>
            <table class="table cart" style="width:100%;border:1px solid;text-align: center">
                <thead>
                    <tr>
                        <th class="cart-product-id">ID</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-quantity">Quantity</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    $sub_total = 0;
                    ?>
                    @foreach($orderDetails as $item)
                    <?php
                    $product_link = url(getLang() . '/product/' . $item->product->slug);
                    $price = $item->product->prices->find($item->price_id);

                    $suborderDetails = App\Models\OrderSubProduct::where('order_product_id', $item->id)->get();
                    // $sub_prd = ProductSubProducts::find($item->sub_product);
                    // dd($suborderDetails);
                    $price = $item->product->prices->find($item->price_id);
                    $subprice = 0;
                    $sub_prd = '';
                    ?>
                    <tr class="cart_item product-{{ $item->product->id }}">
                        <td><a href="{{ $product_link }}">{{ $index++ }}</a></td>


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
                                    foreach ($suborderDetails as $sd):
                                        $prods_price = App\Models\Product::find($sd->product_id)->prices->first();
                                        $prods_price_id = $prods_price->id;
                                        if ($sd->price_id) {
                                            $prods_price_id = $sd->price_id;
                                        }
                                        $subprice += App\Models\Price::find($prods_price_id)->final_price;
                                        $sub_prd = App\Models\ProductSubProducts::where('product_id', $item->product_id)->where('sub_product_id', $sd->product_id)->first();
                                        echo (@$sub_prd->id) ? (' - ' . @$sub_prd->label_custom . ' ') : '';
                                    endforeach;
                                }

                                $sub_total += ($item->order_price + $subprice) * $item->amount;
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
                            <span class="amount">{!! formatDollar(@$item->order_price+$subprice) !!}</span>
                        </td>

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                {{ $item->amount }}
                            </div>
                        </td>

                        <td class="cart-product-subtotal">
                            <span class="amount"><?= formatDollar((@$item->order_price + $subprice) * $item->amount) ?></span>

                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="cart-product-quantity"><b>SubTotal :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= formatDollar($sub_total) ?></span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="cart-product-quantity"><b>Shipping :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= formatDollar($order->shipping_amount) ?></span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="cart-product-quantity"><b>Tax :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= formatDollar($order->tax_amount) ?></span></td>
                    </tr>
                    @if($order->discount_amount > 0)
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="cart-product-quantity"><b>Discount :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount">- <?= formatDollar($order->discount_amount) ?></span></td>
                    </tr>                            
                    @endif
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="cart-product-quantity"><b>Total :</b></td>
                        <td class="cart-product-subtotal"> <span class="amount"><?= formatDollar($order->amount) ?></span></td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

</section><!-- #content end -->