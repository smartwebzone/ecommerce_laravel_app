<table class="table table-responsive" id="sections-table">
    <thead>
    <th class="text-center"><input type="checkbox" class="check-all" name="check_all"></th>    
    <th class="text-center">ID</th>
    <th class="text-right">Amount</th>
    <th>Customer</th>
    <th>Email</th>
    <th>Phone</th>
    <th class="text-center">Date</th>
    <th class="text-center">Method</th>
    <th class="text-center">Status</th>
    <th class="text-center">Fraud</th>
    <th class="text-right">Action</th>
</thead>
<tbody>
    @foreach($orders as $order)
    <tr class="{{($order->fraud_flag != 'No' ? 'danger' : '')}}">
        <td class="text-center"><input type="checkbox" data="{{$order->id}}" class="order-check" name="order_check"></td>
        <td class="text-center"><a href="{!! route('admin.orders.show', [$order->id]) !!}">{{ $order->order_no }}</a></td>
        <td class="text-right">{{ formatDollar($order->amount) }}</td>
        <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
        <td>{{ $order->user->email }}</td>
        <td>{{ $order->phone }}</td>
        <td class="text-center">{{ $order->created_at }}</td>
        <td class="text-center">{{ $order->payment_method }}</td>
        <td class="text-center">{{ $order->status }}</td>
        <td class="text-center">{{ $order->fraud_flag }}</td>
        <td nowrap="nowrap" class="text-right">
            {!! Form::open(['route' => ['admin.sections.destroy', $order->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                @if(!$order->charge_date && $order->status!='Cancelled' && $order->payment_method=='Credit Card' && $order->transaction_id!='' )
                <a onclick="return confirm('Are you sure want to charge ${{$order->amount}} for this order?')" href="{!! route('admin.orders.charge', [$order->id]) !!}" class='btn btn-default btn-xs'>Charge</a>
                @endif
                @if(!$order->charge_date && $order->status!='Cancelled' && $order->payment_method=='Paypal' && $order->transaction_id!='' )
                <a onclick="return confirm('Are you sure want to charge ${{$order->amount}} for this order?')" href="{!! route('admin.orders.chargePaypal', [$order->id]) !!}" class='btn btn-default btn-xs'>Charge</a>
                @endif
                <a href="{!! route('admin.orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a target="_blank" href="{!! route('admin.orders.download', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-file"></i></a>

            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="pull-left">
    <ul class="pagination">
        {!! $orders->render() !!}
    </ul>
</div>