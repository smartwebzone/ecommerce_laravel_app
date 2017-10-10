<!-- Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('title')? 'has-error' : '' }}">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title')]) !!}
    {!! $errors->has('title')? '<p class="help-block"> '.$errors->first('title').' </p>':'' !!}
    <small></small>
</div>


<!-- Meta Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_description', 'Meta Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'value' => old('meta_description')]) !!}
    {!! $errors->has('meta_description')? '<p class="help-block"> '.$errors->first('meta_description').' </p>':'' !!}
</div>

<!-- Banner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banner', 'Banner:', ['class' => 'control-label']) !!}
    {!! Form::file('banner') !!}
</div>

<div class="form-group col-sm-6 {{ (@$videoCategory->banner)?'':'hide' }}">
    {!!Form::image(url('/uploads/videocategories/').@$videoCategory->banner, 'banner1') !!}
</div>
<div class="clearfix"></div>

<!-- Slug Field -->
<div class="form-group col-sm-6 {{ $errors->has('slug')? 'has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'value' => old('slug')]) !!}
    {!! $errors->has('slug')? '<p class="help-block"> '.$errors->first('slug').' </p>':'' !!}
    <small></small>
</div>


<!-- Lang Field -->
<div class="form-group col-sm-6 {{ $errors->has('lang')? 'has-error' : '' }}">
    {!! Form::label('lang', 'Lang:', ['class' => 'control-label']) !!}
    {!! Form::text('lang', null, ['class' => 'form-control', 'value' => old('lang')]) !!}
    {!! $errors->has('lang')? '<p class="help-block"> '.$errors->first('lang').' </p>':'' !!}
    <small></small>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.videoCategories.index') !!}" class="btn btn-default">Cancel</a>
</div>
