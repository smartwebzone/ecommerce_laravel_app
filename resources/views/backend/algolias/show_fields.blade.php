<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $algolia->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $algolia->name !!}</p>
</div>

<!-- Meta Description Field -->
<div class="form-group">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    <p>{!! $algolia->meta_description !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $algolia->slug !!}</p>
</div>

