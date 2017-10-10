<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-8">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','required' => 'required']) !!}
</div>

<!-- New Slug Field -->
<div class="form-group col-sm-8">
    {!! Form::label('new_slug', 'New Slug:') !!}
    {!! Form::text('new_slug', null, ['class' => 'form-control']) !!}
    (Leave blank if you want to redirect to the home page)
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.unpublished_pages.index') !!}" class="btn btn-default">Cancel</a>
</div>
