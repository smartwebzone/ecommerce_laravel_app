<table class="table table-responsive table-hover" id="user-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th class="text-center">Type</th>
    <th>Email ID</th>
    <th>Phone</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td class="text-center">{{ $user->id }}</td>
        <td>{!! $user->first_name !!} {!! $user->last_name !!}</td>
        <td class="text-center">{!! $user->isAdmin == 1 ? 'Admin' : 'Student' !!}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile }}</td>
        <td class="text-center">{{ formatDate($user->created_at) }}</td>
        <td class="text-center">{{ getStatus($user->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('admin.user.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $user->links() --}}