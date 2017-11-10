@extends('backend/layout/clip')

@section('topscripts')
<script type="text/javascript">
    $(document).ready(function() {
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
            <li class="active">Videos</li>
        </ol>
        <div class="page-header">
            <h1> Video </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-10">
        @include('flash::message')
        <br>
        <div class="pull-left">
            <div class="btn-toolbar"><a href="{!! route('admin.video.create') !!}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Video </a>
            </div>
        </div>
        <br> <br> <br>
        @if($videos->count())
        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Category</th>
                        <th width="10%">Thumbnail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $videos as $video )
                    <tr>
                        <td> {!! link_to_route('admin.video.show', $video->title, $video->id, array(
                            'class' => 'btn btn-link btn-xs' )) !!}
                        </td>
                        <td nowrap="nowrap">{{ $video->video_section}}</td>
                        <td>{{ $video->videoCategory->first()['title']}}</td>
                        <td><a href="{!! route('admin.video.show', array($video->id)) !!}"><img width="50px" src="{{ url('uploads/videos/thumbnail').'/'.$video->still_image}}"></a></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                Action <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! route('admin.video.show', array($video->id)) !!}">
                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Video
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! route('admin.video.edit', array($video->id)) !!}">
                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Video </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{!! URL::route('admin.video.delete', array($video->id)) !!}">
                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete
                                        Video </a>
                                    </li>
    <!--                                    <li class="divider"></li>
                                        <li>
                                            <a target="_blank" href="{!! URL::route('dashboard.video.show', array('slug'=>$video->slug)) !!}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                            </a>
                                        </li>-->
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
            {!! $videos->render() !!}
        </ul>
    </div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection
