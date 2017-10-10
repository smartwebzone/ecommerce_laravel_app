@extends('backend/layout/create')

@section('topcss')@endsection

@section('topscripts')

<script type="text/javascript">
    (function ($) {

        $("#video_id").keyup(function () {

            $("#msg").append('<div class="msg-save" style="float:right; color:red;">Searching!</div>');
            $('.msg-save').delay(1000).fadeOut(500);

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

            return false;
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
            <li><a href="{!! url(getLang() . '/admin/videos') !!}><i class="fa fa-play"></i> Video</a></li>
            <li class="active">New Video</li>
        </ol>
        <div class="page-header">
            <h1> Video <small> | Add Video</small> </h1>
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
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/video/index') !!}">Videos </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin.video.create') !!}"> <i class="fa fa-plus"></i> Add Video </a>
                            </div>
                        </div>

                        {!! Form::open(['action' => '\App\Http\Controllers\Admin\VideoController@store','files'=>true]) !!}

                        <!-- Office Status Field -->
                        <div class="form-group col-md-3">
                            {!! Form::label('video_section', 'Video Section:') !!}
                            {!! Form::select('video_section', ['' => '', 'Regular Video' => 'Regular Video', 'Support Video' => 'Support Video', 'Promo Video' => 'Promo Video'], null,
                            ['class' => 'form-control', 'value' => old('video_section')]) !!}
                        </div>

                        <div class="form-group col-md-3">
                            {!! Form::label('categories', 'Video Category:') !!}
                            {!! Form::select('categories', $categories, old('categories'), ['class' => 'form-control']) !!}
                        </div>

                        <input type="hidden" name="type" value="youtube">
                        <!--                        <div class="form-group col-sm-12">
                                                    <label class="control-label" for="type">Type</label>
                                                    <div class="radio">
                                                        <label>
                                                            {!! Form::radio('type', 'youtube', true, array('id'=>'youtube', 'class'=>'type')) !!}
                                                            <span>Youtube</span>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            {!! Form::radio('type', 'vimeo', false, array('id'=>'vimeo', 'class'=>'type')) !!}
                                                            <span>Vimeo</span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                </div>-->
                        <!-- Video Id -->
                        <div class="form-group col-sm-12 {!! $errors->has('title') ? 'has-error' : '' !!}">
                            <label class="control-label" for="video_url">Video URL</label>
                            <div class="controls">
                                {!! Form::text('video_url', null, array('class'=>'form-control', 'id' => 'video_url', 'placeholder'=>'Video URL', 'value'=>Input::old('video_url'))) !!}
                                @if ($errors->first('video_url'))
                                <span class="help-block">{!! $errors->first('video_url') !!}</span>
                                @endif
                            </div>
                        </div>
                        <!-- Title -->
                        <div class="form-group col-sm-12 {!! $errors->has('title') ? 'has-error' : '' !!}">
                            <label class="control-label" for="title">Title</label>
                            <div class="controls">
                                {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                                @if ($errors->first('title'))
                                <span class="help-block">{!! $errors->first('title') !!}</span>
                                @endif
                            </div>
                        </div>
                        <!-- still_image Field -->
                        <div class="form-group col-sm-12 {!! $errors->has('title') ? 'has-error' : '' !!}">

                            {!! Form::label('still_image', 'Image:') !!}
                            <div class="controls">
                                
                                {!! Form::file('still_image') !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group col-sm-12 {{ $errors->has('video_tags')? 'has-error' : '' }}">
                            {!! Form::label('video_tags', 'Tags:') !!}
                            {!! Form::text('video_tags', null, ['class' => 'form-control tags', 'value' => old('video_tags')]) !!}
                            {!! $errors->has('video_tags')? '<p class="help-block"> '.$errors->first('video_tags').' </p>':'' !!}
                        </div>
                        <div class="form-group col-sm-12">
                            <!-- Form actions -->
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                            <a href="{!! url(getLang() . '/admin/videos') !!}" class="btn btn-default">&nbsp;Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{!! asset('/frontend/js/grace.js') !!}"></script>
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
