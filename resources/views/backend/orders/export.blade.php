<h1>Order Report Jeevandeep</h1>
<table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>#</th>
        <th>Order ID.</th>
        <th>Amount</th>
        <th>Product</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Added On</th>
        <th>Status</th>
    </tr>
    @foreach($orders as $key=>$order)
    <tr>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $order->order_no }}</td>
        <td>{{ $order->total_amount }}</td>
        <td>{{ $order->product->first()->title }}</td>
        <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
        <td>{{ $order->user->email }}</td>
        <td>{{ $order->user->mobile }}</td>
        <td>{{ $order->order_date_formatted_short }}</td>
        <td>{{ $order->status->name }}</td>
    </tr>
    @endforeach
</table>