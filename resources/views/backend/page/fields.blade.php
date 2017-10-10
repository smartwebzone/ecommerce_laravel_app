<div id="panel_tab_content" class="tab-pane active">
    <!-- Title Field -->
    <div class="form-group col-sm-8">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Slug Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <!-- bootstrap / Toggle Switch Is Published Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('is_published', 'Is Published:') !!} <br>
        <label class="checkbox-inline">
        {!! Form::checkbox('is_published', 1, true,  ['data-toggle' => 'toggle', 'data-size' => 'small', 'data-onstyle'=>'success', 'data-offstyle' => 'danger', 'data-on' => '<i class="fa fa-check"></i>' , 'data-off' => '<i class="fa fa-times"></i> Off']); !!}
        {{-- See docs for available options --}}
        </label>
    </div>
    <!-- Subtitle Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subtitle', 'Subtitle:') !!}
        {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Content Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '40',]) !!}
    </div>

    <div class="form-group">
        <div class="col-sm-6 ">
            <label>
                Image Upload
            </label>
            <div class="fileupload fileupload-new  control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileupload">
                <div class="fileupload-new thumbnail" >

                    <img data-src="{{ isset($page->file_name) ? url($page->path.$page->file_name) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" src="{{ isset($page->path) ? url($page->path.$page->file_name) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" alt="">
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                <div>
                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                            {!! Form::file('image', null, ['class'=>'form-control', 'id' => 'image', 'files'=>true, 'value'=> Input::old('image')]) !!}
                        </span>
                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                        <i class="fa fa-times"></i> Remove
                    </a>
                </div>
            </div>

        </div>
    </div>

    <br style="clear:both" />

</div>
<div id="panel_tab_seo" class="tab-pane">
    <!-- Meta Title Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('meta_title', 'Meta Title:') !!}
        {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
        <small id="count_title"></small>
    </div>
    <!-- Meta Keywords Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
        {!! Form::text('meta_keywords', null, ['class' => 'form-control tags']) !!}
        <small>Use up to 5 keywords max</small>
    </div>
    <!-- Meta Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('meta_description', 'Meta Description:') !!}
        {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'row' => '3']) !!}
        <small id="count_message"></small>
    </div>

    <br style="clear:both" />

</div>
<div id="panel_tab_social" class="tab-pane">
    <!-- Fb Title Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('fb_title', 'FaceBook Title:') !!}
        {!! Form::text('fb_title', null, ['class' => 'form-control titleclass']) !!}
        <small id="fb_title_message"></small>
    </div>
    <!-- Gp Title Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('gp_title', 'Google Plus Title:') !!}
        {!! Form::text('gp_title', null, ['class' => 'form-control titleclass']) !!}
        <small id="gp_title_message"></small>
    </div>

     <!-- Gp Title Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('tw_title', 'Twitter Title:') !!}
        {!! Form::text('tw_title', null, ['class' => 'form-control titleclass']) !!}
        <small id="tw_title_message"></small>
    </div>
   <br style="clear:both" />

</div>
