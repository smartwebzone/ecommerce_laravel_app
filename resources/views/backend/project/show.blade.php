@extends('backend/layout/clip')

@section('topscripts')
    <link rel="stylesheet" href="{!! asset('/assets/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}" type="text/css" />
<script type="text/javascript">
    (function($){
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{!! url(getLang(). '/admin/project') !!}"><i class="fa fa-list"></i> Project</a></li>
                <li class="active">Show Project</li>
            </ol>
            <div class="page-header">
                   <h1> Project <small> | Show News</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection










@section('content')
{{-- <div class="container-fluid"> --}}
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
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/video/index') !!}">Videos </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin/video/create') !!}"> <i class="fa fa-plus"></i> Add Video </a>
                                <a href="{!! langRoute('admin.project.index') !!}" class="btn btn-default"> <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back </a>
                            </div>
                        </div>

                        <div class="col-md-10">


        <table class="table table-striped">
            <tbody>
            <tr>
                <td><strong>Title</strong></td>
                <td>{!! $project->title !!}</td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>{!! $project->description !!}</td>
            </tr>
            <tr>
                <td><strong>Date Created</strong></td>
                <td>{!! $project->created_at !!}</td>
            </tr>
            <tr>
                <td><strong>Date Updated</strong></td>
                <td>{!! $project->updated_at !!}</td>
            </tr>
            </tbody>
        </table>


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
<script src="{!! asset('/clip/jasny-bootstrap/js/jasny-bootstrap.min.js') !!}"></script>
<script type="text/javascript">
    window.onload = function () {
        CKEDITOR.replace('description', {
            "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
        });
    };
</script>

        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')

@endsection
