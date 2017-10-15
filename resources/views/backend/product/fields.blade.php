<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('company_id', 'Company:') !!}
        {!! Form::select('company_id', $company, NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'),'required' => true)) !!}
        @if ($errors->has('company_id'))
        <div class="error">{{ $errors->first('company_id') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('standard_id', 'Standard:') !!}
        {!! Form::select('standard_id', $standard, NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'),'required' => true)) !!}
        @if ($errors->has('standard_id'))
        <div class="error">{{ $errors->first('standard_id') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title'),'required' => true]) !!}
        @if ($errors->has('title'))
        <div class="error">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control','value' => old('description'),'required' => true]) !!}
        @if ($errors->has('description'))
        <div class="error">{{ $errors->first('description') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('long_description', 'Long Description:') !!}
        {!! Form::textarea('long_description', null, ['class' => 'form-control','value' => old('long_description'),'required' => true,'rows'=>3]) !!}
        @if ($errors->has('long_description'))
        <div class="error">{{ $errors->first('long_description') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('instate_shipping_charges', 'In State Shipping Charges:') !!}
        {!! Form::text('instate_shipping_charges', null, ['class' => 'form-control','value' => old('instate_shipping_charges'),'required' => true]) !!}
        @if ($errors->has('instate_shipping_charges'))
        <div class="error">{{ $errors->first('instate_shipping_charges') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('outstate_shipping_charges', 'Out State Shipping Charges:') !!}
        {!! Form::text('outstate_shipping_charges', null, ['class' => 'form-control','value' => old('outstate_shipping_charges'),'required' => true]) !!}
        @if ($errors->has('outstate_shipping_charges'))
        <div class="error">{{ $errors->first('outstate_shipping_charges') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('is_taxable', 'Is Taxable:') !!}
        <label class="checkbox">
            {!! Form::checkbox('is_taxable', 1, (isset($product->is_taxable))?$product->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}
        </label>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($product->status))?$product->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.product') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>