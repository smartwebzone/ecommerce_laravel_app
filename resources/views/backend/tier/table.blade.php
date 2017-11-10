<table class="table table-responsive" id="tier-table">
    <thead>

        <th><a href="{{ url(Request::url().'?sort=id&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}"># {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
        <th><a href="{{ url(Request::url().'?sort=name&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Name {!! Request::get('sort') == 'name' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
        <th>Description</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tier as $tr)
        <tr>

            <td>{{ $tr->id }}</td>
            <td>{{ $tr->title }}</td>
            
            <td>{!! $tr->description !!}</td>

            <td>
                {!! Form::open(['route' => ['admin.tier.destroy', $tr->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tier.show', [$tr->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tier.edit', [$tr->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
