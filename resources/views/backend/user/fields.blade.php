<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control', 'value' => old('first_name'),'required' => true]) !!}
        @if ($errors->has('first_name'))
        <div class="error">{{ $errors->first('first_name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name'),'required' => true]) !!}
        @if ($errors->has('last_name'))
        <div class="error">{{ $errors->first('last_name') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email Address:') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'value' => old('email'),'required' => true]) !!}
        @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('mobile', 'Mobile:') !!}
        {!! Form::text('mobile', null, ['class' => 'form-control', 'value' => old('mobile'),'required' => true]) !!}
        @if ($errors->has('mobile'))
        <div class="error">{{ $errors->first('mobile') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        <input type="password" class="form-control" name="password" id="password" >
        @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('confirm-password', 'Confirm Password:') !!}
        <input type="password" class="form-control" name="confirm-password" id="confirm-password" >
        @if ($errors->has('confirm-password'))
        <div class="error">{{ $errors->first('confirm-password') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('isAdmin', 'Is Admin:') !!}
        <label class="checkbox">
            {!! Form::checkbox('isAdmin', 1, (isset($user->isAdmin))?$user->isAdmin:false,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('isAdmin')]) !!}
        </label>
    </div>
    <div class="form-group col-sm-6">
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