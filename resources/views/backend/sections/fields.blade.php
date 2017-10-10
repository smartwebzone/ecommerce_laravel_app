<!-- Name Field -->
<div class="form-group col-sm-8">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Description Field -->
<div class="form-group col-sm-10">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'rows'=> '3']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Lang Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('lang', 'Lang:') !!}--}}
    {{--{!! Form::text('lang', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.sections.index') !!}" class="btn btn-default">Cancel</a>
</div>
