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
            <li class="active">Projects</li>
        </ol>
        <div class="page-header">
            <h1> Project <small> | Control Panel</small> </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
{{--
<div class="container-fluid">
    --}}
    <div class="row">
        {{--
        <div class="col-sm-2"></div>
        --}}
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
                                    <a class="btn btn-default active" href="javascript:void(0)"> Projects </a>
                                    <a class="btn btn-default hidden-xs" href="{!! langRoute('admin.project.create') !!}"> <i class="fa fa-plus"></i> Add Project </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="col-lg-10">
                                    @if($projects->count())
                                    <div class="">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $projects as $project )
                                                <tr>
                                                    <td> {!! link_to_route(getLang(). '.admin.project.show', $project->title, $project->id,
                                                        array( 'class' => 'btn btn-link btn-xs' )) !!}
                                                    </td>
                                                    <td>{!! $project->created_at !!}</td>
                                                    <td>{!! $project->updated_at !!}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                                            Action <span class="caret"></span> </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="{!! langRoute('admin.project.show', array($project->id)) !!}">
                                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Project
                                                                    </a>
                                                                </li>
                                                                <li><a href="{!! langRoute('admin.project.edit', array($project->id)) !!}">
                                                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Project
                                                                    </a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="{!! URL::route('admin.project.delete', array($project->id)) !!}">
                                                                    <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                                                    Project </a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a target="_blank" href="{!! URL::route('dashboard.project.show', array('slug' => $project->slug)) !!}">
                                                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="alert alert-danger">No results found</div>
                                    @endif
                                </div>
                                <div class="pull-left">
                                    <ul class="pagination">
                                        {!! $projects->render() !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
</div>
--}}
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection