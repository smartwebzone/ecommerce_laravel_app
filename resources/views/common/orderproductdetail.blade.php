<tr>
    <th class="name">Name</th>
    <th class="quantity text-center">Quantity</th>
    <th class="cost text-center">Cost Per Item</th>
    <th class="subtotal text-center">Subtotal</th>
    <th class="gst text-center">GST</th>
    <th class="mrp text-center">MRP</th>
</tr>
<?php $subtotal = 0; ?>
<?php $totaltax = 0; ?>
<?php $totalmrp = 0; ?>
<?php $books = \App\Models\OrderProductBook::where(['order_product_id' => $ps->pivot->id])->get(); ?>
@foreach($books as $book)
<tr>
    <td class="name">{{$book->name}}</td>
    <td class="quantity text-center">1.00</td>
    <td class="cost text-center">INR {{$book->price}}</td>
    <td class="subtotal text-center">INR {{$book->price}}</td>
    <td class="gst text-center">{{$book->tax}}%</td>
    <td class="mrp text-center">INR {{$book->price_after_tax}}</td>
</tr>
<?php $subtotal += $book->price; ?>
<?php $totalmrp += $book->price_after_tax; ?>
<?php $totaltax += $book->price_after_tax - $book->price; ?>
@endforeach
<tr>
    <td class="name text-right">Total Without Tax</td>
    <td class="quantity nobg"></td>
    <td class="cost nobg"></td>
    <td class="subtotal text-center">INR {{numberWithDecimal($subtotal)}}</td>
    <td class="gst nobg"></td>
    <td class="mrp nobg"></td>
</tr>
<?php if (@$shipping_address->state == $ps->company->state) { ?>
    <tr>
        <td class="name text-right">SGST in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst text-center">INR {{numberWithDecimal($totaltax/2)}}</td>
        <td class="mrp nobg"></td>
    </tr>
    <tr>
        <td class="name text-right">CGST in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst text-center">INR {{numberWithDecimal($totaltax/2)}}</td>
        <td class="mrp nobg"></td>
    </tr>
<?php } else { ?>
    <tr>
        <td class="name text-right">IGST in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst text-center">INR {{numberWithDecimal($totaltax)}}</td>
        <td class="mrp nobg"></td>
    </tr>
<?php } ?>
<tr>
    <td class="name text-right greybg">Total MRP (A)</td>
    <td class="quantity nobg"></td>
    <td class="cost nobg"></td>
    <td class="subtotal nobg"></td>
    <td class="gst nobg"></td>
    <td class="mrp greybg text-center">INR {{numberWithDecimal($totalmrp)}}</td>
</tr>
<tr>
    <td class="name text-right">Shipping Costs</td>
    <td class="quantity nobg"></td>
    <td class="cost nobg"></td>
    <td class="subtotal nobg"></td>
    <td class="gst nobg"></td>
    <td class="mrp text-center">INR {{numberWithDecimal($ps->shipping_state)}}</td>
</tr>
<?php $shippingtax = (($ps->shipping_state * getProductItemHighestTax($ps->id)) / 100); ?>
<?php if (@$shipping_address->state == $ps->company->state) { ?>
    <tr>
        <td class="name text-right">SGST on Shipping Costs in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst nobg"></td>
        <td class="mrp text-center">INR {{numberWithDecimal($shippingtax/2)}}</td>
    </tr>
    <tr>
        <td class="name text-right">CGST on Shipping Costs in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst nobg"></td>
        <td class="mrp text-center">INR {{numberWithDecimal($shippingtax/2)}}</td>
    </tr>
<?php } else { ?>
    <tr>
        <td class="name text-right">IGST on Shipping Costs in INR</td>
        <td class="quantity nobg"></td>
        <td class="cost nobg"></td>
        <td class="subtotal nobg"></td>
        <td class="gst nobg"></td>
        <td class="mrp text-center">INR {{numberWithDecimal($shippingtax)}}</td>
    </tr>
<?php } ?>
<tr>
    <td class="name text-right greybg">Total Shipping Costs (B)</td>
    <td class="quantity nobg"></td>
    <td class="cost nobg"></td>
    <td class="subtotal nobg"></td>
    <td class="gst nobg"></td>
    <td class="mrp greybg text-center">INR {{numberWithDecimal($shippingtax+$ps->shipping_state)}}</td>
</tr>
<tr>
    <td class="name text-right greybg">Total Payable (A+B)</td>
    <td class="quantity nobg"></td>
    <td class="cost nobg"></td>
    <td class="subtotal nobg"></td>
    <td class="gst nobg"></td>
    <td class="mrp greybg text-center">INR {{numberWithDecimal($ps->price)}}</td>
</tr>