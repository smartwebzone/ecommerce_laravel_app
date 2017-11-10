<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="postcontent nobottommargin clearfix">
                <p>Hi {{ $order->user->first_name.' '.$order->user->last_name }},</p>
                <p>Thank you for your purchase. If you have any questions that we can help with, please feel free to email us at info@jeevandeep.com. Thanks so much!</p>
            </div>
            <div class="clearfix">
                <h3>Order Details</h3>
            </div>
            <div class="clearfix">
                <h3>Order ID : #{{ $order->order_no }}</h3>
                <h3>Order Date : {{ $order->order_date_formatted }}</h3>
            </div>
            <table class="table cart" border="1" cellpadding="1" cellspacing="0" style="width:100%;">
                <tr>
                    <th style="text-align:center !important;">Product</th>
                    <th style="text-align:center !important;">Unit Price</th>
                    <th style="text-align:center !important;">Quantity</th>
                    <th style="text-align:center !important;">Total</th>
                </tr>
                <?php
                $sub_total = 0;
                ?>
                @foreach($order->product as $item)
                <tr>

                    <td style="text-align:center !important;">
                        {{ $item->title }}
                    </td>
                    <td style="text-align:center !important;">{{ $order->amount }}</td>
                    <td style="text-align:center !important;">1</td>
                    <td style="text-align:center !important;">{{ $order->amount }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3" style="text-align:center !important;">SubTotal</th>
                    <th style="text-align:center !important;">{{ $order->amount }}</th>
                </tr>
                @if($order->shipping)
                <tr>
                    <th colspan="3" style="text-align:center !important;">Shipping</th>
                    <th style="text-align:center !important;">{{ ($order->shipping) }}</th>
                </tr>
                @endif
                @if($order->tax)
                <tr>
                    <th colspan="3" style="text-align:center !important;">Tax</th>
                    <th style="text-align:center !important;">{{ ($order->tax) }}</th>
                </tr>
                @endif
                @if($order->discount_amount > 0)
                <tr>
                    <th colspan="3" style="text-align:center !important;">Discount</th>
                    <th style="text-align:center !important;">- {{ ($order->discount_amount) }}</th>
                </tr>
                @endif
                <tr>
                    <th colspan="3" style="text-align:center !important;">Total</th>
                    <th style="text-align:center !important;">{{ ($order->total_amount) }}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">	
            <h4>Items to Dispatch</h4>
            <table class="table cart" border="1" cellpadding="3" cellspacing="1" style="width:100%;">
                <tr>
                    <th style="text-align:center !important;">Item</th>
                    <th style="text-align:center !important;">Quantity</th>
                </tr>
                @foreach($order->product as $prod)
                @foreach($item->books as $bk)

                <tr>
                    <td style="text-align:center !important;">
                        {{ $bk->name }}
                    </td>
                    <td style="text-align:center !important;">{{ $bk->pivot->quantity }}</td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
          Thanks,<br/>
          Jeevandeep Team
        </div>
    </div>   
</section><!-- #content end -->