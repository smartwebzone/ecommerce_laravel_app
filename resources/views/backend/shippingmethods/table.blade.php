<table class="table table-responsive" id="shippingmethods-table">
    <thead>
        <th>Method Title</th>
        <th>Box Id</th>
        <th>Product Id</th>
        <th>Location Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($shippingmethods as $shippingmethod)
        <tr>
            <td>{!! $shippingmethod->method_title !!}</td>
            <td>{!! $shippingmethod->box_id !!}</td>
            <td>{!! $shippingmethod->product_id !!}</td>
            <td>{!! $shippingmethod->location_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.shippingmethods.destroy', $shippingmethod->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.shippingmethods.show', [$shippingmethod->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.shippingmethods.edit', [$shippingmethod->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>