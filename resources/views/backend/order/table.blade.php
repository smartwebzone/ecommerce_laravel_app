<table class="table table-responsive table-hover" id="order-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Transaction No.</th>
    <th>Amount</th>
    <th>Added On</th>
    <th width="9%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($order as $order)
    <tr>
        <td class="text-center">{{ $order->id }}</td>
        <td>{{ $order->transaction_id }}</td>
        <td>{{ $order->amount }}</td>
        <td>{{ formatDate($order->order_date) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.order.destroy', $order->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                    <a href="{!! route('admin.order.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a target="_blank" href="{!! route('admin.order.invoice', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-file"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $order->links() --}}