@extends('backend/layout/clip')

@section('topscripts')

    <link rel="stylesheet" href="{!! asset('clip/bower_components/dropzone/css/basic.css ') !!}" type="text/css" />
    <link rel="stylesheet" href="{!! asset('clip/bower_components/dropzone/css/dropzone.css') !!}" type="text/css" />
    <script src="{!! asset('/clip/bower_components/dropzone/dropzone.js') !!}"></script>
    <script src="{!! asset('/clip/bower_components/ckeditor/ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript">
<<<<<<< HEAD
    {!! HTML::script('clip/bower_components/ckeditor/ckeditor.js') !!}
    {!! HTML::style('clip/bower_components/dropzone/css/basic.css') !!}
    {!! HTML::style('clip/bower_components/dropzone/css/dropzone.css') !!}
    {!! HTML::script('clip/bower_components/dropzone/dropzone.js') !!}
=======
>>>>>>> refs/remotes/origin/master
        (function($){
             Dropzone.options.myDropzone = {
                    init: function () {
                        this.on("addedfile", function (file) {
                            var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
                            var _this = this;
                            removeButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                e.stopPropagation();
                                var fileInfo = new Array();
                                fileInfo['name'] = file.name;
                                $.ajax({
                                    type: "POST",
                                    url: "{!! url(getLang() . '/admin/photo-gallery-delete-image') !!}",
                                    headers: {
                                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                                    },
                                    data: {file: file.name},
                                    success: function (response) {
                                        if (response == 'success') {
                                            //alert('deleted');
                                        }
                                    },
                                    error: function () {
                                        alert("error");
                                    }
                                });
                                _this.removeFile(file);
                            });
                            file.previewElement.appendChild(removeButton);
                        });
                    }
                };
                var myDropzone = new Dropzone("#dropzone .dropzone");
                Dropzone.options.myDropzone = false;
                @foreach($photo_gallery->photos as $photo)
                // Create the mock file:
                var mockFile = { name: "{!! $photo->file_name !!}", size: "{!! $photo->file_size !!}" };
                // Call the default addedfile event handler
                myDropzone.emit("addedfile", mockFile);
                // And optionally show the thumbnail of the file:
                myDropzone.emit("thumbnail", mockFile, "{!! url($photo->path) !!}");
                @endforeach
        });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! url(getLang(). '/admin/photo-gallery') !!}"><i class="fa fa-desktop"></i> Photo Gallery</a></li>
            <li class="active">Update Photo Gallery</li>
        </ol>
        <div class="page-header">
            <h1> Photo Gallery <small> | Update Photo Gallery</small> </h1>
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
                                    <a class="btn btn-default" href="{!! url(getLang() . '/admin/photo-gallery') !!}">Photo Galleries </a>
                                    <a class="btn btn-default hidden-xs" href="{!! langRoute('admin.photo-gallery.create') !!}"> <i class="fa fa-plus"></i>&nbsp;Add Photo Gallery </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- Dropzone -->
                                <label class="control-label" for="title">Images</label>
                                <div style="width: 700px; min-height: 300px; height: auto; border:1px solid slategray;" id="dropzone">
                                    {!! Form::open(array('url' => getLang() . '/admin/photo-gallery/upload/' . $photo_gallery->id, 'class'=>'dropzone', 'id'=>'my-dropzone')) !!}
                                    <!-- Single file upload
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                        -->
                                    <!-- Multiple file upload-->
                                    <div class="fallback">
                                        <input name="file" type="file" multiple/>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                {!! Form::open( array( 'route' => array( getLang() . '.admin.photo-gallery.update', $photo_gallery->id), 'method' => 'PATCH', 'files'=>true)) !!}
                                <!-- Title -->
                                <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                                    <label class="control-label" for="title">Title</label>
                                    <div class="controls">
                                        {!! Form::text('title', $photo_gallery->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                                        @if ($errors->first('title'))
                                        <span class="help-block">{!! $errors->first('title') !!}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="control-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                                    <label class="control-label" for="title">Content</label>
                                    <div class="controls">
                                        {!! Form::textarea('content', $photo_gallery->content, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>Input::old('content'))) !!}
                                        @if ($errors->first('content'))
                                        <span class="help-block">{!! $errors->first('content') !!}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Published -->
                                <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">
                                    <div class="controls">
                                        <label class="">{!! Form::checkbox('is_published', 'is_published',$photo_gallery->is_published) !!} Publish ?</label>
                                        @if ($errors->first('is_published'))
                                        <span class="help-block">{!! $errors->first('is_published') !!}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Form actions -->
                                {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
                                {!! Form::close() !!}
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
<script type="text/javascript">
    window.onload = function () {
        CKEDITOR.replace('content', {
            "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
        });
    };
</script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection
