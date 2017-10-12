<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}

</div>


<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','value' => old('description'),'required' => true]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School:') !!}
    {!! Form::select('school_id', $school, null, array('class' => 'form-control', 'value'=>Input::old('school_id'))) !!}
</div>


<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox">
        {!! Form::checkbox('status', 1, (isset($standard->status))?$standard->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
    <a href="{!! route('admin.standard') !!}" class="btn btn-default">Cancel</a>
</div>
