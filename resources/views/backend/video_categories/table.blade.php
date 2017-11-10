<table class="table table-responsive" id="videoCategories-table">
    <thead>
        <th>Title</th>
        <th>Slug</th>
        <th>Lang</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($videoCategories as $videoCategory)
        <tr>
            <td>{!! $videoCategory->title !!}</td>
            <td>{!! $videoCategory->slug !!}</td>
            <td>{!! $videoCategory->lang !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.videoCategories.destroy', $videoCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.videoCategories.show', [$videoCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.videoCategories.edit', [$videoCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>