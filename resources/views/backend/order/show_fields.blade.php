<div class="container-fluid add-product show-order">
    <div class="row">
        <div class="col-md-12">	
            <table class="table table-bordered ">
                <tr>
                    <td colspan="5"><b>Order ID :</b> #{{ $order->order_no }}
                        <span style='float:right'>
                            <b>Order Date</b> : {{ $order->order_date_formatted }}
                        </span></td>
                </tr>
                <tr>
                    <th>Product</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
                <?php
                $sub_total = 0;
                ?>
                @foreach($order->product as $item)
                <tr>

                    <td class="text-left">
                        {{ $item->title }}
                    </td>
                    <td class="text-right">{{ $order->amount }}</td>
                    <td class="text-center">1</td>
                    <td class="text-right">{{ $order->amount }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3" class="text-right">SubTotal</th>
                    <th class="text-right">{{ $order->amount }}</th>
                </tr>
                @if($order->shipping)
                <tr>
                    <th colspan="3" class="text-right">Shipping</th>
                    <th class="text-right">{{ ($order->shipping) }}</th>
                </tr>
                @endif
                @if($order->tax)
                <tr>
                    <th colspan="3" class="text-right">Tax</th>
                    <th class="text-right">{{ ($order->tax) }}</th>
                </tr>
                @endif
                @if($order->discount_amount > 0)
                <tr>
                    <th colspan="3" class="text-right">Discount</th>
                    <th class="text-right">- {{ ($order->discount_amount) }}</th>
                </tr>
                @endif
                <tr>
                    <th colspan="3" class="text-right">Total</th>
                    <th class="text-right">{{ ($order->total_amount) }}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Customer Details : </h4></td>
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
                    <td>{{ $order->user->mobile }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 billing-info">
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Billing Information : </h4></td>
                </tr>
                <tr>
                    <td>Address1</td>
                    <td>{{ $order->billing_address1 }}</td>
                </tr>
                <tr>
                    <td>Address2</td>
                    <td>{{ $order->billing_address2 }}</td>
                </tr>
                <tr>
                    <td>Area</td>
                    <td>{{ $order->billing_area }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $order->billing_city }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $order->billing_state }}</td>
                </tr>


                <tr>
                    <td>Zipcode</td>
                    <td>{{ $order->billing_zip }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 shipping-info">
            {!! Form::model($order, ['route' => ['admin.order.update', $order->id], 'method' => 'patch', 'files'=>true]) !!}
            <table class="table table-bordered">
                <tr>
                    <td colspan="2"><h4>Shipping Information : </h4></td>
                </tr>
                <tr>
                    <td>Address1</td>
                    <td>{{ $order->shipping_address1 }}</td>
                </tr>
                <tr>
                    <td>Address2</td>
                    <td>{{ $order->shipping_address2 }}</td>
                </tr>
                <tr>
                    <td>Area</td>
                    <td>{{ $order->shipping_area }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $order->shipping_city }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $order->shipping_state }}</td>
                </tr>


                <tr>
                    <td>Zipcode</td>
                    <td>{{ $order->shipping_zip }}</td>
                </tr>
                <tr>
                    <td>Status : </td>
                    <td>
                        {!! Form::select('status_id', $status, $order->status_id, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
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
                    <td colspan="3"><h4>Books to Dispatch</h4></td>
                </tr>
                <tr>
                    <th width="70%">Book</th>
                    <th class="text-center" width="15%">Quantity</th>
                </tr>
                @foreach($order->product as $prod)
                @foreach($item->books as $bk)

                <tr>
                    <td class="text-left">
                        {{ $bk->name }}
                    </td>
                    <td class="text-center">{{ $bk->pivot->quantity }}</td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </div>
    </div>    
</div>
