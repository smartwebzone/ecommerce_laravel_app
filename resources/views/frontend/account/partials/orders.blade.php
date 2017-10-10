<table class="table table-striped table-bordered">
    <tr id="table-header">
        <td class="text-center">Order ID</td>
        <td class="text-center">Items</td>
        <?php $cnt=6;?>
        @if($user->isDealer)
        <?php $cnt=8;?>
        <td class="text-center">Dropship</td>
        <td class="text-center">Shipping Account</td>
        @endif
        <td class="text-center">Status</td>
        <td class="text-right">Total</td>
        <td class="text-center">Order Date</td>
        <td width="1px" class="text-center"></td>
    </tr>
    @foreach($orders as $order)
    <tr class="clickable" data-href="{{ url('/order/'.$order->id.'/show') }}">            
        <td class="text-center">{{ $order->order_no }}</td>
        <td class="text-center">{{ $order->products->count() }}</td>
        
        @if($order->user->isDealer)              
        <td class="text-center">{{ ($order->shipping_dropship)?'Yes':'No' }}</td>
        @endif
        @if($order->user->isDealer)
                
                    <td>
                        @if($order->shipping_account_id)
                            Account :{{ $order->shippingAccount->find($order->shipping_account_id)->account}}<br>
                            Number :{{ $order->shippingAccount->find($order->shipping_account_id)->number}}
                        @else
                            NO
                        @endif
                    </td>
                @endif
        <td class="text-center">{{ $order->status }}</td>
        <td class="text-right">${{ $order->amount }}</td>
        <td class="text-center">{{ $order->created_at }}</td>
        <td class="text-center" nowrap="nowrap">
            <a target="_blank" href="{!! route('orders.invoice', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-file"></i></a>
            <span data-id="detail-{{$order->id }}" class="expand-details fa fa-plus" role="button"></span></td>
    </tr>
    <tr class="order-product hide" id="detail-{{$order->id }}">
        <td colspan="{{$cnt}}">
            <table class="table cart">
                <thead class="order-head">
                    <tr>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-quantity">Quantity</th>

                        <th class="cart-product-subtotal text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sub_total = 0;
                    ?>
                    @foreach($order->product as $item)

                    <?php
                    $product_link = url(getLang() . '/product/' . $item->product->slug);
                    $price = $item->product->prices->find($item->price_id);

                    $suborderDetails = App\Models\OrderSubProduct::where('order_product_id', $item->id)->get();
                    
                    $subprice = 0;
                    $sub_prd = '';
                    
                    
                    ?>
                    <tr class="cart_item product-{{ $item->product->id }}">
                        <td class="cart-product-thumbnail">
                            <a href="{{ $product_link }}"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $item->product->thumbnail }}" /></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="{{ $product_link }}">
                                {{ $item->product->name }}
                                @if($item->product->prices->count()>1)
                                ({!!(@$price->title)?@$price->title:@$price->model!!})
                                @endif
                                <?php  if ($suborderDetails) {
                                   foreach($suborderDetails as $key=>$sd):
                                    $prods_price = App\Models\Product::find($sd->product_id)->prices->first();
                                    $prods_price_id = $prods_price->id;
                                    if ($sd->price_id) {
                                        $prods_price_id = $sd->price_id;
                                    }
                                    $subprice += $sd->order_price;// App\Models\Price::find($prods_price_id)->final_price;
                                    $sub_prd = App\Models\ProductSubProducts::where('product_id', $item->product_id)->where('sub_product_id', $sd->product_id)->first();
                                    echo (@$sub_prd->id)?(' - '.@$sub_prd->label_custom.' '):'';
                                    
                                    endforeach;
                                    $sub_total += ($item->order_price+$subprice) * $item->amount;
                                }?>
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


                        <td class="cart-product-subtotal text-right">
                            <span class="amount"><?= formatDollar((@$item->order_price+$subprice)*$item->amount) ?></span>

                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="cart-product-quantity"><b>SubTotal :</b><br/><span class="amount"> <?= formatDollar($sub_total) ?></span></td>
                        <td class="cart-product-quantity"><b>Shipping :</b><br/><span class="amount"> <?= formatDollar($order->shipping_amount) ?></span></td>

                        <td class="cart-product-quantity"><b>Tax :</b><br/><span class="amount"> <?= formatDollar($order->tax_amount) ?></span></td>

                        <td class="cart-product-quantity">
                            <?php if($order->discount_amount > 0){?>
                            <b>Discount :</b><br/><span class="amount">- <?= formatDollar($order->discount_amount) ?></span>
                            <?php }?>
                        </td>

                        <td class="cart-product-quantity text-center"><b>Total :</b><br/><span class="amount"><?= formatDollar($order->amount) ?></span></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    @endforeach
</table>
<script>
    $('.expand-details').click(function () {
        $('#' + $(this).attr('data-id')).toggleClass('hide');
        $(this).toggleClass('fa-plus fa-minus');
    });
</script>