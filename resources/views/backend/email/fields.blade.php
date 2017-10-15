<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('template', 'Template:') !!}
        {!! Form::select('template', $template, null, array('class' => 'form-control', 'value'=>Input::old('template'),'required' => true)) !!}
        @if ($errors->has('template'))
        <div class="error">{{ $errors->first('template') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}
        @if ($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('subject', 'Email Subject:') !!}
        {!! Form::text('subject', null, ['class' => 'form-control','value' => old('subject'),'required' => true]) !!}
        @if ($errors->has('subject'))
        <div class="error">{{ $errors->first('subject') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('body', 'Email Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control','value' => old('body'),'required' => true,'rows'=>6]) !!}
        @if ($errors->has('body'))
        <div class="error">{{ $errors->first('body') }}</div>
        @endif
    </div>
</div> 
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($email->status))?$email->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.email') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>    