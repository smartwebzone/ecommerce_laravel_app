<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
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
        {!! Form::label('position', 'Position:') !!}
        {!! Form::text('position', null, ['class' => 'form-control', 'value' => old('position'),'required' => true]) !!}
        @if ($errors->has('position'))
        <div class="error">{{ $errors->first('position') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($standard->status))?$standard->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.standard') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
