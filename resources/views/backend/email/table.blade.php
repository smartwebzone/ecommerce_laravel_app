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
    @foreach($email as $email)
    <tr>
        <td class="text-center">{{ $email->id }}</td>
        <td>{{ $email->template }}</td>
        <td>{{ $email->name }}</td>
        <td>{{ $email->subject }}</td>
        <td class="text-center">{{ formatDate($email->created_at) }}</td>
        <td class="text-center">{{ getStatus($email->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.email.destroy', $email->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.email.show', [$email->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.email.edit', [$email->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $email->links() --}}