<table class="table table-responsive" id="keys-table">
    <thead>
        <th>Id</th>
        <th>Order Id</th>
        <th>User Id</th>
        <th>Product Id</th>
        <th>Date Of Purchase</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($keys as $key)
        <tr>
            <td>{!! $key->id !!}</td>
            <td>{!! $key->order_id !!}</td>
            <td>{!! $key->user_id !!}</td>
            <td>{!! $key->product_id !!}</td>
            <td>{!! $key->date_of_purchase !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.keys.destroy', $key->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.keys.show', [$key->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.keys.edit', [$key->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>