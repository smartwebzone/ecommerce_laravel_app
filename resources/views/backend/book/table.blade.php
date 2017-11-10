<table class="table table-responsive table-hover" id="book-table">
    <thead>
    <th class="text-center"><input type="checkbox" class="check-all" name="check_all"></th>  
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
    @foreach($book as $key => $row)
    <tr>
        <td class="text-center"><input type="checkbox" data="{{$row->id}}" class="order-check" name="book_check"></td>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->company->find($row->company_id)->name }}</td>
        <td>{{ $row->standard->find($row->standard_id)->name }}</td>
        <td>{{ $row->author }}</td>
        <td class="text-right">{{ $row->price }}</td>
        <td class="text-center">{{ formatDate($row->created_at) }}</td>
        <td class="text-center">{{ getStatus($row->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.book.destroy', $row->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('admin.book.edit', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                <a onclick="return confirm('Are you sure want to generate clone?')" href="{!! route('admin.book.copy', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-copy" title="Clone"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="col-md-12">
    <ul class="pagination">
        {!! $book->render() !!}
    </ul>
</div>
{{-- $row->links() --}}