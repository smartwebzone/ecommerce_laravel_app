<table class="table table-responsive table-hover" id="company-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Contact Person</th>
    <th>Added On</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($company as $company)
    <tr>
        <td class="text-center">{{ $company->id }}</td>
        <td>{{ $company->name }}</td>
        <td>{{ $company->phone }}</td>
        <td>{{ $company->email }}</td>
        <td>{{ $company->contact_person }}</td>
        <td>{{ formatDate($company->add_date) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.company.destroy', $company->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.company.show', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.company.edit', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $company->links() --}}