<table class="table table-responsive table-hover" id="school-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Description</th>   
    <th width="10%" class="text-center">Added On</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($schools as $school)
    <tr>
        <td class="text-center">{{ $school->id }}</td>
        <td>{{ $school->name }}</td>
        <td>{{ $school->description }}</td>       
        <td class="text-center">{{ formatDate($school->created_at) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.unavailable.schooldestroy', $school->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
  
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $school->links() --}}