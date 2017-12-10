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
            .div_border{border: solid 1px #000;}
            .three_col td{width:33.33%;padding:0px !important;border-color: #000 !important;}
            .three_col{margin:0px !important;padding-top:7px !important;font-size: 12px !important;}
            .table2 td{width:33.33%;padding:3px !important;border-color: #000 !important;}
            .table2{margin:0px !important;padding-top:10px !important;font-size: 11px !important;}
            .table3{margin:0px !important;padding-top:20px !important;font-size: 12px !important;}
            .table3 td, .table3 td div{text-align:left !important;}
            .table4{margin:0px !important;padding-top:5px !important;font-size: 12px !important;}
            .table4 td,.table4 th{padding:3px !important;border-color: #000 !important;}
            .table4 th{font-weight: normal;background: #EEE;}
            .table5{margin:0px !important;padding-top:5px !important;font-size: 12px !important;}
            .table5 td,.table5 th{padding:3px !important;border-color: #000 !important;}
            .table5 tr:first-child td{background: #EEE;}
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- start: PAGE CONTENT -->
                    <div class="invoice">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <font style="text-transform:uppercase">{{$company_details->name}}</font><br/>
                                {{$company_details->address1.' ,'.$company_details->address2.' ,'.$company_details->area}}<br/>
                                {{$company_details->city.' - '.$company_details->zip.'. '.$company_details->state}}<br/>
                                Tel No. {{$company_details->phone}}
                            </div>
                        </div>
                        <div class="row">
                            <table class="print_table table table-bordered three_col">
                                <tr><td class="text-center">GSTN : {{$company_details->gstn}}</td><td class="text-center">{{$invoice_title}}</td><td class="text-center">{{$company_details->state}}</td></tr>
                            </table>
                        </div>
                        <div class="row">
                            <table class="print_table table table-bordered table2">
                                <tr><td class="text-center">Date : {{ $order->order_date_formatted_short }}</td><td class="text-center">Order ID : {{$order->order_no}}</td><td class="text-center">Preferred Delivery Date : {{$order->preferred_delivery_date_formatted_short}}</td></tr>
                            </table>
                        </div>
                        <div class="row">
                            <table class="print_table table3">
                                <tbody>
                                    <tr>
                                        <td class="text-left">
                                            <div class="">
                                                <strong>Customer Details :</strong><br/>
                                                Parent / Guardian Name : {{ $order->user->parent_name }}<br/>
                                                Child Name : {{ $order->user->child_name }}<br/>
                                                Email ID : {{ $order->user->email }}<br/>
                                                Phone : {{ $order->user->mobile }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="">
                                                <strong>Billing Information :</strong><br/>
                                                {{ $order->billing_address1.' '.$order->billing_address2.' '.$order->billing_area }}<br>
                                                {{ $order->billing_city.", ".$order->billing_state.", ".$order->billing_zip }}
                                            </div>    
                                        </td>
                                        <td class="text-left">
                                            <div class="">
                                                <strong>Shipping Information :</strong><br/>
                                                {{ $order->shipping_address1.' '.$order->shipping_address2.' '.$order->shipping_area }}<br>
                                                {{ $order->shipping_city.", ".$order->shipping_state.", ".$order->shipping_zip }}
                                            </div>    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div style="padding-top:20px;"><b>Product :</b> {{$item->pivot->title}}</div>
                            <table class="print_table table table-bordered table4">

                                <?php
                                $sub_total = 0;
                                ?>
                                @foreach($order->product as $item)
                                <?php
                                $ps = $item;
                                ?>
                                <tbody>
                                    @include('common/orderproductdetail')
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="row">
                            <div style="padding-top:20px;font-weight: bold;">Items to Dispatch</div>
                            <table class="print_table table table-bordered table5">
                                <tbody>
                                <tr>
                                    <td width="55%">Item</td>
                                    <td class="text-center" width="15%">Item Code</td>
                                    <td class="text-center" width="15%">HSN Code</td>
                                    <td class="text-center" width="15%">Quantity</td>
                                </tr>    
                                <?php
                                $books = \App\Models\OrderProductBook::where(['order_product_id' => $ps->pivot->id])->get(); 
                                ?>
                                @foreach($books as $bk)
                                <tr>
                                    <td>{{ $bk->name }}</td>
                                    <td class="text-center">{{ $bk->book_code }}</td>
                                    <td class="text-center">{{ $bk->hsn_code }}</td>
                                    <td class="text-center">1</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div style="padding-top:30px;text-align: right;">For <font style="text-transform:uppercase">{{$company_details->name}}</font></div>
                        </div>
                    </div>
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
        </div>
    </body>
</html>