<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}

</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','value' => old('description'),'required' => true]) !!}
</div>

<!-- Author Field -->
<div class="form-group col-sm-6">
    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, ['class' => 'form-control','value' => old('author'),'required' => true]) !!}
</div>

<!-- Book Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('book_code', 'Book Code:') !!}
    {!! Form::text('book_code', null, ['class' => 'form-control','value' => old('book_code'),'required' => true]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control','value' => old('price'),'required' => true]) !!}
</div>

<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('is_taxable', 'Is Taxable:') !!}
    <label class="checkbox">
        {!! Form::checkbox('is_taxable', 1, (isset($book->is_taxable))?$book->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}
    </label>
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6 tax">
    {!! Form::label('tax', 'Tax: ') !!}
    {!! Form::text('tax', null, ['class' => 'form-control','value' => old('tax'),'required' => true]) !!}
</div>

<!-- Price after tax Field -->
<div class="form-group col-sm-6 tax">
    {!! Form::label('price_after_tax', 'Price after tax:') !!}
    {!! Form::text('price_after_tax', null, ['class' => 'form-control','value' => old('price_after_tax'),'required' => true]) !!}
</div>

<!-- Shipping charges Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_charges', 'Shipping charges:') !!}
    {!! Form::text('shipping_charges', null, ['class' => 'form-control','value' => old('shipping_charges'),'required' => true]) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standard_id', 'Standard:') !!}
    {!! Form::select('standard_id', $standard, (@$book && isset($book->standard->first()->id))?$book->standard->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'))) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company:') !!}
    {!! Form::select('company_id', $company, (@$book && isset($book->company->first()->id))?$book->company->first()->id:NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'))) !!}
</div>


<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox">
        {!! Form::checkbox('status', 1, (isset($book->status))?$book->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
    <a href="{!! route('admin.book') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
$('input[name="is_taxable"]').change(function(){
    if($(this).prop('checked'))
    $('.tax').slideDown();
else
    $('.tax').slideUp();
});
$(document).ready(function(){
    @if(isset($book->is_taxable) && !$book->is_taxable)
        $('.tax').slideUp();
    @endif
});
</script>