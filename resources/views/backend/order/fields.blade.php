<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}

    {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title'),'required' => true]) !!}

</div>


<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','value' => old('amount'),'required' => true]) !!}
</div>

<!-- Long Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::text('tax', null, ['class' => 'form-control','value' => old('tax'),'required' => true]) !!}
</div>

<!-- Product Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    {!! Form::text('total_amount', null, ['class' => 'form-control','value' => old('total_amount'),'required' => true]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_id', 'Transaction ID:') !!}
    {!! Form::text('transaction_id', null, ['class' => 'form-control','value' => old('transaction_id'),'required' => true]) !!}
</div>


<!-- Standard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standard_id', 'Standard:') !!}
    {!! Form::select('standard_id', $standard, (@$product && isset($product->standard->first()->id))?$product->standard->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'))) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company:') !!}
    {!! Form::select('company_id', $company, (@$product && isset($product->company->first()->id))?$product->company->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'))) !!}
</div>


<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('is_taxable', 'Is Taxable:') !!}
    <label class="checkbox">
        {!! Form::checkbox('is_taxable', 1, (isset($product->is_taxable))?$product->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}
    </label>
</div>

<!--

 Show on Shop page Field 
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox">
        {!! Form::checkbox('status', 1, (isset($product->status))?$product->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
    </label>
</div>-->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
    <a href="{!! route('admin.product') !!}" class="btn btn-default">Cancel</a>
</div>