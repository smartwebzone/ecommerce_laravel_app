@extends('backend/layout/create')

@section('topscripts')
<script src="{!! asset('/assets/js/fully.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#video_id").keyup(function () {
            var id = $(this).val();
            var type = $('input[name=type]:checked').val();

            id = urlParser(id, type);

            $.ajax({
                type: "POST",
                url: "{!! url(getLang() . '/admin/video/get-video-detail') !!}",
                data: {"video_id": id, "type": type},
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (response) {

                    //console.log(response);
                    $("#video_id").val(response.id);
                    $("#title").val(response.title);

                },
                error: function () {
                    //alert("error");
                }
            });

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
            <li><a href="{!! url(getLang(). '/admin/video') !!}"><i class="fa fa-play"></i> Video</a></li>
            <li class="active">Update Video</li>
        </ol>
        <div class="page-header">
            <h1> Video <small> | Update Video</small> </h1>
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
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/videos') !!}">Videos </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin.video.create') !!}"> <i class="fa fa-plus"></i> Add Video </a>
                            </div>
                        </div>
                        <div class="col-md-10">


                            {!! Form::model($video, ['route' => ['admin.video.update', $video->id], 'method' => 'PATCH','files'=>true]) !!}
                            <!-- Type -->

                            <!-- Office Status Field -->
                            <div class="form-group col-md-3">
                                {!! Form::label('video_section', 'Video Section:') !!}
                                {!! Form::select('video_section', ['' => '', 'Regular Video' => 'Regular Video', 'Support Video' => 'Support Video', 'Promo Video' => 'Promo Video'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('categories', 'Video Category:') !!}
                                {!! Form::select('categories', $categories, @$category->id, ['class' => 'form-control']) !!}
                            </div>
                            <input type="hidden" name="type" value="youtube">
                            <!--                        <div class="form-group col-sm-12">
                                                        <label class="control-label" for="type">Type</label>
                                                        <div class="radio">
                                                            <label>
                                                                {!! Form::radio('type', 'youtube', (($video->type == 'youtube') ? true : false), array('id'=>'youtube', 'class'=>'type')) !!}
                                                                <span>Youtube</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                {!! Form::radio('type', 'vimeo', (($video->type == 'vimeo') ? true : false), array('id'=>'vimeo', 'class'=>'type')) !!}
                                                                <span>Vimeo</span>
                                                            </label>
                                                        </div>
                                                        <br>
                                                    </div>-->
                            <!-- Video Id -->
                            <div class="form-group col-sm-12 {!! $errors->has('title') ? 'has-error' : '' !!}">
                                <label class="control-label" for="video_url">Video URL</label>
                                <div class="controls">
                                    {!! Form::text('video_url', $video->video_url, array('class'=>'form-control', 'id' => 'video_url', 'placeholder'=>'Video URL', 'value'=>Input::old('video_url'))) !!}
                                    @if ($errors->first('video_url'))
                                    <span class="help-block">{!! $errors->first('video_url') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Title -->
                            <div class="form-group col-sm-12 {!! $errors->has('title') ? 'has-error' : '' !!}">
                                <label class="control-label" for="title">Title</label>
                                <div class="controls">
                                    {!! Form::text('title', $video->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                                    @if ($errors->first('title'))
                                    <span class="help-block">{!! $errors->first('title') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- still_image Field -->
                            <div class="form-group col-sm-12 {!! $errors->has('still_image') ? 'has-error' : '' !!}">

                                {!! Form::label('still_image', 'Image:') !!}
                                <div class="controls">
                                    @if($video->still_image) 
                                    <span class="fileupload-preview"> <img itemprop="image" src="{!! url('/uploads/videos/'.$video->still_image) !!}" class="img-responsive" alt="Image"> </span>
                                    @endif

                                    {!! Form::file('still_image') !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group col-sm-12 {{ $errors->has('video_tags')? 'has-error' : '' }}">
                                {!! Form::label('video_tags', 'Tags:') !!}
                                {!! Form::text('video_tags', $tags, ['class' => 'form-control tags', 'value' => old('video_tags')]) !!}
                                {!! $errors->has('video_tags')? '<p class="help-block"> '.$errors->first('video_tags').' </p>':'' !!}
                            </div>

                            <div class="form-group col-sm-12">
                                <!-- Form actions -->
                                {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
                                <a href="{!! url(getLang() . '/admin/videos') !!}" class="btn btn-default">&nbsp;Cancel</a>
                                {!! Form::close() !!}</div>
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
<script>
    $('#video_tags, .tags').tagsInput({
        removeWithBackspace: true,
        width: 'auto',
        placeholderColor: 'red'

    });
</script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection
