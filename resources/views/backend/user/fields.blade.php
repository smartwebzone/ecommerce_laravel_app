<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('parent_first_name', 'Parent | Guardian First Name:') !!}
        {!! Form::text('parent_first_name', null, ['class' => 'form-control', 'value' => old('parent_first_name'),'required' => true]) !!}
        @if ($errors->has('parent_first_name'))
        <div class="error">{{ $errors->first('parent_first_name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('parent_middle_name', 'Parent | Guardian Middle Name:') !!}
        {!! Form::text('parent_middle_name', null, ['class' => 'form-control', 'value' => old('parent_middle_name')]) !!}
        @if ($errors->has('parent_middle_name'))
        <div class="error">{{ $errors->first('parent_middle_name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('parent_last_name', 'Parent | Guardian Last Name:') !!}
        {!! Form::text('parent_last_name', null, ['class' => 'form-control', 'value' => old('parent_last_name'),'required' => true]) !!}
        @if ($errors->has('parent_last_name'))
        <div class="error">{{ $errors->first('parent_last_name') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('first_name', 'Child First Name:') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control', 'value' => old('first_name'),'required' => true]) !!}
        @if ($errors->has('first_name'))
        <div class="error">{{ $errors->first('first_name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('middle_name', 'Child Middle Name:') !!}
        {!! Form::text('middle_name', null, ['class' => 'form-control', 'value' => old('middle_name')]) !!}
        @if ($errors->has('middle_name'))
        <div class="error">{{ $errors->first('middle_name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('last_name', 'Child Last Name:') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name'),'required' => true]) !!}
        @if ($errors->has('last_name'))
        <div class="error">{{ $errors->first('last_name') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('email', 'Email Address:') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'value' => old('email'),'required' => true]) !!}
        @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('mobile', 'Mobile:') !!}
        {!! Form::text('mobile', null, ['class' => 'form-control', 'value' => old('mobile'),'required' => true]) !!}
        @if ($errors->has('mobile'))
        <div class="error">{{ $errors->first('mobile') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('landline', 'Landline:') !!}
        {!! Form::text('landline', null, ['class' => 'form-control', 'value' => old('landline')]) !!}
        @if ($errors->has('landline'))
        <div class="error">{{ $errors->first('landline') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('password', 'Password:') !!}
        <input type="password" class="form-control" name="password" id="password" {{(empty($user['id']) ? 'required="true"' : '')}}>
        @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('confirm-password', 'Confirm Password:') !!}
        <input type="password" class="form-control" name="confirm-password" id="confirm-password"  {{(empty($user['id']) ? 'required="true"' : '')}}>
        @if ($errors->has('confirm-password'))
        <div class="error">{{ $errors->first('confirm-password') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('isAdmin', 'Is Admin:') !!}
        <label class="checkbox">
            {!! Form::checkbox('isAdmin', 1, (isset($user->isAdmin))?$user->isAdmin:false,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('isAdmin')]) !!}
        </label>
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($user->status))?$user->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.user.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>    