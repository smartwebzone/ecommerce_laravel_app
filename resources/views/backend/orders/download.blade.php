<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <title>Invoice</title>
        <link rel="shortcut icon" href="{!! asset('/clip/favicon.ico') !!}" />
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->

        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" />

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2><h3 class="pull-right">Order # {{ $order->order_no }}</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{ $order->user->parent_first_name }} {{ $order->user->parent_last_name }}<br>
                                <a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a><br>
                                {{ $order->user->userinfo->phone }}
                            </address>
                        </div>
                        <div class="col-xs-4">
                            <address>
                                <strong>Shipped To:</strong><br>
                                {{ $order->firstname }} {{ $order->lastname }}<br>
                                {{ $order->shipping_address }}<br>
                                {{ $order->shipping_zipcode }}<br>
                                {{ $order->status}}<br>
                                {{ $order->phone }}<br>
                                {{ $order->shipping_state }},{{ $order->shipping_city }}<br>
                                {{ $order->shipping_country }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ $order->created_at }}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tr>
                                        <td colspan="5"><h4>Order ID : #{{ $order->order_no }}</h4>
                                            <span style='float:right'>Order Date : {{ $order->created_at }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Product</th>
                                        <th class="text-right">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    @foreach($orderDetails as $detail)
                                    <?php
                                    $price = $detail->product->prices->find($detail->price_id);
                                    ?>
                                    <tr>
                                        <td class="text-center"><img width="64" height="64" src="{{ asset('/uploads/products/thumb/')  }}/{{ $detail->product->thumbnail }}" /></td>
                                        <td>
                                            {{ $detail->product->name }}
                                            @if($detail->product->prices->count()>1)
                                            ({!!(@$price->title)?@$price->title:@$price->model!!})
                                            @endif
                                            @if($detail->options)
                                            @foreach($options as $optionValue)
                                            @if(in_array($optionValue->id,explode(',',$detail->options)))
                                            - {{ $optionValue->value }}
                                            @endif
                                            @endforeach
                                            @endif 
                                        </td>
                                        <td class="text-right">{{ formatDollar($detail->order_price) }}</td>
                                        <td class="text-center">{{ $detail->amount }}</td>
                                        <td class="text-right">{{ formatDollar(@$detail->order_price*$detail->amount) }}</td>
                                    </tr>
                                    @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
