<table class="table table-responsive table-hover" id="school-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Contact Person</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($school as $school)
    <tr>
        <td class="text-center">{{ $school->id }}</td>
        <td>{{ $school->name }}</td>
        <td>{{ $school->phone }}</td>
        <td>{{ $school->email }}</td>
        <td>{{ $school->contact_person }}</td>
        <td class="text-center">{{ formatDate($school->created_at) }}</td>
        <td class="text-center">{{ getStatus($school->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.school.destroy', $school->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.school.show', [$school->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.school.edit', [$school->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $school->links() --}}