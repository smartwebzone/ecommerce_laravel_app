<table class="table table-responsive table-hover" id="book-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Name</th>
    <th>Company</th>
    <th>Standard</th>
    <th>Author</th>
    <th class="text-right">Price</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="10%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($book as $book)
    <tr>
        <td class="text-center">{{ $book->id }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->company->find($book->company_id)->name }}</td>
        <td>{{ $book->standard->find($book->standard_id)->name }}</td>
        <td>{{ $book->author }}</td>
        <td class="text-right">{{ $book->price }}</td>
        <td class="text-center">{{ formatDate($book->created_at) }}</td>
        <td class="text-center">{{ getStatus($book->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.book.destroy', $book->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('admin.book.edit', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                <a onclick="return confirm('Are you sure want to generate clone?')" href="{!! route('admin.book.copy', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-copy"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $book->links() --}}