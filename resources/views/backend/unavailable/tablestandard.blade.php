<table class="table table-responsive table-hover" id="standard-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Description</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($standards as $standard)
    <tr>
        <td class="text-center">{{ $standard->id }}</td>
        <td>{{ $standard->name }}</td>
       <td>{{ $standard->description }}</td>
        <td class="text-center">{{ formatDate($standard->created_at) }}</td>
        <td class="text-center">{{ getStatus($standard->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.unavailable.standarddestroy', $standard->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
  
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $standard->links() --}}