<table class="table table-responsive table-hover" id="company-table">
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
    @foreach($company as $key=>$row)
    <tr>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->contact_person }}</td>
        <td class="text-center">{{ formatDate($row->created_at) }}</td>
        <td class="text-center">{{ getStatus($row->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.company.destroy', $row->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.company.show', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.company.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        {!! $company->render() !!}
    </ul>
</div>
{{-- $row->links() --}}