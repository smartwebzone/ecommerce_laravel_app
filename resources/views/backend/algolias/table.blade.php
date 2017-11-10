<table class="table table-responsive" id="algolias-table">
    <thead>

        <th>Title</th>
        <th>Sub-Title</th>
        <th>Description</th>
        <th>Keywords</th>
        <th>Slug</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($algolias as $algolia)
        <tr>

            <td>{{ $algolia->title }}</td>
            <td>{{$algolia->subtitle}}</td>
            <td>{{(strlen($algolia->description) > 100 ? substr($algolia->description,0,100).'...' : $algolia->description)}}</td>
            <td>{{$algolia->keywords}}</td>
            <td>{!! $algolia->slug !!}</td>

            <td>
                {!! Form::open(['route' => ['admin.algolias.destroy', $algolia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
<!--                    <a href="{!! route('admin.algolias.show', [$algolia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                    <a href="{!! route('admin.algolias.edit', [$algolia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
