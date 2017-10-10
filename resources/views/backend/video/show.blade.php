@extends('backend/layout/clip')

@section('topscripts')

@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! route('admin.video.index') !!}><i class="fa fa-play"></i> Video</a></li>
            <li class="active">Show Video</li>
        </ol>
        <div class="page-header">
            <h1> Page   <small> | Show Video</small> </h1>
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
                                <a class="btn btn-default" href="{!! route('admin.video.index') !!}">
                                    Videos
                                </a>

                                <a class="btn btn-default hidden-xs" href="{!! route('admin.video.create') !!}">
                                    <i class="fa fa-plus"></i> Add Video
                                </a>

                            </div>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><strong>Title</strong></td>
                                    <td>{!! $video->title !!}</td>
                                    <td><strong>Section</strong></td>
                                    <td>{!! $video->video_section !!}</td>
                                    <td><strong>Category</strong></td>
                                    <td>{!! $video->videoCategory->first()['title'] !!}</td>
                                    @if($video->type == 'youtube')
                                    @if($video->still_image)
                            <div onclick="this.nextElementSibling.style.display = 'block';
                                    this.style.display = 'none'">
                                <img width="890" height="450" src="{!! url('/uploads/videos/'.$video->still_image) !!}" style="cursor:pointer" />
                                </span>
                            </div>
                            <div style="display:none">
                                <iframe width="890" height="450" src="https://www.youtube.com/embed/{{$video->video_id}}?rel=0"></iframe>
                            </div>
                            @else
                            <iframe width="890" height="450" src="https://www.youtube.com/embed/{{$video->video_id}}"></iframe>
                            @endif
                            @else
                            <iframe width="853" height="480" src="http://player.vimeo.com/video/{!! $video->video_id !!}?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            @endif
                            </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-danger" href="{!! route('admin.video.index') !!}">Back</a>
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
