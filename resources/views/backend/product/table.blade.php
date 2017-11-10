<table class="table table-responsive table-hover" id="product-table">
    <thead>
    <th class="text-center"><input type="checkbox" class="check-all" name="check_all"></th>  
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
    @foreach($product as $key => $row)
    <?php
    $disable_class = ($row->order()->count() > 0 ? 'disabled' : '');
    ?>
    <tr>
        <td class="text-center"><input type="checkbox" data="{{$row->id}}" class="order-check" name="order_check"></td>
        <td class="text-center">{{ srNo($key) }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->company->find($row->company_id)->name }}</td>
        <td>{{ $row->school->find($row->school_id)->name }}</td>
        <td>{{ $row->standard->find($row->standard_id)->name }}</td>
        <td class="text-center">{{ formatDate($row->created_at) }}</td>
        <td class="text-center">
                {!! Form::checkbox('status', 1, $row->status,['class'=>'status','data-val'=> $row->id,'data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status') ]) !!}
            </td>
        <td class="text-center" nowrap="nowrap">
            {!! Form::open(['route' => ['admin.product.destroy', $row->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
<!--                    <a href="{!! route('admin.product.show', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                
                <a href="{!! route('admin.product.book', [$row->id]) !!}" class='btn btn-default btn-xs {{$disable_class}}'><i class="fa fa-book"></i></a>
                <a href="{!! route('admin.product.edit', [$row->id]) !!}" class='btn btn-default btn-xs {{$disable_class}}'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                <a title="Clone" onclick="return confirm('Are you sure want to generate clone?')" href="{!! route('admin.product.copy', [$row->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-copy" title="Clone"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs '.$disable_class, 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="col-md-12">
    <ul class="pagination">
        {!! $product->render() !!}
    </ul>
</div>
{{-- $row->links() --}}