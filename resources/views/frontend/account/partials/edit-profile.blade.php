@extends('frontend.layout.account')

@section('content')
{!! Form::model($userinfo, ['route' => ['admin.userinfos.update', $userinfo->id], 'method' => 'patch']) !!}
    @includes('frontend.account.partials.parts.profile-fields.blade.php')
{!! Form::close() !!}
@endsection
