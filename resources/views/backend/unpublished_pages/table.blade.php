<table class="table table-responsive" id="unpublished-pages-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>New Slug</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($unpublishedPages as $unpublishedPage)
        <tr>
            <td>{{ $unpublishedPage->id }}</td>
            <td>{{ $unpublishedPage->name }}</td>
            <td>{!! $unpublishedPage->slug !!}</td>
            <td>{!! $unpublishedPage->new_slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.unpublished_pages.destroy', $unpublishedPage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.unpublished_pages.show', [$unpublishedPage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.unpublished_pages.edit', [$unpublishedPage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
