@extends('backend/layout/clip')

<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
@section('topcss')@endsection
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@section('topscripts')@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">

        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dashboard</li>
        </ol>
        <div class="page-header">
            <h1> Dashboard </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
{{-- @include('backend.layout.parts.3col') --}}
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-info">Welcome {{Sentinel::getUser()->first_name}}!</div>
    </div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')@endsection
