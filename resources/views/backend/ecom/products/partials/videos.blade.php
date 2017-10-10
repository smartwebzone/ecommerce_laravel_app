<div class="repeat-video">
    <div class="video-wrapper">
        <span class="btn btn-primary add-video"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add Video</span>
        <div class="video-container">
            @if(@$product->videos)
            @foreach($product->videos as $key=>$video)
            <div class="col-md-12 video-row">
                <hr>
                <div class="videoenabled form-group col-sm-2">
                    {!! Form::label('enabled', 'Enabled:') !!}

                    <label class="checkbox-inline">
                        <input name="videos[{{$key}}][id]" value="{{$video['id']}}" type="hidden">
                        <input  name="videos[{{$key}}][enabled]" type="checkbox" class="enabled-checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                <?= ($video['status']) ? 'checked' : '' ?> value="1"   data-offstyle="danger" data-class="fast">
                    </label>
                </div>

                <div class="videosection form-group col-sm-2">
                    {!! Form::label('video_section', 'Video Type:') !!}
                    {!! Form::select('videos['.$key.'][video_section]', ['' => '', 'Regular Video' => 'Regular Video', 'Support Video' => 'Support Video', 'Promo Video' => 'Promo Video'], $video['video_section'], ['class' => 'form-control']) !!}
                </div>
                <div class="videotitle form-group col-sm-2 {!! $errors->has('title') ? 'has-error' : '' !!}">
                    <label class="control-label" for="title">Title</label>
                    <div class="controls">
                        {!! Form::text('videos['.$key.'][title]', $video['title'], array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                        @if ($errors->first('title'))
                        <span class="help-block">{!! $errors->first('title') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="videourl form-group col-sm-3 {!! $errors->has('video_url') ? 'has-error' : '' !!}">
                    <label class="control-label" for="video_id">Video url</label>
                    <div class="controls">
                        {!! Form::text('videos['.$key.'][video_url]', $video['video_url'], array('class'=>'form-control', 'id' => 'video_url', 'placeholder'=>'Video URL', 'value'=>Input::old('video_url'))) !!}
                        @if ($errors->first('video_url'))
                        <span class="help-block">{!! $errors->first('video_url') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- still_image Field -->
                    <div class="stillimage form-group col-sm-8">
                        @if($video['still_image']) 
                        <span class="fileupload-preview"> <img itemprop="image" src="{!! url('/uploads/videos/'.$video['still_image']) !!}" class="img-responsive" alt="Image"> </span>
                        @endif
                        {!! Form::label('still_image', 'Image:') !!}
                        {!! Form::file('videos['.$key.'][still_image]') !!}
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-sm-1">
                    <label class="col-sm-1"></label>
                    <button type="button" class="btn btn-danger btn-md remove-video btn-sm"><span class="glyphicon glyphicon-remove "></span> Remove</button>
                </div>


            </div>
            @endforeach
            @endif
            <div class="col-md-12 template video-row">
                <hr>
                <div class="videoenabled form-group col-sm-2">
                    {!! Form::label('enabled', 'Enabled:') !!}

                    <label class="checkbox-inline">

                        <input  name="videos[({video-row-count})][enabled]" type="checkbox" class="enabled-checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                data-offstyle="danger" data-class="fast">
                    </label>
                </div>

                <div class="videosection form-group col-sm-2">
                    {!! Form::label('video_section', 'Video Type:') !!}
                    {!! Form::select('videos[({video-row-count})][video_section]', ['' => '', 'Regular Video' => 'Regular Video', 'Support Video' => 'Support Video', 'Promo Video' => 'Promo Video'], null, ['class' => 'form-control']) !!}
                </div>
                <div class="videotitle form-group col-sm-2 {!! $errors->has('title') ? 'has-error' : '' !!}">
                    <label class="control-label" for="title">Title</label>
                    <div class="controls">
                        {!! Form::text('videos[({video-row-count})][title]', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) !!}
                        @if ($errors->first('title'))
                        <span class="help-block">{!! $errors->first('title') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="videourl form-group col-sm-3 {!! $errors->has('video_url') ? 'has-error' : '' !!}">
                    <label class="control-label" for="video_id">Video url</label>
                    <div class="controls">
                        {!! Form::text('videos[({video-row-count})][video_url]', null, array('class'=>'form-control', 'id' => 'video_url', 'placeholder'=>'Video URL', 'value'=>Input::old('video_url'))) !!}
                        @if ($errors->first('video_url'))
                        <span class="help-block">{!! $errors->first('video_url') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- still_image Field -->
                    <div class="stillimage form-group col-sm-3">
                        {!! Form::label('still_image', 'Image:') !!}
                        {!! Form::file('videos[({video-row-count})][still_image]') !!}
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-sm-1">
                    <label class="col-sm-1"></label>
                    <button type="button" class="btn btn-danger btn-md remove-video  btn-sm"><span class="glyphicon glyphicon-remove "></span> Remove</button>
                </div>


            </div>
        </div>
    </div>
</div>