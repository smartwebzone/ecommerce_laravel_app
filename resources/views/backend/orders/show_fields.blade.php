<?php
if($order->fraud_flag == 'Suspicious'){
    $ip_details = json_decode(file_get_contents("http://ipinfo.io/{$order->ip_add}/json"));
    $ip_location = $ip_details->region.', '.$ip_details->country.' ('.$ip_details->ip.')';
}
?>
<div class="container-fluid add-product show-order">
    @if($order->fraud_flag == 'Suspicious'):
    <div class="row">
        <div class="col-md-12">	
            <table class="table table-bordered">
                <tr class="danger">
                    <td>
                        <h4>This order looks suspicious</h4>
                        <p><b>Order Location :</b> {{$ip_location}}</p>
                        <a onclick="return confirm('Are you sure want to mark this order as fraud order?')" href="{!! route('admin.orders.fraud', [$order->id]) !!}" class='btn btn-danger'>Yes, this is a fraud order!</a>
                        <a onclick="return confirm('Are you sure want to mark this order as genuine order?')" href="{!! route('admin.orders.genuine', [$order->id]) !!}" class='btn btn-success'>No, this is a genuine order!</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">	
            <table class="table table-bordered ">
                <tr>
                    <td colspan="5"><h4>Order ID : #{{ $order->order_no }}</h4>
                        <span style='float:right'>
                            Order Date : {{ $order->created_at }}
                            @if($order->charge_date)
                            <br/>Charge Date : {{ $order->charge_date }}
                            @endif
                        </span></td>
                </tr>
                <tr>
                    <th class="text-center"></th>
                    <th>Product</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
                <?php
                $sub_total = 0;
                ?>
                @foreach($orderDetails as $item)
                <?php
                $price = $item->product->prices->find($item->price_id);
                $suborderDetails = App\Models\OrderSubProduct::where('order_product_id', $item->id)->get();
                $subprice = 0;
                $sub_prd = '';
                ?>
                <tr>
                    <td class="text-center"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $item->product->thumbnail }}" /></td>
                    <td class="text-left">
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
                                $subprice += $sd->order_price;//App\Models\Price::find($prods_price_id)->final_price;
                                $sub_prd = App\Models\ProductSubProducts::where('product_id', $item->product_id)->where('sub_product_id', $sd->product_id)->first();
                                 echo (@$sub_prd->id)?(' - '.@$sub_prd->label_custom.' '):'';
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
                    </td>
                    <td class="text-right">{{ formatDollar($item->order_price+$subprice) }}</td>
                    <td class="text-center">{{ $item->amount }}</td>
                    <td class="text-right">{{ formatDollar((@$item->order_price+$subprice)*$item->amount) }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">SubTotal</th>
                    <th class="text-right">{{ formatDollar($sub_total) }}</th>
                </tr>
                @if($order->shipping_amount)
                <tr>
                    <th colspan="4" class="text-right">Shipping</th>
                    <th class="text-right">{{ formatDollar($order->shipping_amount) }}</th>
                </tr>
                @endif
                @if($order->tax_amount)
                <tr>
                    <th colspan="4" class="text-right">Tax</th>
                    <th class="text-right">{{ formatDollar($order->tax_amount) }}</th>
                </tr>
                @endif
                @if($order->discount_amount > 0)
                <tr>
                    <th colspan="4" class="text-right">Discount</th>
                    <th class="text-right">- {{ formatDollar($order->discount_amount) }}</th>
                </tr>
                @endif
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th class="text-right">{{ formatDollar($order->amount) }}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Customer ID : #{{ $order->user->id }}</h4></td>
                </tr>
                <tr>
                    <td>First name</td>
                    <td>{{ $order->user->first_name }}</td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td>{{ $order->user->last_name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->user->userinfo->phone }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 billing-info">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Billing Information : </h4></td>
                </tr>
                <tr>
                    <td>First name</td>
                    <td>{{ $order->billing_firstname }}</td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td>{{ $order->billing_lastname }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->billing_phone }}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ $order->billing_country }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $order->billing_state }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $order->billing_city }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $order->billing_address }}</td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td>{{ $order->billing_zipcode }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 shipping-info">
            {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'patch']) !!}
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Shipping Information : </h4></td>
                </tr>
                @if($order->user->isDealer)
                <tr>
                    <td>DropShip</td>
                    <td>{{ ($order->shipping_dropship)?'Yes':'No' }}</td>
                </tr>
                @endif
                @if($order->user->isDealer)
                <tr>
                    <td>Shipping Account</td>
                    <td>
                        {{ ($order->shipping_account_id)?'Yes':'No' }}
                        @if($order->shipping_account_id)
                        <br>
                        Account : {{ $order->shippingAccount->find($order->shipping_account_id)->account}}<br>
                        Number : {{ $order->shippingAccount->find($order->shipping_account_id)->number}}
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td>First name</td>
                    <td>{{ $order->firstname }}</td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td>{{ $order->lastname }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ $order->shipping_country }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $order->shipping_state }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $order->shipping_city }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $order->shipping_address }}</td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td>{{ $order->shipping_zipcode }}</td>
                </tr>
                <tr>
                    <td>Status : </td>
                    <td>
                        <select name="status" id="status" class="form-control">
                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Confirmed" {{ $order->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="Shipping" {{ $order->status == 'Shipping' ? 'selected' : '' }}>Shipping</option>
                            <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }} >Delivered</option>
                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }} >Cancelled</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td><textarea class="form-control" name="status_reason">{{$order->status_reason}}</textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="Update Order Status">
                    </td>
                </tr>
            </table>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">	
            <table class="table table-bordered ">
                <tr>
                    <td colspan="3"><h4>Items to Dispatch</h4></td>
                </tr>
                <tr>
                    <th class="text-center" width="15%"></th>
                    <th width="70%">Product</th>
                    <th class="text-center" width="15%">Quantity</th>
                </tr>
                @foreach($orderDetails as $item)
                <?php
                $price = $item->product->prices->find($item->price_id);
                ?>
                <tr>
                    <td class="text-center"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $item->product->thumbnail }}" /></td>
                    <td class="text-left">
                        {{ $item->product->name }}
                        @if($item->product->prices->count()>1)
                        ({!!(@$price->title)?@$price->title:@$price->model!!})
                        @endif
                        @if($item->options)
                        @foreach($options as $optionValue)
                        @if(in_array($optionValue->id,explode(',',$item->options)))
                        - {{ $optionValue->value }}
                        @endif
                        @endforeach
                        @endif 
                    </td>
                    <td class="text-center">{{ $item->amount }}</td>
                </tr>
                <?php
                $suborderDetails = App\Models\OrderSubProduct::where('order_product_id', $item->id)->get();
                if($suborderDetails){
                    
                    foreach ($suborderDetails as $sd):
                        $suboptions = '';
                        if($sd->options){
                            $suboptions='(';
                            $sub_options=  \App\Models\OptionValue::whereIn('id', explode(',',$sd->options))->get();
                            foreach($sub_options as $so):
                                //dd($so->option->name);
                                $suboptions.=$so->option->name.' : '.$so->value. ', ';
                            endforeach;
                            $suboptions=  trim($suboptions, ', ').')';
                        }
                        $sub_product_details = App\Models\Product::where('id', $sd->product_id)->first();
                        $sub_price = $sub_product_details->prices->find($sd->price_id);
                       
                        ?>
                        <tr>
                            <td class="text-center"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $sub_product_details->thumbnail }}" /></td>
                            <td class="text-left">{!! $sub_product_details->name.' '.$suboptions !!}
                             @if($sub_price)
                                ({!!(@$sub_price->title)?@$sub_price->title:@$sub_price->model!!})
                            @endif
                            </td>
                            <td class="text-center">{!!  $sd->amount !!}</td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
                @if($item->product->ProductSubProducts->where('optional',0)->count()>0)
                @foreach($item->product->ProductSubProducts->where('optional',0) as $row)
                <?php
                $sub_product_details = App\Models\Product::where('id', $row->sub_product_id)->first();
                ?>
                <tr>
                    <td class="text-center"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $sub_product_details->thumbnail }}" /></td>
                    <td class="text-left">{!! $sub_product_details->name !!}</td>
                    <td class="text-center">{!!  $item->amount*$row->quantity !!}</td>
                </tr>
                @endforeach
                @endif
                @endforeach
            </table>
        </div>
    </div>    
</div>
