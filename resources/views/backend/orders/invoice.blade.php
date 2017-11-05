<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <title>Jeevandeep Admin</title>
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
                                <table class="print_table">
                                    <tbody>
                                        <tr>
                                            <td width="50%" class="text-left">
                                                JEEVANDEEP PRAKASHAN PVT. LTD.
                                            </td>
                                            <td class="text-right" style="font-size:26px;">#{{ $order->transaction_id }} / {{ $order->order_date }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="print_table">
                                    <tbody>
                                        <tr>
                                            <td width="33%" class="text-left">
                                                <h4>Customer Details:</h4>
                                                <div class="">
                                                    <address>
                                                        <strong>{{ $order->user->first_name }} {{ $order->user->last_name }}</strong>
                                                        <br>
                                                        <br/>
                                                        <abbr title="Email">Email:</abbr> {{ $order->user->email }}
                                                    </address>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <h4>Billing Information:</h4>
                                                <div class="">
                                                    <address>
                                                        <strong>{{ $order->billing_firstname }} {{ $order->billing_lastname }}</strong>
                                                        <br>
                                                        {{ $order->billing_address }}
                                                        <br>
                                                        {{ $order->billing_city.", ".$order->billing_state.", ".$order->billing_zipcode.", ".$order->billing_country }}
                                                       
                                                    </address>
                                                </div>    
                                            </td>
                                            <td class="text-left">
                                                <h4>Shipping Information:</h4>
                                                <div class="">
                                                    <address>
                                                        <strong>{{ $order->firstname }} {{ $order->lastname }}</strong>
                                                        <br>
                                                        {{ $order->shipping_address }}
                                                        <br>
                                                        {{ $order->shipping_city.", ".$order->shipping_state.", ".$order->shipping_zipcode.", ".$order->shipping_country }}
                                                      
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="60%"> Product </th>
                                            <th width="15%" class="hidden-480 text-right"> Unit Price </th>
                                            <th width="10%" class="hidden-480 text-center"> Quantity </th>
                                            <th width="15%" class="text-right"> Total </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sub_total = 0;
                                        ?>
                                        @foreach($order->product as $item)
                                       
                                        <tr>
                                            <td>
                                                {{ $item->title }} 
                                              
                                            </td>
                                            <td class="text-right">{!! ($order->amount) !!}</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">{{ ($order->amount) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table no_border_table" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <td width="17%"> <strong>Order Status :</strong> </td>
                                            <td> {{ $order->status->name }} </td>
                                        </tr>
                                        @if($order->status_reason)
                                        <tr>
                                            <td width="17%"> <strong>Notes :</strong> </td>
                                            <td> {{ $order->status_reason }} </td>
                                        </tr>
                                        @endif
                                        @if($order->charge_date)
                                        <tr>
                                            <td width="17%"> <strong>Charge Date :</strong> </td>
                                            <td> {{ $order->charge_date }} </td>
                                        </tr>
                                        @endif
                                    </thead>   
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