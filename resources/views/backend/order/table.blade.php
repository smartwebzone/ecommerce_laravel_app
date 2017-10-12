<table class="table table-responsive table-hover" id="order-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Title</th>
    <th>Standard</th>
    <th>Company</th>
    <th>Added On</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($order as $order)
    <tr>
        <td class="text-center">{{ $order->id }}</td>
        <td>{{ $order->title }}</td>
        <td>{{ $order->standard->first()->name }}</td>
        <td>{{ $order->company->first()->name }}</td>
        <td>{{ formatDate($order->created_at) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.order.destroy', $order->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.order.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.order.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $order->links() --}}