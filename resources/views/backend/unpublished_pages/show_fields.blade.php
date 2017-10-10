<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $unpublishedPage->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $unpublishedPage->name !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $unpublishedPage->slug !!}</p>
</div>

<!-- New Slug Field -->
<div class="form-group">
    {!! Form::label('new_slug', 'New Slug:') !!}
    <p>{!! $unpublishedPage->new_slug !!}</p>
</div>

