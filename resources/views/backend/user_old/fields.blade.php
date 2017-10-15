<!-- First Name -->
<div class="form-group col-sm-6 {!! $errors->has('first_name') ? 'has-error' : '' !!}">
    <label class="control-label" for="first_name">First Name</label>
    <div class="controls">
        {!! Form::text('first_name', null, array('class'=>'form-control', 'id' => 'first_name', 'placeholder'=>'First Name', 'value'=>Input::old('first_name'))) !!}
        @if ($errors->first('first_name'))
        <span class="help-block">{!! $errors->first('first_name') !!}</span>
        @endif
    </div>
</div>

<!-- Last Name -->
<div class="form-group col-sm-6 {!! $errors->has('last_name') ? 'has-error' : '' !!}">
    <label class="control-label" for="last-name">Last Name</label>
    <div class="controls">
        {!! Form::text('last_name', null, array('class'=>'form-control', 'id' => 'last_name', 'placeholder'=>'Last Name', 'value'=>Input::old('last_name'))) !!}
        @if ($errors->first('last_name'))
        <span class="help-block">{!! $errors->first('last_name') !!}</span>
        @endif
    </div>
</div>

<!-- Email -->
<div class="form-group col-sm-6 {!! $errors->has('email') ? 'has-error' : '' !!}">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
        {!! Form::text('email', null, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) !!}
        @if ($errors->first('email'))
        <span class="help-block">{!! $errors->first('email') !!}</span>
        @endif
    </div>
</div>

<!-- Role -->
<div class="form-group col-sm-6 {!! $errors->has('is_published') ? 'has-error' : '' !!}">
    <label class="control-label" for="groups">Roles</label>
    <div class="controls">
        @foreach($roles as $id=>$role)
        <label><input type="checkbox" <?=(in_array($role,$userRoles) ? 'checked="checked"' : '')?> value="{!! $id !!}" name="roles[{!! $role !!}]" data-toggle="toggle">  {!! $role !!}</label>
        @endforeach
    </div>
</div>

<legend>Password</legend>
<!-- Password -->
<div class="form-group col-sm-6 {!! $errors->has('password') ? 'has-error' : '' !!}">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
        {!! Form::password('password', array('class'=>'form-control', 'id' => 'password', 'placeholder'=>'Password')) !!}
        @if ($errors->first('password'))
        <span class="help-block">{!! $errors->first('password') !!}</span>
        @endif
    </div>
</div>

<!-- Confirm Password -->
<div class="form-group col-sm-6 {!! $errors->has('confirm-password') ? 'has-error' : '' !!}">
    <label class="control-label" for="confirm-password">Confirm Password</label>
    <div class="controls">
        {!! Form::password('confirm_password', array('class'=>'form-control', 'id' => 'confirm_password', 'placeholder'=>'Confirm Password')) !!}
        @if ($errors->first('confirm-password'))
        <span class="help-block">{!! $errors->first('confirm-password') !!}</span>
        @endif
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url(getLang() . '/admin/user') !!}" class="btn btn-default">Cancel</a>
</div>
