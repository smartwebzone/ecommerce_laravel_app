{!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'patch', 'files'=>true]) !!}
@include('backend.user.partials.userfields')

{!! Form::close() !!}
