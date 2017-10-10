<table class="table table-responsive table-hover" id="company-table">
    <thead>
    <td><a href="{{ url(Request::url().'?sort=id&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}"># {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
    <td><a href="{{ url(Request::url().'?sort=title&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Name {!! Request::get('sort') == 'title' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>

    <td>Phone</td>
    <td>Email</td>
    <th>Contact Person</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($company as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->contact_person }}</td>
           

            <td>
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