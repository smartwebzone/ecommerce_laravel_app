@extends('backend/layout/clip')

@section('topscripts')
<<<<<<< HEAD
{!! HTML::style('clip/bower_components/ckeditor/contents.css') !!}
{!! HTML::script('clip/assets/js/jquery.lazyload.min.js') !!}

=======
{!! HTML::style('ckeditor/contents.css') !!}
<script src="{!! asset('/clip/assets/js/jquery.lazyload.min.js') !!}"></script>
>>>>>>> refs/remotes/origin/master
<script type="text/javascript">
    (function($){
        $("img.lazy").lazyload({
            effect: "fadeIn"
        });
    });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! langRoute('admin.photo-gallery.index') !!}"><i class="fa fa-desktop"></i> Photo Galleries</a></li>
            <li class="active">Show Photo Gallery</li>
        </ol>
        <div class="page-header">
            <h1> Photo Gallery <small> | Show Photo Gallery</small> </h1>
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
                                    <a class="btn btn-default hidden-xs  " href="{!! url(getLang() . '/admin/photo-gallery') !!}">Photo Galleries </a>
                                    <a class="btn btn-default active" href="{!! langRoute('admin.photo-gallery.show') !!}"> <i class="fa fa-plus"></i>&nbsp;Add Photo Gallery </a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td><strong>Title</strong></td>
                                            <td>{!! $photo_gallery->title !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Content</strong></td>
                                            <td>{!! $photo_gallery->content !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date Created</strong></td>
                                            <td>{!! $photo_gallery->created_at !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date Updated</strong></td>
                                            <td>{!! $photo_gallery->updated_at !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Photos</strong></td>
                                            <td>
                                                @if($photo_gallery->photos->count())
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @foreach($photo_gallery->photos as $photo)
                                                        <img style="border-radius: 20px;" class="lazy left" data-original="{!! url('uploads/dropzone/thumb_' . $photo->file_name) !!}"/>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
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
