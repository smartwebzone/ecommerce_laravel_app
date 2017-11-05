<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! $order->id !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction', 'Transaction No:') !!}
    {!! $order->transaction_id !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! $order->tax !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('shipping', 'Shipping:') !!}
    {!! $order->shipping !!}
</div>
<!-- Meta Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Sub-total:') !!}
    {!! $order->amount !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Total:') !!}
    {!! $order->total_amount !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Order Date:') !!}
    {!! $order->order_date !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Status:') !!}
    {!! Form::model($order, ['route' => ['admin.order.update', $order->id], 'method' => 'patch', 'files'=>true]) !!}
        {!! Form::select('status_id', $status, $order->status_id, ['class' => 'form']) !!}
        {!! Form::submit('Change', ['class' => 'btn btn-xs btn-primary','required' => true]) !!}
    {!! Form::close() !!}
</div>
<h3 class="col-sm-6">Shipping Address</h3>
<h3 class="col-sm-6">Billing Address</h3>
<div class="form-group col-sm-6">
    {!! Form::label('address1', 'Address1:') !!}
    {!! $order->shipping_address1 !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('address1', 'Address1:') !!}
    {!! $order->billing_address1 !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('address2', 'Address2:') !!}
    {!! $order->shipping_address2 !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('address2', 'Address2:') !!}
    {!! $order->billing_address2 !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! $order->shipping_area !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! $order->billing_area !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! $order->shipping_city !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! $order->billing_city !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! $order->shipping_state !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! $order->billing_state !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! $order->shipping_zip !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! $order->billing_zip !!}
</div>
<h3 class="col-sm-12">Products</h3>
@foreach($order->product as $ps)
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! $ps->title !!}
</div>
@endforeach

