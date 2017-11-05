<table class="table table-responsive table-hover" id="product-table">
    <thead>
    <th width="5%" class="text-center">#</th>
    <th>Title</th>
    <th>Company</th>
    <th>School</th>
    <th>Standard</th>
    <th width="10%" class="text-center">Added On</th>
    <th width="10%" class="text-center">Status</th>
    <th width="15%" class="text-center">Action</th>
</thead>
<tbody>
    @foreach($product as $product)
    <?php
    $disable_class = ($product->order()->count() > 0 ? 'disabled' : '');
    ?>
    <tr>
        <td class="text-center">{{ $product->id }}</td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->company->find($product->company_id)->name }}</td>
        <td>{{ $product->school->find($product->school_id)->name }}</td>
        <td>{{ $product->standard->find($product->standard_id)->name }}</td>
        <td class="text-center">{{ formatDate($product->created_at) }}</td>
        <td class="text-center">{{ getStatus($product->status) }}</td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.product.destroy', $product->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.product.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                
                <a href="{!! route('admin.product.book', [$product->id]) !!}" class='btn btn-default btn-xs {{$disable_class}}'><i class="fa fa-book"></i></a>
                <a href="{!! route('admin.product.edit', [$product->id]) !!}" class='btn btn-default btn-xs {{$disable_class}}'><i class="glyphicon glyphicon-edit"></i></a>
                <a title="Clone" onclick="return confirm('Are you sure want to generate clone?')" href="{!! route('admin.product.copy', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-copy"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs '.$disable_class, 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{-- $product->links() --}}