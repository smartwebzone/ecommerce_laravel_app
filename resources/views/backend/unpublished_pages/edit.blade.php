@extends('backend/layout/clip')

@section('topscripts-off')
<script type="text/javascript">
    (function($){});
</script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! route('admin.unpublished_pages.index') !!}"><i class="fa fa-gears"></i>  Unpublished Pages</a></li>
            <li class="active">Update Page</li>
            </ol>
            <div class="page-header">
                <h1> Unpublished Pages <small> | Update</small> </h1>
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
                    {{--    @include('flash::message') --}}
                    {{--    @include('adminlte-templates::common.errors') --}}
                        <div class="clearfix"></div>

                        <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! route('admin.unpublished_pages.index') !!}">Unpublished Pages </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin.unpublished_pages.create') !!}">
                                  <i class="fa fa-plus"></i> Update Page </a>
                            </div>
                        </div>

                        <div class="col-md-10">
                            {!! Form::model($unpublishedPages, ['route' => ['admin.unpublished_pages.update', $unpublishedPages->id], 'method' => 'patch']) !!}

                            @include('backend.unpublished_pages.fields')

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