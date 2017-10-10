<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Code:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uses', '	Maximum Usage: (Per Times)') !!}
    {!! Form::text('uses', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount: (%)') !!}
    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.coupons.index') !!}" class="btn btn-default">Cancel</a>
</div>
