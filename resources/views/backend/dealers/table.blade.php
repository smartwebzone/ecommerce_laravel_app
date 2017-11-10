<table class="table table-responsive" id="dealers-table">
    <thead>
       <th>Dealer</th>
       <th>Contact Person</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Action</th>
    </thead>
    <tbody>
    @foreach($dealers as $dealer)
        <tr>
            <td>{!! $dealer->dealer !!}</td>
            <td>{!! $dealer->contact_person !!}</td>
            <td>{!! $dealer->phone !!}</td>
            <td>{!! $dealer->public_email !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.dealers.destroy', $dealer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.dealers.show', [$dealer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.user.index', ['dealer_id='.$dealer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-user"></i> {{count($dealer->user)}}</a>
                    <a href="{!! route('admin.orders.index', ['dealer_id='.$dealer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-circle-arrow-left"></i> {{$dealer->order}}</a>
                    <a href="{!! route('admin.dealers.edit', [$dealer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-left">
                <ul class="pagination">
                    {!! $dealers->render() !!}
                </ul>
            </div>