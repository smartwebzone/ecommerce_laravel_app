<table class="table table-responsive" id="sections-table">
    <thead>

        <th><a href="{{ url(Request::url().'?sort=id&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}"># {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
        <th><a href="{{ url(Request::url().'?sort=name&orderby=') }}
        {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Name {!! Request::get('sort') == 'name' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
        <th>Categories</th>
        <th>Slug</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sections as $section)
        <tr>

            <td>{{ $section->id }}</td>
            <td>{{ $section->name }}</td>
            <td>
                @if($section->categories->count())
                    <h4 class="label label-default">{{ $section->categories->count() }}</h4>
                @else
                    {{--<h3 class="label label-inverse">{{ $section->categories->count() }}</h3>--}}
                @endif
            </td>
            <td>{!! $section->slug !!}</td>

            <td>
                {!! Form::open(['route' => ['admin.sections.destroy', $section->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.sections.show', [$section->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.sections.edit', [$section->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
