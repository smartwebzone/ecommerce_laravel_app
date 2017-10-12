<table class="table table-responsive table-hover" id="product-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Title</th>
    <th>Standard</th>
    <th>Company</th>
    <th>Added On</th>
    <th width="7%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($product as $product)
    <tr>
        <td class="text-center">{{ $product->id }}</td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->standard->first()->name }}</td>
        <td>{{ $product->company->first()->name }}</td>
        <td>{{ formatDate($product->created_at) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.product.destroy', $product->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.product.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                <a href="{!! route('admin.product.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $product->links() --}}