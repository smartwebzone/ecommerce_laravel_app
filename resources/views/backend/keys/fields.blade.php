<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::text('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Purchase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_purchase', 'Date Of Purchase:') !!}
    {!! Form::date('date_of_purchase', null, ['class' => 'form-control']) !!}
</div>

<!-- Warranty Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty_key', 'Warranty Key:') !!}
    {!! Form::text('warranty_key', null, ['class' => 'form-control']) !!}
</div>

<!-- License Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license_key', 'License Key:') !!}
    {!! Form::text('license_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Requested Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_key', 'Requested Key:') !!}
    {!! Form::text('requested_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Generated Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generated_key', 'Generated Key:') !!}
    {!! Form::text('generated_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.keys.index') !!}" class="btn btn-default">Cancel</a>
</div>
