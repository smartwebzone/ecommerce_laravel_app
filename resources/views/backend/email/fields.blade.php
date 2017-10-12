<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}

    {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title'),'required' => true]) !!}

</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','value' => old('description'),'required' => true]) !!}
</div>

<!-- Long Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long_description', 'Long Description:') !!}
    {!! Form::text('long_description', null, ['class' => 'form-control','value' => old('long_description'),'required' => true]) !!}
</div>

<!-- Email Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instate_shipping_charges', 'Instate Shipping Charges:') !!}
    {!! Form::text('instate_shipping_charges', null, ['class' => 'form-control','value' => old('instate_shipping_charges'),'required' => true]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('outstate_shipping_charges', 'Outstate Shipping Charges:') !!}
    {!! Form::text('outstate_shipping_charges', null, ['class' => 'form-control','value' => old('outstate_shipping_charges'),'required' => true]) !!}
</div>


<!-- Standard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standard_id', 'Standard:') !!}
    {!! Form::select('standard_id', $standard, (@$email && isset($email->standard->first()->id))?$email->standard->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'))) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company:') !!}
    {!! Form::select('company_id', $company, (@$email && isset($email->company->first()->id))?$email->company->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'))) !!}
</div>


<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('is_taxable', 'Is Taxable:') !!}
    <label class="checkbox">
        {!! Form::checkbox('is_taxable', 1, (isset($email->is_taxable))?$email->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}
    </label>
</div>

<!--

 Show on Shop page Field 
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox">
        {!! Form::checkbox('status', 1, (isset($email->status))?$email->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
    </label>
</div>-->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
    <a href="{!! route('admin.email') !!}" class="btn btn-default">Cancel</a>
</div>