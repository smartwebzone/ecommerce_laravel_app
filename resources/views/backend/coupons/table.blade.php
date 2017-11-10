<table class="table table-responsive" id="coupons-table">
    <thead>

    <th><a href="{{ url(Request::url().'?sort=id&orderby=') }}
           {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}"># {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
    <th><a href="{{ url(Request::url().'?sort=name&orderby=') }}
           {{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Code {!! Request::get('sort') == 'name' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></th>
    <th>Discount</th>
    <th>Maximum Usage</th>
    <th colspan="3">Action</th>
</thead>
<tbody>
    @foreach($coupons as $coupon)
    <tr>

    <tr>
        <td>{{ $coupon->id }}</td>
        <td>{{ $coupon->name }}</td>
        <td>{{ $coupon->discount }}%</td>
        <td>{{ $coupon->uses }} {{ $coupon->uses == 1 ? 'Time' : 'Times' }}</td>
        <td>
            {!! Form::open(['route' => ['admin.coupons.destroy', $coupon->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
               
                <a href="{!! route('admin.coupons.edit', [$coupon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
