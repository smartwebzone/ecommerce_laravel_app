<table class="table table-responsive table-hover" id="order-table">
    <thead>
    <th class="text-center"><input type="checkbox" class="check-all" name="check_all"></th>  
    <th width="5%" class="text-center">#</th>
    <th>Order ID.</th>
    <th>Amount</th>
    <th>Product</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Added On</th>
    <th>Preferred Date</th>
    <th>Status</th>
    <th width="9%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($orders as $key=>$order)
    <tr>
        <td class="text-center"><input type="checkbox" data="{{$order->id}}" class="order-check" name="order_check"></td>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $order->order_no }}</td>
        <td>{{ $order->total_amount }}</td>
        <td>{{ $order->product->first()->title }}</td>
        <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
        <td>{{ $order->user->email }}</td>
        <td>{{ $order->user->mobile }}</td>
        <td>{{ $order->order_date_formatted_short }}</td>
        <td>{{ $order->preferred_delivery_date_formatted }}</td>
        <td>{{ $order->status->name }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.order.destroy', $order->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('admin.order.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a target="_blank" href="{!! route('admin.order.invoice', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-file"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="col-md-12">
    <ul class="pagination">
        {!! $orders->render() !!}
    </ul>
</div>
{{-- $order->links() --}}