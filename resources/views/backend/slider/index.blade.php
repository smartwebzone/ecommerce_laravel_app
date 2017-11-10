@extends('backend/layout/clip')
@section('topscripts')
<script type="text/javascript">
    (function($) {
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
            <li class="active">Sliders</li>
        </ol>
        <div class="page-header">
            <h1> Slider </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
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
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/slider') !!}">Sliders </a>
                                <a class="btn btn-default hidden-xs" href="{!! url(getLang() . '/admin/slider/create') !!}"> <i class="fa fa-plus"></i> Add Video </a>
                            </div>
                        </div>
                        @if($sliders->count())
                        <div class="">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $sliders as $slider )
                                    <tr>
                                        <td>{!! $slider->title !!}</td>
                                        <td>{!! $slider->description !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                                Action
                                                <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{!! url(getLang() . '/admin/slider/edit', [$slider->id]) !!}">
                                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Slider
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{!! url(getLang() . '/admin/slider/delete', [$slider->id]) !!}">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Slider
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
                            {!! $sliders->render() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection

