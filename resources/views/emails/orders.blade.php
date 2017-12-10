<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="postcontent nobottommargin clearfix">                
                @foreach($head as $h)
                {!! $h !!}
                @endforeach
            </div>
            <div class="clearfix">
                <h3>Order Details</h3>
            </div>
            <div class="clearfix">
                <h3>Order ID : #{{ $order->order_no }}</h3>
                <h3>Order Date : {{ $order->order_date_formatted }}</h3>
            </div>
            <table class="table cart" border="1" cellpadding="1" cellspacing="0" style="width:100%;">
<!--                <tr>
                    <th style="text-align:center !important;">Product</th>
                    <th style="text-align:center !important;">Unit Price</th>
                    <th style="text-align:center !important;">Quantity</th>
                    <th style="text-align:center !important;">Total</th>
                </tr>-->
                <?php
                $sub_total = 0;
                ?>
                @foreach($order->product as $item)
                <tr>
                    <th colspan="6">Product : {{$item->pivot->title}}</th>
                </tr>
                <?php
                $ps=$item;
                ?>
                @include('common/orderproductdetail')
                @endforeach
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">	
            <h4>Items to Dispatch</h4>
            <table class="table cart" border="1" cellpadding="3" cellspacing="1" style="width:100%;">
                <tr>
                    <th style="text-align:center !important;">Item</th>
                    <th style="text-align:center !important;">Item Code</th>
                    <th style="text-align:center !important;">HSN Code</th>
                    <th style="text-align:center !important;">Quantity</th>
                </tr>
                <?php 
                $books = \App\Models\OrderProductBook::where(['order_product_id' => $ps->pivot->id])->get(); 
                ?>
                @foreach($books as $bk)
                <tr>
                    <td style="text-align:center !important;">{{ $bk->name }}</td>
                    <td style="text-align:center !important;">{{ $bk->book_code }}</td>
                    <td style="text-align:center !important;">{{ $bk->hsn_code }}</td>
                    <td style="text-align:center !important;">1</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            @foreach($foot as $f)
            {!! $f !!}
            @endforeach
        </div>
    </div>   
</section><!-- #content end -->