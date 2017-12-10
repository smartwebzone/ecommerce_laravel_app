
                <tr>
                    <th class="name">NAME</th>
                    <th class="quantity">Quantity</th>
                    <th class="cost">Cost per item</th>
                    <th class="subtotal">subtotal</th>
                    <th class="gst">GST</th>
                    <th class="mrp">MRP</th>
                </tr>
                <?php $subtotal = 0; ?>
                <?php $totaltax = 0; ?>
                <?php $totalmrp = 0; ?>
                <?php $books=\App\Models\OrderProductBook::where(['order_product_id'=>$ps->pivot->id])->get();?>
                @foreach($books as $book)
                <tr>
                    <td class="name">{{$book->name}}</td>
                    <td class="quantity">1.00</td>
                    <td class="cost">INR {{$book->price}}</td>
                    <td class="subtotal">INR {{$book->price}}</td>
                    <td class="gst">{{$book->tax}}%</td>
                    <td class="mrp">INR {{$book->price_after_tax}}</td>
                </tr>
                <?php $subtotal+=$book->price; ?>
                <?php $totalmrp+=$book->price_after_tax; ?>
                <?php $totaltax+=$book->price_after_tax - $book->price; ?>
                @endforeach
                <tr>
                    <td class="name text-right">Total without tax</td>
                    <td class="quantity nobg"></td>
                    <td class="cost nobg"></td>
                    <td class="subtotal">INR {{numberWithDecimal($subtotal)}}</td>
                    <td class="gst nobg"></td>
                    <td class="mrp nobg"></td>
                </tr>
                <?php if (@$shipping_address->state == $ps->company->state) { ?>
                    <tr>
                        <td class="name text-right">SGST in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst">INR {{numberWithDecimal($totaltax/2)}}</td>
                        <td class="mrp nobg"></td>
                    </tr>
                    <tr>
                        <td class="name text-right">CGST in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst">INR {{numberWithDecimal($totaltax/2)}}</td>
                        <td class="mrp nobg"></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td class="name text-right">IGST in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst">INR {{numberWithDecimal($totaltax)}}</td>
                        <td class="mrp nobg"></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="name text-right greybg">Total mrp (A)</td>
                    <td class="quantity nobg"></td>
                    <td class="cost nobg"></td>
                    <td class="subtotal nobg"></td>
                    <td class="gst nobg"></td>
                    <td class="mrp greybg">INR {{numberWithDecimal($totalmrp)}}</td>
                </tr>
                <tr>
                    <td class="name text-right">Shipping costs</td>
                    <td class="quantity nobg"></td>
                    <td class="cost nobg"></td>
                    <td class="subtotal nobg"></td>
                    <td class="gst nobg"></td>
                    <td class="mrp">INR {{numberWithDecimal($ps->shipping_state)}}</td>
                </tr>
                <?php $shippingtax = (($ps->shipping_state * getProductItemHighestTax($ps->id)) / 100); ?>
                <?php if (@$shipping_address->state == $ps->company->state) { ?>
                    <tr>
                        <td class="name text-right">SGST on shipping costs in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst nobg"></td>
                        <td class="mrp">INR {{numberWithDecimal($shippingtax/2)}}</td>
                    </tr>
                    <tr>
                        <td class="name text-right">CGST on shipping costs in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst nobg"></td>
                        <td class="mrp">INR {{numberWithDecimal($shippingtax/2)}}</td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td class="name text-right">IGST on shipping costs in inr</td>
                        <td class="quantity nobg"></td>
                        <td class="cost nobg"></td>
                        <td class="subtotal nobg"></td>
                        <td class="gst nobg"></td>
                        <td class="mrp">INR {{numberWithDecimal($shippingtax)}}</td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="name text-right greybg">Total shipping costs (b)</td>
                    <td class="quantity nobg"></td>
                    <td class="cost nobg"></td>
                    <td class="subtotal nobg"></td>
                    <td class="gst nobg"></td>
                    <td class="mrp greybg">INR {{numberWithDecimal($shippingtax+$ps->shipping_state)}}</td>
                </tr>
                <tr>
                    <td class="name text-right greybg">Total PAYABLE (A+b)</td>
                    <td class="quantity nobg"></td>
                    <td class="cost nobg"></td>
                    <td class="subtotal nobg"></td>
                    <td class="gst nobg"></td>
                    <td class="mrp greybg">INR {{numberWithDecimal($ps->price)}}</td>
                </tr>
           