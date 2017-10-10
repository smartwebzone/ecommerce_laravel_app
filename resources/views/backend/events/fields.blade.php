<!-- Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('title')? 'has-error' : '' }}">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title')]) !!}
    {!! $errors->has('title')? '<p class="help-block"> '.$errors->first('title').' </p>':'' !!}
    <small></small>
</div>

<!-- Title Field -->
<div class="form-group {{ $errors->has('title')? 'has-error' : '' }}">
    {!! Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('title', null, ['class' => 'form-control', 'value' => old('title')]) !!}
    <small></small>
    </div>
    {!! $errors->has('title')? '<p class="help-block"> '.$errors->first('title').' </p>':'' !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6 {{ $errors->has('slug')? 'has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'value' => old('slug')]) !!}
    {!! $errors->has('slug')? '<p class="help-block"> '.$errors->first('slug').' </p>':'' !!}
    <small></small>
</div>

<!-- Slug Field -->
<div class="form-group {{ $errors->has('slug')? 'has-error' : '' }}">
    {!! Form::label('slug', 'Slug:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('slug', null, ['class' => 'form-control', 'value' => old('slug')]) !!}
    <small></small>
    </div>
    {!! $errors->has('slug')? '<p class="help-block"> '.$errors->first('slug').' </p>':'' !!}
</div>

<!-- Ticket Vendor Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('ticket_vendor_id')? 'has-error' : '' }}">
    {!! Form::label('ticket_vendor_id', 'Ticket Vendor Id:', ['class' => 'control-label']) !!}
    {!! Form::text('ticket_vendor_id', null, ['class' => 'form-control', 'value' => old('ticket_vendor_id')]) !!}
    {!! $errors->has('ticket_vendor_id')? '<p class="help-block"> '.$errors->first('ticket_vendor_id').' </p>':'' !!}
    <small></small>
</div>

<!-- Ticket Vendor Id Field -->
<div class="form-group {{ $errors->has('ticket_vendor_id')? 'has-error' : '' }}">
    {!! Form::label('ticket_vendor_id', 'Ticket Vendor Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('ticket_vendor_id', null, ['class' => 'form-control', 'value' => old('ticket_vendor_id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('ticket_vendor_id')? '<p class="help-block"> '.$errors->first('ticket_vendor_id').' </p>':'' !!}
</div>

<!-- Venue Field -->
<div class="form-group col-sm-6 {{ $errors->has('venue')? 'has-error' : '' }}">
    {!! Form::label('venue', 'Venue:', ['class' => 'control-label']) !!}
    {!! Form::text('venue', null, ['class' => 'form-control', 'value' => old('venue')]) !!}
    {!! $errors->has('venue')? '<p class="help-block"> '.$errors->first('venue').' </p>':'' !!}
    <small></small>
</div>

<!-- Venue Field -->
<div class="form-group {{ $errors->has('venue')? 'has-error' : '' }}">
    {!! Form::label('venue', 'Venue:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('venue', null, ['class' => 'form-control', 'value' => old('venue')]) !!}
    <small></small>
    </div>
    {!! $errors->has('venue')? '<p class="help-block"> '.$errors->first('venue').' </p>':'' !!}
</div>

<!-- Starts Field -->
<div class="form-group col-sm-6 {{ $errors->has('starts')? 'has-error' : '' }}">
    {!! Form::label('starts', 'Starts:', ['class' => 'control-label']) !!}
    {!! Form::date('starts', null, ['class' => 'form-control']) !!}
    {!! $errors->has('starts')? '<p class="help-block"> '.$errors->first('starts').' </p>':'' !!}
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-6 {{ $errors->has('start_time')? 'has-error' : '' }}">
    {!! Form::label('start_time', 'Start Time:', ['class' => 'control-label']) !!}
    {!! Form::date('start_time', null, ['class' => 'form-control']) !!}
    {!! $errors->has('start_time')? '<p class="help-block"> '.$errors->first('start_time').' </p>':'' !!}
</div>

<!-- Ends Field -->
<div class="form-group col-sm-6 {{ $errors->has('ends')? 'has-error' : '' }}">
    {!! Form::label('ends', 'Ends:', ['class' => 'control-label']) !!}
    {!! Form::date('ends', null, ['class' => 'form-control']) !!}
    {!! $errors->has('ends')? '<p class="help-block"> '.$errors->first('ends').' </p>':'' !!}
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6 {{ $errors->has('end_time')? 'has-error' : '' }}">
    {!! Form::label('end_time', 'End Time:', ['class' => 'control-label']) !!}
    {!! Form::date('end_time', null, ['class' => 'form-control']) !!}
    {!! $errors->has('end_time')? '<p class="help-block"> '.$errors->first('end_time').' </p>':'' !!}
</div>

<!-- Text Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('text_date')? 'has-error' : '' }}">
    {!! Form::label('text_date', 'Text Date:', ['class' => 'control-label']) !!}
    {!! Form::text('text_date', null, ['class' => 'form-control', 'value' => old('text_date')]) !!}
    {!! $errors->has('text_date')? '<p class="help-block"> '.$errors->first('text_date').' </p>':'' !!}
    <small></small>
</div>

<!-- Text Date Field -->
<div class="form-group {{ $errors->has('text_date')? 'has-error' : '' }}">
    {!! Form::label('text_date', 'Text Date:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('text_date', null, ['class' => 'form-control', 'value' => old('text_date')]) !!}
    <small></small>
    </div>
    {!! $errors->has('text_date')? '<p class="help-block"> '.$errors->first('text_date').' </p>':'' !!}
</div>

<!-- Event Image Field -->
<div class="form-group col-sm-6 {{ $errors->has('event_image')? 'has-error' : '' }}">
    {!! Form::label('event_image', 'Event Image:', ['class' => 'control-label']) !!}
    {!! Form::text('event_image', null, ['class' => 'form-control', 'value' => old('event_image')]) !!}
    {!! $errors->has('event_image')? '<p class="help-block"> '.$errors->first('event_image').' </p>':'' !!}
    <small></small>
</div>

<!-- Event Image Field -->
<div class="form-group {{ $errors->has('event_image')? 'has-error' : '' }}">
    {!! Form::label('event_image', 'Event Image:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('event_image', null, ['class' => 'form-control', 'value' => old('event_image')]) !!}
    <small></small>
    </div>
    {!! $errors->has('event_image')? '<p class="help-block"> '.$errors->first('event_image').' </p>':'' !!}
</div>

<!-- Event Image Alt Field -->
<div class="form-group col-sm-6 {{ $errors->has('event_image_alt')? 'has-error' : '' }}">
    {!! Form::label('event_image_alt', 'Event Image Alt:', ['class' => 'control-label']) !!}
    {!! Form::text('event_image_alt', null, ['class' => 'form-control', 'value' => old('event_image_alt')]) !!}
    {!! $errors->has('event_image_alt')? '<p class="help-block"> '.$errors->first('event_image_alt').' </p>':'' !!}
    <small></small>
</div>

<!-- Event Image Alt Field -->
<div class="form-group {{ $errors->has('event_image_alt')? 'has-error' : '' }}">
    {!! Form::label('event_image_alt', 'Event Image Alt:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('event_image_alt', null, ['class' => 'form-control', 'value' => old('event_image_alt')]) !!}
    <small></small>
    </div>
    {!! $errors->has('event_image_alt')? '<p class="help-block"> '.$errors->first('event_image_alt').' </p>':'' !!}
</div>

<!-- Video Url Field -->
<div class="form-group col-sm-6 {{ $errors->has('video_url')? 'has-error' : '' }}">
    {!! Form::label('video_url', 'Video Url:', ['class' => 'control-label']) !!}
    {!! Form::text('video_url', null, ['class' => 'form-control', 'value' => old('video_url')]) !!}
    {!! $errors->has('video_url')? '<p class="help-block"> '.$errors->first('video_url').' </p>':'' !!}
    <small></small>
</div>

<!-- Video Url Field -->
<div class="form-group {{ $errors->has('video_url')? 'has-error' : '' }}">
    {!! Form::label('video_url', 'Video Url:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('video_url', null, ['class' => 'form-control', 'value' => old('video_url')]) !!}
    <small></small>
    </div>
    {!! $errors->has('video_url')? '<p class="help-block"> '.$errors->first('video_url').' </p>':'' !!}
</div>

<!-- Video Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('video_id')? 'has-error' : '' }}">
    {!! Form::label('video_id', 'Video Id:', ['class' => 'control-label']) !!}
    {!! Form::text('video_id', null, ['class' => 'form-control', 'value' => old('video_id')]) !!}
    {!! $errors->has('video_id')? '<p class="help-block"> '.$errors->first('video_id').' </p>':'' !!}
    <small></small>
</div>

<!-- Video Id Field -->
<div class="form-group {{ $errors->has('video_id')? 'has-error' : '' }}">
    {!! Form::label('video_id', 'Video Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('video_id', null, ['class' => 'form-control', 'value' => old('video_id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('video_id')? '<p class="help-block"> '.$errors->first('video_id').' </p>':'' !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Summary:', ['class' => 'control-label']) !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control', 'value' => old('summary')]) !!}
    {!! $errors->has('summary')? '<p class="help-block"> '.$errors->first('summary').' </p>':'' !!}
</div>


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'value' => old('content')]) !!}
    {!! $errors->has('content')? '<p class="help-block"> '.$errors->first('content').' </p>':'' !!}
</div>


<!-- Link Text Field -->
<div class="form-group col-sm-6 {{ $errors->has('link_text')? 'has-error' : '' }}">
    {!! Form::label('link_text', 'Link Text:', ['class' => 'control-label']) !!}
    {!! Form::text('link_text', null, ['class' => 'form-control', 'value' => old('link_text')]) !!}
    {!! $errors->has('link_text')? '<p class="help-block"> '.$errors->first('link_text').' </p>':'' !!}
    <small></small>
</div>

<!-- Link Text Field -->
<div class="form-group {{ $errors->has('link_text')? 'has-error' : '' }}">
    {!! Form::label('link_text', 'Link Text:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('link_text', null, ['class' => 'form-control', 'value' => old('link_text')]) !!}
    <small></small>
    </div>
    {!! $errors->has('link_text')? '<p class="help-block"> '.$errors->first('link_text').' </p>':'' !!}
</div>

<!-- Link Url Field -->
<div class="form-group col-sm-6 {{ $errors->has('link_url')? 'has-error' : '' }}">
    {!! Form::label('link_url', 'Link Url:', ['class' => 'control-label']) !!}
    {!! Form::text('link_url', null, ['class' => 'form-control', 'value' => old('link_url')]) !!}
    {!! $errors->has('link_url')? '<p class="help-block"> '.$errors->first('link_url').' </p>':'' !!}
    <small></small>
</div>

<!-- Link Url Field -->
<div class="form-group {{ $errors->has('link_url')? 'has-error' : '' }}">
    {!! Form::label('link_url', 'Link Url:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('link_url', null, ['class' => 'form-control', 'value' => old('link_url')]) !!}
    <small></small>
    </div>
    {!! $errors->has('link_url')? '<p class="help-block"> '.$errors->first('link_url').' </p>':'' !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6 {{ $errors->has('latitude')? 'has-error' : '' }}">
    {!! Form::label('latitude', 'Latitude:', ['class' => 'control-label']) !!}
    {!! Form::number('latitude', null, ['class' => 'form-control', 'value' => old('latitude')]) !!}
    {!! $errors->has('latitude')? '<p class="help-block"> '.$errors->first('latitude').' </p>':'' !!}
</div>


<!-- Longitude Field -->
<div class="form-group col-sm-6 {{ $errors->has('longitude')? 'has-error' : '' }}">
    {!! Form::label('longitude', 'Longitude:', ['class' => 'control-label']) !!}
    {!! Form::number('longitude', null, ['class' => 'form-control', 'value' => old('longitude')]) !!}
    {!! $errors->has('longitude')? '<p class="help-block"> '.$errors->first('longitude').' </p>':'' !!}
</div>


<!-- Marker Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('marker_title')? 'has-error' : '' }}">
    {!! Form::label('marker_title', 'Marker Title:', ['class' => 'control-label']) !!}
    {!! Form::text('marker_title', null, ['class' => 'form-control', 'value' => old('marker_title')]) !!}
    {!! $errors->has('marker_title')? '<p class="help-block"> '.$errors->first('marker_title').' </p>':'' !!}
    <small></small>
</div>

<!-- Marker Title Field -->
<div class="form-group {{ $errors->has('marker_title')? 'has-error' : '' }}">
    {!! Form::label('marker_title', 'Marker Title:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('marker_title', null, ['class' => 'form-control', 'value' => old('marker_title')]) !!}
    <small></small>
    </div>
    {!! $errors->has('marker_title')? '<p class="help-block"> '.$errors->first('marker_title').' </p>':'' !!}
</div>

<!-- Meta Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_description', 'Meta Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'value' => old('meta_description')]) !!}
    {!! $errors->has('meta_description')? '<p class="help-block"> '.$errors->first('meta_description').' </p>':'' !!}
</div>


<!-- Meta Keywords Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_keywords', 'Meta Keywords:', ['class' => 'control-label']) !!}
    {!! Form::textarea('meta_keywords', null, ['class' => 'form-control', 'value' => old('meta_keywords')]) !!}
    {!! $errors->has('meta_keywords')? '<p class="help-block"> '.$errors->first('meta_keywords').' </p>':'' !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6 {{ $errors->has('status')? 'has-error' : '' }}">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'value' => old('status')]) !!}
    {!! $errors->has('status')? '<p class="help-block"> '.$errors->first('status').' </p>':'' !!}
    <small></small>
</div>

<!-- Status Field -->
<div class="form-group {{ $errors->has('status')? 'has-error' : '' }}">
    {!! Form::label('status', 'Status:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('status', null, ['class' => 'form-control', 'value' => old('status')]) !!}
    <small></small>
    </div>
    {!! $errors->has('status')? '<p class="help-block"> '.$errors->first('status').' </p>':'' !!}
</div>

<!-- Published Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('published_date')? 'has-error' : '' }}">
    {!! Form::label('published_date', 'Published Date:', ['class' => 'control-label']) !!}
    {!! Form::date('published_date', null, ['class' => 'form-control']) !!}
    {!! $errors->has('published_date')? '<p class="help-block"> '.$errors->first('published_date').' </p>':'' !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.events.index') !!}" class="btn btn-default">Cancel</a>
</div>
