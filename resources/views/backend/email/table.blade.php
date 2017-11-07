<table class="table table-responsive table-hover" id="email-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Template</th>
    <th>Name</th>
    <th>Email Subject</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($email as $key => $row)
    <tr>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $row->template }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->subject }}</td>
        <td class="text-center">{{ formatDate($row->created_at) }}</td>
        <td class="text-center">{{ getStatus($row->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.email.destroy', $row->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.email.show', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.email.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="col-md-12">
    <ul class="pagination">
        {!! $email->render() !!}
    </ul>
</div>
{{-- $row->links() --}}