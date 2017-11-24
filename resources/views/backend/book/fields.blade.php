<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('company_id', 'Company:') !!}
        <span class="mandatory">*</span>
        {!! Form::select('company_id', $company, NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'),'required' => true)) !!}
        @if ($errors->has('company_id'))
        <div class="error">{{ $errors->first('company_id') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('standard_id', 'Standard:') !!}
        <span class="mandatory">*</span>
        {!! Form::select('standard_id', $standard, NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'),'required' => true)) !!}
        @if ($errors->has('standard_id'))
        <div class="error">{{ $errors->first('standard_id') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        <span class="mandatory">*</span>
        {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}
        @if ($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control','value' => old('description')]) !!}
        @if ($errors->has('description'))
        <div class="error">{{ $errors->first('description') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('author', 'Author:') !!}
        {!! Form::text('author', null, ['class' => 'form-control','value' => old('author')]) !!}
        @if ($errors->has('author'))
        <div class="error">{{ $errors->first('author') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('book_code', 'Code:') !!}
        <span class="mandatory">*</span>
        {!! Form::text('book_code', null, ['class' => 'form-control','value' => old('book_code'),'required' => true]) !!}
        @if ($errors->has('book_code'))
        <div class="error">{{ $errors->first('book_code') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('price_after_tax', 'MRP:') !!}
        <span class="mandatory">*</span>
        {!! Form::text('price_after_tax', null, ['class' => 'form-control','value' => old('price_after_tax'),'required' => true]) !!}
        @if ($errors->has('price_after_tax'))
        <div class="error">{{ $errors->first('price_after_tax') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('is_taxable', 'Is Taxable:') !!}
        <label class="checkbox">
            {!! Form::checkbox('is_taxable', 1, (isset($book->is_taxable))?$book->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6 tax">
        {!! Form::label('tax', 'Tax: (%) ') !!}
        <span class="mandatory">*</span>
        {!! Form::text('tax', null, ['class' => 'form-control','value' => old('tax')]) !!}
        @if ($errors->has('tax'))
        <div class="error">{{ $errors->first('tax') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('hsn_code', 'HSN Code :') !!}
        {!! Form::text('hsn_code', null, ['class' => 'form-control','value' => old('hsn_code')]) !!}
        @if ($errors->has('hsn_code'))
        <div class="error">{{ $errors->first('hsn_code') }}</div>
        @endif
    </div>
</div>
<div class="row">
<!--    <div class="form-group col-sm-6">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::text('quantity', null, ['class' => 'form-control','value' => old('quantity')]) !!}
        @if ($errors->has('quantity'))
        <div class="error">{{ $errors->first('quantity') }}</div>
        @endif
    </div>-->
   
    <div class="form-group col-sm-6">
       {!! Form::label('medium', 'Medium:') !!}
        {!! Form::text('medium', null, ['class' => 'form-control','value' => old('medium')]) !!}
        @if ($errors->has('medium'))
        <div class="error">{{ $errors->first('medium') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
       {!! Form::label('weight', 'Weight: (in grams)') !!}
        {!! Form::text('weight', null, ['class' => 'form-control','value' => old('weight')]) !!}
        @if ($errors->has('weight'))
        <div class="error">{{ $errors->first('weight') }}</div>
        @endif
    </div>
</div>
<div class="row">
     <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($book->status))?$book->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.book') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
<script>
    $('input[name="is_taxable"]').change(function(){
    if ($(this).prop('checked'))
            $('.tax').slideDown();
    else
            $('.tax').slideUp();
    });
    $(document).ready(function(){
    @if (isset($book -> is_taxable) && !$book -> is_taxable)
            $('.tax').slideUp();
    @endif
    });
</script>