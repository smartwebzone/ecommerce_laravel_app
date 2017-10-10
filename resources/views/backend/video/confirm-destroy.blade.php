@extends('backend/layout/clip')

@section('topscripts')
<script type="text/javascript">
    $(document).ready(function () {


    });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! route('admin.video.index') !!}"><i class="fa fa-play"></i> Video</a></li>
            <li class="active">Delete Video</li>
        </ol>
        <div class="page-header">
            <h1> Video <small> | Delete Video</small> </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-10">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        @include('flash::message')
                        <div class="clearfix"></div>
                        <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! url('/admin/video/index') !!}">Videos </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin.video.create') !!}"> <i class="fa fa-plus"></i> Add Video </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            {!! Form::open( array(  'route' => array('admin.video.destroy', $video->id ) ) ) !!}
                            {!! Form::hidden( '_method', 'DELETE' ) !!}
                            <div class="alert alert-warning">
                                <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $video->title !!} </b> ?
                                </div>
                                <div class="pull-right">
                                    {!! Form::submit( 'Yes', array( 'class' => 'btn btn-danger' ) ) !!}
                                    {!! link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection
