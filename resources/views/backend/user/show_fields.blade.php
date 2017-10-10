<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user['id'] !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $user['first_name'] !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $user['last_name'] !!}</p>
</div>

<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', 'Avatar:') !!}
    <p><img itemprop="image" src="{!! gravatarUrl($user['email']) !!}" alt="{!! $user['email'] !!}"/></p>
</div>

<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{!! $user['email'] !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user['email'] !!}</p>
</div>

<!-- Isadmin Field -->
<div class="form-group">
    {!! Form::label('roles', 'Roles:') !!}
    <p>{!! $user['roles'] !!}</p>
</div>

<!-- Last Login Field -->
<div class="form-group">
    {!! Form::label('last_login', 'Last Login:') !!}
    <p>{!! ($user['last_login'] ? $user['last_login'] : 'not logged in yet') !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user['created_at'] !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user['updated_at'] !!}</p>
</div>

