<?php
foreach ($order->product as $item) {
    $invoice_title = ($item->is_taxable == 1 ? 'TAX INVOICE' : 'BILL OF SUPPLY');
}
?>
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
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/bower_components/font-awesome/css/font-awesome.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/fonts/clip-font.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('/clip/assets/css/main-responsive.min.css') !!}" />

        <style type="text/css">
            ul.list-unstyled li{padding-bottom: 2px;}
            .print_table{border:none; width:100%;cellpadding:0;cellspacing:0}
            .print_table td{vertical-align: top;}
            .no_border_table td{border-bottom:solid 1px #fff;}
            .greybg{background: #d3d3d3}
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- start: PAGE CONTENT -->
                    <div class="invoice">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 style="text-align:center">{{$invoice_title}}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="print_table">
                                    <tbody>
                                        <tr>
                                            <td width="50%" class="text-left">
                                                <h4>JEEVANDEEP PRAKASHAN PVT. LTD.</h4>
                                            </td>
                                            <td class="text-right"><h4>#{{ $order->order_no }} / {{ $order->order_date_formatted }}</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr style="padding:0px;margin:0px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="print_table">
                                    <tbody>
                                        <tr>
                                            <td width="25%" class="text-left">
                                                <h4>Order Details:</h4>
                                                <div class="">
                                                    <strong>Order ID</strong>
                                                    <br/>{{ $order->order_no }}
                                                    <br/><strong>Order Date</strong>
                                                    <br/>{{ $order->order_date_formatted }}
                                                    <br/><strong>Preferred Delivery Date</strong>
                                                    <br/>{{ $order->preferred_delivery_date_formatted }}
                                                    <br/><strong>Order Status</strong>
                                                    <br/>{{ $order->status->name }}
                                                </div>
                                            </td>
                                            <td width="25%" class="text-left">
                                                <h4>Customer Details:</h4>
                                                <div class="">
                                                    <strong>Parent / Guardian Name</strong>
                                                    <br/>{{ $order->user->parent_name }}
                                                    <br/><strong>Child Name</strong>
                                                    <br/>{{ $order->user->child_name }}
                                                    <br/><strong>Email ID</strong>
                                                    <br/>{{ $order->user->email }}
                                                    <br/><strong>Phone</strong>
                                                    <br/>{{ $order->user->mobile }}
                                                </div>
                                            </td>
                                            <td width="25%" class="text-left">
                                                <h4>Billing Information:</h4>
                                                <div class="">
                                                    <address>
                                                        {{ $order->billing_address1.' '.$order->billing_address2 }}
                                                        <br>
                                                        {{ $order->billing_city.", ".$order->billing_state.", ".$order->billing_zip }}

                                                    </address>
                                                </div>    
                                            </td>
                                            <td width="25%" class="text-left">
                                                <h4>Shipping Information:</h4>
                                                <div class="">
                                                    <address>
                                                        {{ $order->shipping_address1.' '.$order->shipping_address2 }}
                                                        <br>
                                                        {{ $order->shipping_city.", ".$order->shipping_state.", ".$order->shipping_zip }}

                                                    </address>
                                                </div>    
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="print_table table">

                                    <?php
                                    $sub_total = 0;
                                    ?>
                                    @foreach($order->product as $item)
                                    <?php
                                    $ps = $item;
                                    ?>
                                    <thead>
                                        <tr>
                                            <th colspan="6"> Product : {{$item->pivot->title}} </th>
<!--                                            <th width="15%" class="hidden-480 text-right"> Unit Price </th>
                                            <th width="10%" class="hidden-480 text-center"> Quantity </th>
                                            <th width="15%" class="text-right"> Total </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('common/orderproductdetail')
<!--                                        <tr>
                                            <td>{{ $item->title }} </td>
                                            <td class="text-right">{!! ($order->amount) !!}</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">{{ ($order->amount) }}</td>
                                        </tr>-->
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--                        <div class="row">
                                                    <div class="col-sm-12 invoice-block">
                                                        <ul class="list-unstyled amounts">
                                                            <li>
                                                                <strong>SubTotal :</strong> {{ ($order->amount) }}
                                                            </li>
                                                            @if($order->shipping)
                                                            <li>
                                                                <strong>Shipping :</strong> {{ ($order->shipping) }}
                                                            </li>
                                                            @endif
                                                            @if($order->tax)
                                                            <li>
                                                                <strong>Tax :</strong> {{ ($order->tax) }}
                                                            </li>
                                                            @endif
                                                            @if($order->discount_amount > 0)
                                                            <li>
                                                                <strong>Discount :</strong>  -{{ ($order->discount_amount) }}
                                                            </li>
                                                            @endif
                                                            <li>
                                                                <strong>Total :</strong> {{ ($order->total_amount) }}
                                                            </li>                                </ul>
                                                        <br>
                        
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-md-12">	
                                <table class="print_table table table-bordered ">
                                    <tr>
                                        <td colspan="2"><h4>Items to Dispatch</h4></td>
                                    </tr>
                                    <tr>
                                        <th width="70%">Item</th>
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
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
        </div>
    </body>
</html>