<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $company->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $company->title !!}</p>
</div>

<!-- Meta Description Field -->
<div class="form-group">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    <p>{!! $company->meta_description !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $company->slug !!}</p>
</div>

