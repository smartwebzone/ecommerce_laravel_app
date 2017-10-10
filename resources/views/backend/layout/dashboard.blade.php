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
                   <h1> Dashboard <small>Version 1.0</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')
{{-- @include('backend.layout.parts.3col') --}}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>

                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="panel-body">
                    @include('flash::message')
                    {{--@include('backend.layout.partials.stats-widget')--}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')@endsection
