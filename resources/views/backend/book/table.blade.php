<table class="table table-responsive table-hover" id="book-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Author</th>
    <th>Price</th>
    <th>Standard</th>
    <th>Company</th>
    <th>Added On</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($book as $book)
    <tr>
        <td class="text-center">{{ $book->id }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->standard->first()->name }}</td>
        <td>{{ $book->company->first()->name }}</td>
        <td>{{ formatDate($book->created_at) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.book.destroy', $book->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.book.show', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.book.edit', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $book->links() --}}