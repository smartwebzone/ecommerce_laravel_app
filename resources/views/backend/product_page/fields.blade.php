<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>-->
<script type="text/javascript" src="{!! asset('/frontend/js/angular.min.js') !!}"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/style.css') !!}" />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/swiper.css') !!}"  />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/dark.css') !!}"  />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/font-icons.css') !!}"  />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/animate.css') !!}"  />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/magnific-popup.css') !!}"  />
<link rel="stylesheet" type="text/css" href="{!! asset('/frontend/css/responsive.css') !!}"  />
                <style>
                    .cover{
                        background-size: cover;padding:0px;
                    }
                    .repeat{
                        background-repeat: repeat;padding:0px;
                    }
                    .padding150_20{
                        padding:150px 20px !important;
                    }
                    .padding30{
                        padding:30px;
                    }
                    .width37_6{
                        width: 37.6%;
                    }
                    .full-screen{
                        height:650px;
                    }
                    .main-content .container{
                        border-bottom: none;
                    }
                    .vertical-middle{
                        position: absolute; 
                        top: 50%; width: 100%;
                        padding-top: 0px; padding-bottom: 0px; margin-top: -25%;
                    }
                    .overlay{
                        background: none;
                        border:none;
                    }
                    .container .cont1{
                            width: 890px!important;
                            border: none;
                    }.slider-parallax .slider-parallax-inner {
                        position: relative;
                    }
                    #content,#content_fields{
                        height:1000px;
                        overflow: scroll;
                    }
					#content_fields.plo, #content_fields .plo{ padding-left:0}
		#content_fields label{ margin-bottom:0; vertical-align:middle; font-size:11px; margin:5px 0; text-transform:capitalize;}
                </style>
                <script>
                   function previewBack($id,input,type){
                       
     if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $($id).css(type, 'url('+e.target.result+')');
        }

        reader.readAsDataURL(input.files[0]);
    }else{
        $($id).css(type, 'url("")').trigger('input');
    }
    }
                   function preview($id,input,type){
                       
     if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+$id).attr(type, e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
        $('#'+$id).attr(type, '');
    }

                   }
                   var app = angular.module('myApp', []) 

  .config(function($interpolateProvider) {
    // To prevent the conflict of `{{` and `}}` symbols
    // between Blade template engine and AngularJS templating we need
    // to use different symbols for AngularJS.

    $interpolateProvider.startSymbol('<%=');
    $interpolateProvider.endSymbol('%>');
  })
 .directive('tag', function ($interpolate) {
    return {
      restrict: 'E',
      scope: {
          tagName: '=',
        myContent: '='
      },
      link: function(scope, $element, attrs){

 scope.$watchGroup(['tagName','myContent'], function(newVal) {
                 $element.contents().remove();
                 var tag = $interpolate('<<%=tagName%>><%=myContent%></<%=tagName%>>')
                       ({tagName: scope.tagName, myContent: scope.myContent});
                 var e = angular.element(tag);
                 $element.append(e);
            });
      }
    };
  })
  .directive('compile', ['$compile', function ($compile) {
    return function(scope, element, attrs) {
        scope.$watch(
            function(scope) {
                // watch the 'compile' expression for changes
                return scope.$eval(attrs.compile);
            },
            function(value) {
                // when the 'compile' expression changes
                // assign it into the current DOM
                
                element.html(value);

                // compile the new DOM and link it to the current
                // scope.
                // NOTE: we only compile .childNodes so that
                // we don't get into infinite loop compiling ourselves
                $compile(element.contents())(scope);
            }
        );
    };
}]);

                    </script>
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

    <!-- Subtitle Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('submenu_items', 'Submenu:') !!}
        {!! Form::select('submenu_items', getSubMenuDropdown(), null, ['class' => 'form-control', 'value'=> Input::old('submenu_items')] ) !!}
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
        {!! Form::label('meta_key', 'Meta Keywords:') !!}
        {!! Form::text('meta_key', null, ['class' => 'form-control tags']) !!}
        <small>Use up to 5 keywords max</small>
    </div>
    <!-- Meta Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('meta_desc', 'Meta Description:') !!}
        {!! Form::textarea('meta_desc', null, ['class' => 'form-control', 'row' => '3']) !!}
        <small id="count_message"></small>
    </div>
    <!-- Meta Auther Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('meta_author', 'Meta Author:') !!}
        {!! Form::text('meta_author', null, ['class' => 'form-control']) !!}
        <small id="count_title"></small>
    </div>
    <br style="clear:both" />

</div>
<div id="panel_tab_social" class="tab-pane">


    <!-- tw card Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('twitter_card', 'Twitter Card:') !!}
        {!! Form::text('twitter_card', null, ['class' => 'form-control titleclass']) !!}
        <small id="tw_card_message"></small>
    </div>
    <!-- tw Title Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('twitter_title', 'Twitter Title:') !!}
        {!! Form::text('twitter_title', null, ['class' => 'form-control titleclass']) !!}
        <small id="tw_title_message"></small>
    </div>
    <!-- tw desc Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('twitter_desc', 'Twitter Description:') !!}
        {!! Form::text('twitter_desc', null, ['class' => 'form-control titleclass']) !!}
        <small id="tw_desc_message"></small>
    </div>
    <!-- tw desc Field -->
    <div class="form-group col-sm-10">
        {!! Form::label('twitter_image', 'Twitter Image:') !!}
        {!! Form::text('twitter_image', null, ['class' => 'form-control titleclass']) !!}
        <small id="tw_image"></small>
    </div>
    <br style="clear:both" />

</div>
<div id="panel_tab_slider" class="tab-pane" >
    @if($page->productSliders->count())

    <section id="slider" class="slider-parallax swiper_wrapper clearfix" data-autoplay="7000" data-speed="650" data-loop="true" style="width: 1205px;margin: auto;">

        <div class="slider-parallax-inner">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    @foreach($page->productSliders as $slider)

<!--                    <div class="slider_image_preview_{{$slider->id}} swiper-slide <%=myApp.slider_theme_{{$slider->_id}}%>" style="background-image: url('{{asset('')}}<%=myApp.slider_background_image_{{$slider->id}}%>');">
                       
                        <div ng-if="myApp.slider_video_overlay_color_{{$slider->id}}" class="video-overlay" style="background-color: <%=myApp.slider_video_overlay_color_{{$slider->_id}}%>"></div>
                       
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-<%=myApp.slider_caption_position_{{$slider->id}}%>" style="padding:20px;background-color: {{$slider['background_color']}}">
                                <h2 data-caption-animate="fadeInUp"><%=myApp.slider_caption1_{{$slider->_id}}%></h2>
                                <h3 style="font-style:italic" data-caption-animate="<%=myApp.slider_caption2_animate_{{$slider->_id}}%>" data-caption-delay="<%=myApp.slider_caption2_delay_{{$slider->_id}}%>"><%=myApp.slider_caption2_{{$slider->_id}}%></h3>
                            </div>
                        </div>
                    </div>                           -->
                    
                    <div class="slider_image_preview_{{$slider->id}} swiper-slide {{$slider['theme']}}" style="background-image: url('{{asset('')}}<%=myApp.slider_background_image_{{$slider->id}}%>');">
                        @if($slider['video_overlay'])
                        <div class="video-overlay" style="background-color: {{$slider['video_overlay_color']}}"></div>
                        @endif
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-{{$slider['caption_position']}}" style="padding:20px;background-color: {{$slider['background_color']}}">
                                <h2 data-caption-animate="fadeInUp">{{$slider['caption1']}}</h2>
                                <h3 style="font-style:italic" data-caption-animate="{{$slider['caption2_animate']}}" data-caption-delay="{{$slider['caption2_delay']}}">{{$slider['caption2']}}</h3>
                            </div>
                        </div>
                    </div>  

                    @endforeach
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section>
    
   
    
    <div class="form-group col-md-12" id="slider_fields">
        @foreach($page->productSliders as $slid=>$slider)
        <div class="col-md-12" style="border: 1px solid grey;padding: 5px;">
            <a href="{!! route('admin.product_page.removeslider',[$slider->id,$page->id]) !!}" class="btn btn-danger pull-right">X</a>
         <div class="col-sm-4 ">
            <label>
                Image Upload
            </label>
            <div class="fileupload fileupload-new  control-group {!! $errors->has('background_image') ? 'has-error' : '' !!}" data-provides="fileupload">
                <div class="fileupload-new thumbnail" >

                    <img data-src="{{ isset($slider->background_image) ? asset($slider['background_image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" src="{{ ($slider->background_image) ? asset($slider['background_image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" alt="">
                </div>
                <div ng-model="preview_{{$slider->id}}" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Background image</span>
                        <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                        {!! Form::file("sliders[$slider->id][background_image]",  ['class'=>'form-control', 'id' => 'slider_background_image', 'files'=>true, 'value'=> Input::old('background_image'),'onchange'=>"previewBack('.slider_image_preview_$slider->id',this,'background-image')"]) !!}
                        {!! Form::hidden('slider_background_image', $slider->background_image, ['class'=>'form-control', 'id' => 'slider_background_image',  'value'=> Input::old('background_image'),'ng-model'=>'myApp.slider_background_image_'.$slider->id,'ng-init'=>"myApp.slider_background_image_$slider->id='$slider->background_image'"]) !!}
                    </span>
                    <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                        <i class="fa fa-times"></i> Remove
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {!! Form::label('caption_position', 'Position:') !!}
            {!! Form::select("sliders[$slider->id][caption_position]", ['left'=>'left','right'=>'right','center'=>'center'], $slider->caption_position, ['class' => 'form-control slpos','ng-model'=>"myApp.slider_caption_position_$slider->id",'ng-init'=>"myApp.slider_caption_position_$slider->id='$slider->caption_position'" ]) !!}
            
        </div>
        <div class="col-md-3">
            {!! Form::label('theme', 'Theme:') !!}
            {!! Form::select("sliders[$slider->id][theme]", [''=>'default','dark'=>'dark'], $slider->theme, ['class' => 'form-control sltheme','ng-model'=>"myApp.slider_theme_$slider->id",'ng-init'=>"myApp.slider_theme_$slider->id='$slider->theme'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('background_color', 'Background Color:') !!}
            {!! Form::text("sliders[$slider->id][background_color]", $slider->background_color, ['class' => 'form-control slbagcolor','ng-model'=>"myApp.slider_background_color_$slider->id",'ng-init'=>"myApp.slider_background_color_$slider->id='$slider->background_color'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('caption1', 'Caption1:') !!}
            {!! Form::text("sliders[$slider->id][caption1]", $slider->caption1, ['class' => 'form-control slcaption1','ng-model'=>"myApp.slider_caption1_$slider->id",'ng-init'=>"myApp.slider_caption1_$slider->id='$slider->caption1'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('caption2', 'Caption2:') !!}
            {!! Form::text("sliders[$slider->id][caption2]", $slider->caption2, ['class' => 'form-control slcaption2','ng-model'=>"myApp.slider_caption2_$slider->id",'ng-init'=>"myApp.slider_caption2_$slider->id='$slider->caption2'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('caption2_delay', 'Caption2 delay:') !!}
            {!! Form::text("sliders[$slider->id][caption2_delay]", $slider->caption2_delay, ['class' => 'form-control slcaption2anim','ng-model'=>"myApp.slider_caption2_delay_$slider->id",'ng-init'=>"myApp.slider_caption2_delay_$slider->id='$slider->caption2_delay'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('caption2_animate', 'Caption2 Animate:') !!}
            {!! Form::select("sliders[$slider->id][caption2_animate]", ['fadeIn'=>'fadeIn','fadeInUp'=>'fadeInUp','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeIn'=>'fadeIn'], $slider->caption2_animate, ['class' => 'form-control slcaption2anim','ng-model'=>"myApp.slider_caption2_animate_$slider->id",'ng-init'=>"myApp.slider_caption2_animate_$slider->id='$slider->caption2_animate'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('video_overlay', 'Video Overlay:') !!}
            {!! Form::text("sliders[$slider->id][video_overlay]", $slider->video_overlay, ['class' => 'form-control sloverlay','ng-model'=>"myApp.slider_video_overlay_$slider->id",'ng-init'=>"myApp.slider_video_overlay_$slider->id='$slider->video_overlay'" ]) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('video_overlay_color', 'Video Overlay Color:') !!}
            {!! Form::text("sliders[$slider->id][video_overlay_color]", $slider->video_overlay_color, ['class' => 'form-control sloverlaycolor','ng-model'=>"myApp.slider_video_overlay_color_$slider->id",'ng-init'=>"myApp.slider_video_overlay_color_$slider->id='$slider->video_overlay_color'" ]) !!}
        </div>
        </div>
        @endforeach
    </div>
 @endif
  <a href="{!! route('admin.product_page.addslider',[$page->id]) !!}" class="btn btn-primary pull-right">Add SLIDER</a>
</div>                    
<div id="panel_tab_parallax" class="tab-pane" >
    <!-- Title Field -->
    	<div class="form-group col-md-4 plo" id="content_fields">
        @foreach($page->productParallax as $pp)
        
        <div class="row parentclass">
            <div class="col-sm-12" style="display:flex; border:1px solid lightgrey">
                
                <div style="display:block;font-size:11px">
        Theme 1 {!! Form::radio("theme", '1', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
        Theme 2 {!! Form::radio("theme", '2', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
        Theme 3 {!! Form::radio("theme", '3', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
        Theme 4 {!! Form::radio("theme", '4', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
        Blank {!! Form::radio("theme", '5', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
                </div>
        </div>
        	<div class="col-md-12" style="border-bottom: 1px solid #CCC; padding:4px 4px 10px; margin-top: 25px">
            <div class="clearfix"><a href="{!! route('admin.product_page.removeparallax',[$pp->id,$page->id]) !!}" style="position:absolute; right:5px; top:-25px;" class="btn btn-success btn-xs pull-right">X</a></div>
            
            <div class="col-sm-6">
                <label>
                    Background image
                </label>
                <div class="fileupload fileupload-new  control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileupload">
                    <a href="javascript:void(0)" onclick="$('#deleteback{{$pp->id}}').val(1);$(this).parent().find('img').remove();previewBack('#back_preview_{!!$pp->id!!}',this,'background-image');" style="position:absolute;" class="btn btn-danger btn-xs pull-right deletebackbtn">X</a>
                    <div class="fileupload-new thumbnail" >
                        
                        <img data-src="{{ isset($pp->background_image) ? asset($pp['background_image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" src="{{ ($pp->background_image) ? asset($pp['background_image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" alt="">
                         <h5>OR</h5>
                           {!! Form::label('background_color', 'Background Color:') !!}
                           {!! Form::text("parallax[$pp->id][background_color]", $pp->background_color, ['data-div'=>'back_preview_'.$pp->id,'class' => 'form-control titleclass pp_background_color' ]) !!}
                    </div>
                    <input type="hidden" name="parallax[{{$pp->id}}][deleteback]" value="0" id="deleteback{{$pp->id}}">
                    <div ng-model="preview_{{$pp->id}}" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Background image</span>
                            <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                            {!! Form::file("parallax[$pp->id][background_image]",  ['class'=>'form-control', 'id' => 'background_image', 'files'=>true, 'value'=> Input::old('background_image'),'ng-model'=>'myApp.background_image_'.$pp->id,'ng-init'=>"myApp.background_image_$pp->id='$pp->background_image'",'onchange'=>"previewBack('#back_preview_$pp->id',this,'background-image')"]) !!}
                        </span>
                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </div>
                </div>
               
            </div>
            
            <div class="form-group col-sm-6">
                   {!! Form::label('big_container', 'Big Container:',['style'=>'width:70%']) !!}
                <label class="">
                 {!! Form::checkbox("parallax[$pp->id][full_screen]", 1, $pp->full_screen,['class'=>'pp_full_screen', 'value'=>Input::old('full_screen'),'ng-model'=>'myApp.full_screen_'.$pp->id,'ng-init'=>"myApp.full_screen_$pp->id=($pp->full_screen)?true:false"]) !!}
                </label>
            </div>
            
           
            <div class="col-sm-6">
                {!! Form::label('box_color', 'Box Color:') !!}
                {!! Form::text("parallax[$pp->id][box_color]", $pp->box_color, ['data-div'=>'box_'.$pp->id,'class' => 'form-control titleclass pp_box_color','ng-model'=>'myApp.box_color_'.$pp->id, 'ng-init'=>"myApp.box_color_$pp->id='$pp->box_color'"]) !!}
                
            </div>
            <div class="clerfix clear"></div>
            <div style="padding-left:10px"><b>Heading Tag:</b></div>
            <div class="col-sm-12" style="border:1px solid lightgrey;padding-bottom:4px;font-size:11px">
                
                H1 {!! Form::radio("parallax[$pp->id][box_h]", 'h1', $pp->box_h=='h1',[ 'class'=>'pp_h1','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}&nbsp;&nbsp;
                H2 {!! Form::radio("parallax[$pp->id][box_h]", 'h2', $pp->box_h=='h2',[ 'class'=>'pp_h2','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}&nbsp;&nbsp;
                H3 {!! Form::radio("parallax[$pp->id][box_h]", 'h3', $pp->box_h=='h3',[ 'class'=>'pp_h3','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}&nbsp;&nbsp;
                H4 {!! Form::radio("parallax[$pp->id][box_h]", 'h4', $pp->box_h=='h4',[ 'class'=>'pp_h4','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}&nbsp;&nbsp;
                H5 {!! Form::radio("parallax[$pp->id][box_h]", 'h5', $pp->box_h=='h5',[ 'class'=>'pp_h5','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}&nbsp;&nbsp;
                H6 {!! Form::radio("parallax[$pp->id][box_h]", 'h6', $pp->box_h=='h6',[ 'class'=>'pp_h6','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}
                None {!! Form::radio("parallax[$pp->id][box_h]", '', $pp->box_h=='',[ 'class'=>'pp_h0','value'=>Input::old('box_h'),'ng-model'=>'myApp.box_h_'.$pp->id]) !!}
           
            <h6> - - OR</h6>
                {!! Form::label('box_a', 'Box href:') !!}
                {!! Form::text("parallax[$pp->id][box_a]", $pp->box_a, ['class' => 'form-control titleclass pphref' ,'ng-model'=>'myApp.box_a_'.$pp->id, 'ng-init'=>"myApp.box_a_$pp->id='$pp->box_a'"]) !!}
                
            </div>
            <div class="col-sm-12">
                <?php $pp->headline=str_replace(["'","&#39;"], "’", $pp->headline);?>
                {!! Form::label('headline', 'Headline:') !!}
                {!! Form::text("parallax[$pp->id][headline]", $pp->headline, ['class' => 'form-control titleclass pp_headline','ng-model'=>'myApp.headline_'.$pp->id,'ng-init'=>"myApp.headline_$pp->id='$pp->headline'" ]) !!}
                          
            </div>
            <div class="col-sm-6">
                {!! Form::label('box_theme', 'Box Theme:') !!}
                {!! Form::text("parallax[$pp->id][box_theme]", $pp->box_theme, ['class' => 'form-control titleclass pp_box_theme','ng-model'=>'myApp.box_theme_'.$pp->id, 'ng-init'=>"myApp.box_theme_$pp->id='$pp->box_theme'"]) !!}
                HINT: <br>(center dark nobottommargin pull-right col-padding nobottompadding col-md-5 hide)
            </div>
             <div class="col-sm-6 ">
                <label>
                    Box Image
                </label>
                <div class="fileupload fileupload-new  control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileupload">
                    <a href="javascript:void(0)" onclick="$('#deletebox{{$pp->id}}').val(1);$(this).parent().find('img').remove();preview('image_preview_{!!$pp->id!!}',this,'src');" style="position:absolute;" class="btn btn-danger btn-xs pull-right">X</a>
                    <div class="fileupload-new thumbnail" >
                        <img data-src="{{ isset($pp->image) ? asset($pp['image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" src="{{ ($pp->image) ? asset($pp['image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Box image</span>
                            <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                            {!! Form::file("parallax[$pp->id][image]",  ['class'=>'form-control', 'id' => 'image'.$pp->id, 'files'=>true, 'value'=> Input::old('image'),'onchange'=>"preview('image_preview_$pp->id',this,'src')"]) !!}                            
                        </span>
                        <a href="javascript:void(0)" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </div>
                </div>
                 <input type="hidden" name="parallax[{{$pp->id}}][deletebox]" value="0" id="deletebox{{$pp->id}}">
                {!! Form::hidden('image1', $pp->image, ['id'=>'image_'.$pp->id, 'class'=>'form-control titleclass', 'value'=> Input::old('image'),'ng-model'=>'myApp.image_'.$pp->id, 'ng-init'=>"myApp.image_$pp->id='1'"]) !!}                
            </div>
           
             <div class="form-group col-sm-6 ">
                {!! Form::label('container', 'Space around box:',['style'=>'width:70%']) !!}
                <label class="">                    
                    {!! Form::checkbox("parallax[$pp->id][container]", 1, $pp->container,['class'=>'pp_container', 'value'=>Input::old('container'),'ng-model'=>'myApp.container_'.$pp->id,'ng-init'=>"myApp.container_$pp->id=($pp->container)?true:false"]) !!}
                </label>
            </div>
            <div class="form-group col-sm-6">                 
                 {!! Form::label('full_box', 'Full Box:',['style'=>'width:70%']) !!}
                <label class="">
                   {!! Form::checkbox("parallax[$pp->id][full_box]", 1, $pp->full_box,['class'=>'pp_full_box', 'value'=>Input::old('full_box'),'ng-model'=>'myApp.full_box_'.$pp->id,'ng-init'=>"myApp.full_box_$pp->id=($pp->full_box)?true:false"]) !!}
                </label>
            </div>
           
           
            
            <div class="col-sm-12">
                {!! Form::label('before_heading', 'After Headline:') !!}
                {!! Form::text("parallax[$pp->id][before_heading]", $pp->before_heading, ['class' => 'form-control titleclass pp_before_heading','ng-model'=>'myApp.before_heading_'.$pp->id,'ng-init'=>"myApp.before_heading_$pp->id='$pp->before_heading'" ]) !!}
                          
            </div>
            <div class="col-md-6">
                 <?php $pp->lead=str_replace(["'","&#39;"], "’", $pp->lead);?>
                {!! Form::label('lead', 'Lead:') !!}
                {!! Form::text("parallax[$pp->id][lead]", $pp->lead, ['class' => 'form-control titleclass pp_lead','ng-model'=>'myApp.lead_'.$pp->id,'ng-init'=>"myApp.lead_$pp->id='$pp->lead'" ]) !!}
            </div>
            <div class="col-md-6">
                <?php $pp->lead_head=str_replace(["'","&#39;"], "’", $pp->lead_head);?>
                {!! Form::label('lead_head', 'Lead Head:') !!}
                {!! Form::text("parallax[$pp->id][lead_head]", $pp->lead_head, ['class' => 'form-control titleclass pp_lead_head','ng-model'=>'myApp.lead_head_'.$pp->id,'ng-init'=>"myApp.lead_head_$pp->id='$pp->lead_head'" ]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('button_href', 'Button HREF:') !!}
                {!! Form::text("parallax[$pp->id][button_href]", $pp->button_href, ['class' => 'form-control titleclass pp_button_href','ng-model'=>'myApp.button_href_'.$pp->id,'ng-init'=>"myApp.button_href_$pp->id='$pp->button_href'" ]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('button_text', 'Button text:') !!}
                {!! Form::text("parallax[$pp->id][button_text]", $pp->button_text, ['class' => 'form-control titleclass pp_button_text','ng-model'=>'myApp.button_text_'.$pp->id,'ng-init'=>"myApp.button_text_$pp->id='$pp->button_text'" ]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('button_border', 'Button Brder:') !!}
                {!! Form::text("parallax[$pp->id][button_border]", $pp->button_border, ['class' => 'form-control titleclass pp_button_border','ng-model'=>'myApp.button_border_'.$pp->id,'ng-init'=>"myApp.button_border_$pp->id='$pp->button_border'" ]) !!}
            </div>
            <div class="col-md-6">
                                 <?php $pp->button_title=str_replace(["'","&#39;"], "’", $pp->button_title);?>
                {!! Form::label('button_title', 'Button title:') !!}
                {!! Form::text("parallax[$pp->id][button_title]", $pp->button_title, ['class' => 'form-control titleclass pp_button_title','ng-model'=>'myApp.button_title_'.$pp->id,'ng-init'=>"myApp.button_title_$pp->id='$pp->button_title'" ]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('merge_next', 'Merge Next:') !!}
                {!! Form::select("parallax[$pp->id][merge_next]", ['1'=>'Yes','0'=>'No'], $pp->merge_next, ['class' => 'form-control titleclass pp_merge_next','ng-model'=>'myApp.merge_next_'.$pp->id,'ng-init'=>"myApp.merge_next_$pp->id='$pp->merge_next'" ]) !!}
            </div>
             <div class="form-group col-sm-6">
                {!! Form::label('is_section', 'Is Sections:',['style'=>'width:70%']) !!}
                <label class="">
                    {!! Form::checkbox("parallax[$pp->id][is_sections]", 1, $pp->is_sections,[ 'value'=>Input::old('is_sections'),'ng-model'=>'myApp.is_sections_'.$pp->id,'ng-init'=>"myApp.is_sections_$pp->id=($pp->is_sections)?true:false"]) !!}
                </label>
            </div>
            <div class="clearfix"></div>
            <div ng-if="myApp.is_sections_{{$pp->id}}" class="pl0" style="padding:4px; margin-top: 25px">
                @foreach($pp->productPagesSections as $ps)
                
                <div style="border-top: 1px solid #ccc;padding: 4px" class="col-md-12 parentsection">
                 <a href="{!! route('admin.product_page.removesection',[$ps->id,$page->id]) !!}" class="btn btn-success btn-xs pull-right">X</a>
                 <div class="col-sm-12" style="display:flex">
                    Theme 1 {!! Form::radio("theme1", '11', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
                    Theme 2 {!! Form::radio("theme1", '12', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
                    Theme 3 {!! Form::radio("theme1", '13', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
                    Theme 4 {!! Form::radio("theme1", '14', NULL,[ 'value'=>Input::old('theme'),]) !!}&nbsp;&nbsp;
                </div>
                    <div class="col-md-12">
                        {!! Form::label('fbox', 'Circle with icon:') !!}
                        <!--{!! Form::text('fbox', $ps->fbox, ['class' => 'form-control titleclass','ng-model'=>"myApp.section_fbox_$ps->id",'ng-init'=>"myApp.section_fbox_$ps->id='$ps->fbox'" ]) !!}-->
                        {!! Form::text("sections[$ps->id][fbox]", $ps->fbox, ['class' => 'form-control titleclass sfbox','ng-model'=>'myApp.section_fbox_'.$ps->id,'ng-init'=>"myApp.section_fbox_$ps->id='$ps->fbox'" ]) !!}
                        
                    </div>
                     
                    <div class="col-sm-6 ">
                        <label>
                            Section Image
                        </label>
                        <div class="fileupload fileupload-new  control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileupload">
                            <a href="javascript:void(0)" onclick="$('#deletesect{{$ps->id}}').val(1);$(this).parent().find('img').remove();preview('section_image_preview_{!!$ps->id!!}',this,'src');" style="position:absolute;" class="btn btn-danger btn-xs pull-right">X</a>
                            <div class="fileupload-new thumbnail" >
                                
                                <img data-src="{{ isset($ps->image) ? asset($ps['image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" src="{{ ($ps->image) ? asset($ps['image']) : 'http://www.placehold.it/1140x600/EFEFEF/AAAAAA?text=no+image' }}" alt="">
                            </div>
                            <div ng-model="preview_{{$pp->id}}" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 1140px; max-height: 600px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Background image</span>
                                    <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                                    {!! Form::file("sections[$ps->id][image]",  ['class'=>'form-control', 'id' => 'section_image', 'files'=>true, 'value'=> Input::old('background_image'),'onchange'=>"preview('section_image_preview_$ps->id',this,'src')"]) !!}
                                    {!! Form::hidden('section_image', $ps->image, ['class'=>'form-control', 'id' => 'section_image',  'value'=> Input::old('background_image'),'ng-model'=>'myApp.section_image_'.$ps->id,'ng-init'=>"myApp.section_image_$ps->id='$ps->image'"]) !!}
                                </span>
                                <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                    <i class="fa fa-times"></i> Remove
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="sections[{{$ps->id}}][deletesect]" id="deletesect{{$ps->id}}" value="0">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        {!! Form::label('image_overlay', 'Image overlay text:') !!}
                        {!! Form::text("sections[$ps->id][image_overlay]", $ps->image_overlay, ['class' => 'form-control titleclass soverlay','ng-model'=>"myApp.section_image_overlay_$ps->id",'ng-init'=>"myApp.section_image_overlay_$ps->id='$ps->image_overlay'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('image_animate', 'Image animate:') !!}
                        {!! Form::text("sections[$ps->id][image_animate]", $ps->image_animate, ['class' => 'form-control titleclass sanimate','ng-model'=>"myApp.section_image_animate_$ps->id",'ng-init'=>"myApp.section_image_animate_$ps->id='$ps->image_animate'" ]) !!}
                    </div>
                    
                     <div class="col-sm-12" style="display:flex">
                {!! Form::label('box_h', 'Heading Tag:',['ng-init'=>"myApp.section_box_h_$ps->id='$ps->box_h'"]) !!}
                H1 {!! Form::radio("sections[$ps->id][box_h]", 'h1', $ps->box_h=='h1',[ 'class'=>'sboxh1','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}&nbsp;&nbsp;
                H2 {!! Form::radio("sections[$ps->id][box_h]", 'h2', $ps->box_h=='h2',[ 'class'=>'sboxh2','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}&nbsp;&nbsp;
                H3 {!! Form::radio("sections[$ps->id][box_h]", 'h3', $ps->box_h=='h3',[ 'class'=>'sboxh3','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}&nbsp;&nbsp;
                H4 {!! Form::radio("sections[$ps->id][box_h]", 'h4', $ps->box_h=='h4',[ 'class'=>'sboxh4','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}&nbsp;&nbsp;
                H5 {!! Form::radio("sections[$ps->id][box_h]", 'h5', $ps->box_h=='h5',[ 'class'=>'sboxh5','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}&nbsp;&nbsp;
                H6 {!! Form::radio("sections[$ps->id][box_h]", 'h6', $ps->box_h=='h6',[ 'class'=>'sboxh6','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}
                None {!! Form::radio("sections[$ps->id][box_h]", '', $ps->box_h=='',[ 'class'=>'sboxh0','value'=>Input::old('box_h'),'ng-model'=>'myApp.section_box_h_'.$ps->id]) !!}
            </div>
                    <div class="col-md-6">
                        <?php $ps->box_title=str_replace(["'","&#39;"], "’", $ps->box_title);?>
                        {!! Form::label('box_title', 'Box title:') !!}
                        {!! Form::text("sections[$ps->id][box_title]", $ps->box_title, ['class' => 'form-control titleclass sboxtitle','ng-model'=>"myApp.section_box_title_$ps->id",'ng-init'=>"myApp.section_box_title_$ps->id='$ps->box_title'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('box_style', 'Box style:') !!}
                        {!! Form::text("sections[$ps->id][box_style]", $ps->box_style, ['class' => 'form-control titleclass sboxstyle','ng-model'=>"myApp.section_box_style_$ps->id",'ng-init'=>"myApp.section_box_style_$ps->id='$ps->box_style'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        <?php $ps->box_subtitle=str_replace(["'","&#39;"], "’", $ps->box_subtitle);?>
                        {!! Form::label('box_subtitle', 'subtitle:') !!}
                        {!! Form::text("sections[$ps->id][box_subtitle]", $ps->box_subtitle, ['class' => 'form-control titleclass ssubtitle','ng-model'=>"myApp.section_box_subtitle_$ps->id",'ng-init'=>"myApp.section_box_subtitle_$ps->id='$ps->box_subtitle'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('box_subtitle_style', 'subtitle style:') !!}
                        {!! Form::text("sections[$ps->id][box_subtitle_style]", $ps->box_subtitle_style, ['class' => 'form-control titleclass ssubtitlestyle','ng-model'=>"myApp.section_box_subtitle_style_$ps->id",'ng-init'=>"myApp.section_box_subtitle_style_$ps->id='$ps->box_subtitle_style'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('box_link', 'Box link:') !!}
                        {!! Form::text("sections[$ps->id][box_link]", $ps->box_link, ['class' => 'form-control titleclass sboxlink','ng-model'=>"myApp.section_box_link_$ps->id",'ng-init'=>"myApp.section_box_link_$ps->id='$ps->box_link'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('box_link_scroll', 'Box link-scroll:') !!}
                        {!! Form::text("sections[$ps->id][box_link_scroll]", $ps->box_link_scroll, ['class' => 'form-control titleclass sboxscroll','ng-model'=>"myApp.section_box_link_scroll_$ps->id",'ng-init'=>"myApp.section_box_link_scroll_$ps->id='$ps->box_link_scroll'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('box_mid', 'Box Mid:') !!}
                        {!! Form::text("sections[$ps->id][box_mid]", $ps->box_mid, ['class' => 'form-control titleclass sboxmid','ng-model'=>"myApp.section_box_mid_$ps->id",'ng-init'=>"myApp.section_box_mid_$ps->id='$ps->box_mid'" ]) !!}
                    </div>
                    <div class="col-md-6">
                        <?php $ps->box_lead=str_replace(["'","&#39;"], "’", $ps->box_lead);?>
                        {!! Form::label('box_lead', 'Box Lead:') !!}
                        {!! Form::text("sections[$ps->id][box_lead]", $ps->box_lead, ['class' => 'form-control titleclass sboxlead','ng-model'=>"myApp.section_box_lead_$ps->id",'ng-init'=>"myApp.section_box_lead_$ps->id='$ps->box_lead'" ]) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('col', 'col:') !!}
                        
                        {!! Form::select("sections[$ps->id][col]", ['col_full'=>'full Column','col_half'=>'2 column','col_one_third'=>'1/3 column','col_two_third'=>'2/3 column','col_three_fourth'=>'3/4 column','col_one_fourth'=>'1/4 column','col_one_fifth col_last'=>'1/5 column','col_two_fifth'=>'1/5 column','col_three_fifth'=>'3/5 column','col_four_fifth'=>'4/5 column','col_one_sixth'=>'1/6 column','col_five_sixth'=>'5/6 column','col_half col_last'=>'2 column Last','col_one_third col_last'=>'1/3 column Last','col_two_third col_last'=>'2/3 column Last','col_three_fourth col_last'=>'3/4 column Last','col_one_fourth col_last'=>'1/4 column Last','col_one_fifth col_last col_last'=>'1/5 column Last','col_two_fifth col_last'=>'1/5 column Last','col_three_fifth col_last'=>'3/5 column Last','col_four_fifth col_last'=>'4/5 column Last','col_one_sixth col_last'=>'1/6 column Last','col_five_sixth col_last'=>'5/6 column'], $ps->col, ['class' => 'form-control titleclass scol','ng-model'=>"myApp.section_col_$ps->id",'ng-init'=>"myApp.section_col_$ps->id='$ps->col'" ]) !!}
                    </div>
                    <div class="col-md-12" style="border:1px solid lightgrey;padding-bottom:4px;margin:4px">
                        <h5>Button 1 : </h5>
                        <div class="col-md-6">
                            {!! Form::label('button_href', 'href:') !!}
                            {!! Form::text("sections[$ps->id][button_href]", $ps->button_href, ['class' => 'form-control titleclass sbuttonhref','ng-model'=>"myApp.section_button_href_$ps->id",'ng-init'=>"myApp.section_button_href_$ps->id='$ps->button_href'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button_title', 'title:') !!}
                            {!! Form::text("sections[$ps->id][button_title]", $ps->button_title, ['class' => 'form-control titleclass sbuttontitle','ng-model'=>"myApp.section_button_title_$ps->id",'ng-init'=>"myApp.section_button_title_$ps->id='$ps->button_title'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button_border', 'border:') !!}
                            {!! Form::text("sections[$ps->id][button_border]", $ps->button_border, ['class' => 'form-control titleclass sbuttonborder','ng-model'=>"myApp.section_button_border_$ps->id",'ng-init'=>"myApp.section_button_border_$ps->id='$ps->button_border'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button_text', 'text:') !!}
                            {!! Form::text("sections[$ps->id][button_text]", $ps->button_text, ['class' => 'form-control titleclass sbuttontext','ng-model'=>"myApp.section_button_text_$ps->id",'ng-init'=>"myApp.section_button_text_$ps->id='$ps->button_text'" ]) !!}
                        </div>
                    </div>
                    <div class="col-md-12" style="border:1px solid lightgrey;padding-bottom:4px;margin:4px">
                        <h5>Button 2 : </h5>
                        <div class="col-md-6">
                            {!! Form::label('button2_href', 'href:') !!}
                            {!! Form::text("sections[$ps->id][button2_href]", $ps->button2_href, ['class' => 'form-control titleclass sbutton2href','ng-model'=>"myApp.section_button2_href_$ps->id",'ng-init'=>"myApp.section_button2_href_$ps->id='$ps->button2_href'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button2_title', 'title:') !!}
                            {!! Form::text("sections[$ps->id][button2_title]", $ps->button2_title, ['class' => 'form-control titleclass sbutton2title','ng-model'=>"myApp.section_button2_title_$ps->id",'ng-init'=>"myApp.section_button2_title_$ps->id='$ps->button2_title'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button2_border', 'border:') !!}
                            {!! Form::text("sections[$ps->id][button2_border]", $ps->button2_border, ['class' => 'form-control titleclass sbutton2border','ng-model'=>"myApp.section_button2_border_$ps->id",'ng-init'=>"myApp.section_button2_border_$ps->id='$ps->button2_border'" ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('button2_text', 'text:') !!}
                            {!! Form::text("sections[$ps->id][button2_text]", $ps->button2_text, ['class' => 'form-control titleclass sbutton2text','ng-model'=>"myApp.section_button2_text_$ps->id",'ng-init'=>"myApp.section_button2_text_$ps->id='$ps->button2_text'" ]) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <div style="border-top:1px solid #ccc; padding-top:10px; float:left; width:100%;"><a href="{!! route('admin.product_page.addsection',[$pp->id,$page->id]) !!}" class="btn btn-primary pull-right" >Add Section</a></div>
                
            </div>
        </div>
        </div>
        <br style="clear:both" />
        @endforeach
        <a href="{!! route('admin.product_page.addparallax',[$page->id]) !!}" class="btn btn-primary pull-right" style="margin-bottom:15px;">Add PARALLAX</a>
    </div>
    
    
    <div class="form-group col-md-8" id="content" >
        <div class="content-wrap" style="zoom:0.8">
        @foreach($page->productParallax as $pp)     
        <div id="back_preview_{{$pp->id}}" ng-class="[(myApp.full_screen_{{$pp->id}}==1)?'full-screen':'',(myApp.full_screen_{{$pp->id}}==1 && myApp.is_sections_{{$pp->id}}==0) || myApp.full_box_{{$pp->id}}==1?'cover':'repeat']"  class="section parallax  nomargin clearfix"   style="background-image: url('{!! asset($pp['background_image']) !!}');background-color:{{$pp->background_color}}; border-bottom: <%=(myApp.merge_next_{{$pp->id}}==0)?'2px solid #337AB7':''%>; data-stellar-background-ratio="0.6">
            <div ng-class="(myApp.full_screen_{{$pp->id}}==1)?'vertical-middle':''" >
                <div ng-class="(myApp.container_{{$pp->id}}==1)?'container cont1':''" class=" clearfix">
                    
                    <div id="box_{{$pp->id}}" ng-class="[(myApp.full_screen_{{$pp->id}}==1 && myApp.is_sections_{{$pp->id}}==0)?'col-md-4':'heading-block topmargin-sm nobottomborder',myApp.full_box_{{$pp->id}}==1 && myApp.box_theme_{{$pp->id}}.indexOf('nopadding') == -1?'padding150_20':'',myApp.box_theme_{{$pp->id}}.indexOf('col-padding') !== -1  || myApp.box_theme_{{$pp->id}}.indexOf('nopadding') !== -1?'':'padding30',(myApp.full_screen_{{$pp->id}}==1 && myApp.is_sections_{{$pp->id}}==0)?'width37_6':'']" class="<%=myApp.box_theme_{{$pp->id}}%>" style="background-color:<%=(myApp.box_color_{{$pp->id}})%>; ">
                        <div class="nobottommargin">
                        
                            <img id="image_preview_{{$pp->id}}" ng-if="myApp.image_{{$pp->id}}" itemprop="image" src="{!! asset($pp['image']) !!}" alt="" >
                            
                             <tag ng-if="myApp.box_h_{{$pp->id}}"  tag-name="myApp.box_h_{{$pp->id}}" my-content='myApp.headline_{{$pp->id}}'></tag>
                            
                             <a compile="myApp.headline_{{$pp->id}}" ng-if="myApp.box_a_{{$pp->id}}" class="button button-full button-dark center bottommargin-sm" href="{!! url(getLang())!!}<%=myApp.box_a_{{$pp->id}}%>" >
                                 <%=myApp.headline_{{$pp->id}}%>
                             </a>
                            
                            
                            <p compile="myApp.before_heading_{{$pp->id}}" ng-if="myApp.before_heading_{{$pp->id}}" class="before-heading"><%=myApp.before_heading_{{$pp->id}}%></p>
                            
                        </div>
                       
                        <p compile="myApp.lead_head_{{$pp->id}}" ng-if="myApp.lead_head_{{$pp->id}}" class="lead"><%=myApp.lead_head_{{$pp->id}}%></p>
                        
                        <p compile="myApp.lead_{{$pp->id}}"><%=myApp.lead_{{$pp->id}}%></p>
                       
                        <p ng-if="myApp.button_title_{{$pp->id}} && myApp.button_href_{{$pp->id}}" class="nomargin"><%=myApp.button_title_{{$pp->id}}%></p>
                            
                        <p ngif="myApp.button_href_{{$pp->id}}" class="center">
                            
                            <a ng-class="[(myApp.button_border_{{$pp->id}})?'':'button-border']" ng-if="myApp.button_href_{{$pp->id}}" class="button button-rounded" style="background-color:<%=myApp.box_theme_{{$pp->id}}.indexOf('dark')>=0?'rgba(0,0,0,0.3); color: #fff':''%>;" href="{!! url(getLang()) !!}<%=myApp.button_href_{{$pp->id}}%>"><%=myApp.button_text_{{$pp->id}}%></a>
                        </p>
                    </div>
                    
                    
                    <div ng-if="myApp.is_sections_{{$pp->id}}" class="row">
                            @foreach($pp->productPagesSections as $ps)
                            <div {{(@$ps['image_animate'] && $ps['fbox'])?'data-animate='.@$ps['image_animate'].'':''}} class="<%=(myApp.section_box_lead_{{$ps->id}} || myApp.section_col_{{$ps->id}}.indexOf('left')>=0)?'left':'center'%> <%=myApp.section_col_{{$ps->id}}%> nobottommargin <%=myApp.section_image_overlay_{{$ps->id}}?'nopadding':''%>" style="<%=myApp.section_image_overlay_{{$ps->id}}?'display: inline-flex;':''%> <%=myApp.section_box_style_{{$ps->id}}%>">
                               
                                <div ng-if="myApp.section_fbox_{{$ps['id']}}" class="feature-box fbox-center fbox-outline nobottomborder">
                                    <div class="fbox-icon">
                                        <i class="icon-<%=myApp.section_fbox_{{$ps['id']}}%>"></i>
                                    </div>
                                </div>
                                <tag ng-if="myApp.section_box_h_{{$ps->id}}" tag-name="myApp.section_box_h_{{$ps->id}}" my-content='myApp.section_box_title_{{$ps->id}}'></tag>
                               
                                
                                <a  href="{!! url(getLang()) !!}<%=myApp.section_box_link_{{$ps['id']}}%>" data-scrollto="<%=myApp.section_box_link_scroll_{{$ps['id']}}%>">
                                    <img id="section_image_preview_{{$ps->id}}" itemprop="image" src="{{asset('')}}<%=myApp.section_image_{{$ps['id']}}%>" alt="" data-animate='<%=myApp.section_image_animate_{{$ps['id']}}%>' />
                                    
                                     <div class="overlay" ng-if="myApp.section_image_overlay_{{$ps['id']}}">
                                            <div class="overlay-wrap"><i><%=myApp.section_image_overlay_{{$ps['id']}}%></i>
                                         </div>
                                    
                                         </div>
                                </a>
                                 <p ng-if="myApp.section_box_mid_{{$ps['id']}}" class="topmargin-sm" style="font-weight: bold;"><%=myApp.section_box_mid_{{$ps['id']}}%></p>
                                  
                                  <p compile="myApp.section_box_lead_{{$ps['id']}}" class="lead"><%=myApp.section_box_lead_{{$ps['id']}}%></p>
                                <div style="<%=myApp.section_box_subtitle_style_{{$ps['id']}}%>">
                                <p compile="myApp.section_box_subtitle_{{$ps['id']}}"><%=myApp.section_box_subtitle_{{$ps['id']}}%></p>
                                </div>
                                   
                                <p ng-if="myApp.section_button_title_{{$ps['id']}} && myApp.section_button_href_{{$ps['id']}}" class="nomargin"><%=myApp.section_button_title_{{$ps->id}}%></p>
                                    
                                <p ng-if="myApp.section_button_href_{{$ps['id']}}" style="display:inline-block" class="center rightmargin-lg"><a class="button <%=(myApp.section_button_borderr_{{$ps->id}})?'':'button-border'%> button-rounded" href="{!! url(getLang()) !!}<%=myApp.section_button_href_{{$ps['id']}}%>"><%=myApp.section_button_text_{{$ps['id']}}%></a></p>

                               
                                <p ng-if="myApp.section_button2_title_{{$ps['id']}} && myApp.section_button2_href_{{$ps['id']}}" class="nomargin"><%=myApp.section_button2_title_{{$ps->id}}%></p>
                                    
                                <p ng-if="myApp.section_button2_href_{{$ps['id']}}" style="display:inline-block" class="center"><a ng-class="(myApp.section_button2_border_{{$ps->id}}!=0)?'button-border':''" class="button button-rounded  button-secondary" href="{!! url(getLang()) !!}<%=myApp.section_button2_href_{{$ps['id']}}%>"><%=myApp.section_button2_text_{{$ps['id']}}%></a></p>

                            </div>
                            @endforeach

                        </div>                   

                </div>
            </div>
        </div>

        @endforeach


    </div>
    </div>
</div>		
<script>
    $(document).ready(function(){
        setTimeout(
  function() 
  {
         $('.navigation-toggler').click();
         }, 200);
         $('input[name="theme"]').click(function(){
             mypara=$(this).parents('.parentclass');
             
             switch($(this).val()){
                case '1':
                    mypara.find('input.pp_background_color').val('#337ab7').change();
                    mypara.find('.pp_full_screen').prop('checked',true).click().click()
                    mypara.find('input.pp_box_color').val('rgba(255,255,255,0.75)').trigger('input');
                    mypara.find('input.pp_box_theme').val('nobottommargin pull-right col-padding center').trigger('input');
                    if(!mypara.find('input.pp_headline').val())
                    mypara.find('input.pp_headline').val('Box Heading').trigger('input');
                    if(!mypara.find('input.pp_lead').val())
                    mypara.find('input.pp_lead').val("Currently background color is set to blue. You can also select image over there. But either image or color can be set not both.").trigger('input');
                    mypara.find('input.pp_button_text').val("").trigger('input');
                    mypara.find('input.pp_before_heading').val("").trigger('input');
                    mypara.find('input.pp_lead_head').val("").trigger('input');
                    mypara.find('input.pp_button_href').val("").trigger('input');
                    mypara.find('input.pp_h1').click().click();
                     break;
                case '2':
                    mypara.find('input.pp_background_color').val('#6c6c6c').change();
                    mypara.find('.pp_full_screen').prop('checked',true).click().click()
                    mypara.find('input.pp_box_color').val('rgba(0,0,0,.5);').trigger('input');
                    mypara.find('input.pp_box_theme').val('dark center').trigger('input');
                    if(!mypara.find('input.pp_headline').val())
                    mypara.find('input.pp_headline').val('Box Heading').trigger('input');
                    if(!mypara.find('input.pp_lead').val())
                    mypara.find('input.pp_lead').val("You can remove this text and there is also option to put image above Box heading").trigger('input');
                    mypara.find('input.pp_before_heading').val("").trigger('input');
                    mypara.find('input.pp_button_text').val("Learn More").trigger('input');                    
                    mypara.find('input.pp_lead_head').val("").trigger('input');
                    mypara.find('input.pp_button_href').val("/").trigger('input');
                    mypara.find('input.pp_h1').click().click();
                     break;
                case '3':
                    mypara.find('input.pp_background_color').val('#e9e9e9').change();
                    mypara.find('.pp_full_screen').prop('checked',false).click().click()
                    mypara.find('input.pp_box_color').val('').trigger('input');
                    mypara.find('input.pp_box_theme').val('center').trigger('input');
                    if(!mypara.find('input.pp_headline').val())
                    mypara.find('input.pp_headline').val('SMALL TEXT CONTAINER').trigger('input');
                    if(!mypara.find('input.pp_lead').val())
                    mypara.find('input.pp_lead').val("My lead Goes Here with long description, stop reading this text is just for demo purpose.").trigger('input');
                    mypara.find('input.pp_before_heading').val("After Heading").trigger('input');
                    mypara.find('input.pp_button_text').val("").trigger('input');
                    mypara.find('input.pp_lead_head').val("Lead Head").trigger('input');
                    mypara.find('input.pp_button_href').val("").trigger('input');
                    mypara.find('input.pp_h1').click().click();
                     break;
                case '4':
                     mypara.find('input.pp_background_color').val('#337AB7').change();
                    mypara.find('.pp_full_screen').prop('checked',false).click().click()
                    mypara.find('input.pp_box_color').val('').trigger('input');
                    mypara.find('input.pp_box_theme').val('dark center nomargin').trigger('input');
                    if(!mypara.find('input.pp_headline').val())
                    mypara.find('input.pp_headline').val('one liner').trigger('input');
                    if(!mypara.find('input.pp_lead').val())
                    mypara.find('input.pp_lead').val('<i style="font-size: 40px;" class="icon-chevron-down nobottommargin"></i>').trigger('input');
                    mypara.find('input.pp_before_heading').val("").trigger('input');
                    mypara.find('input.pp_button_text').val("").trigger('input');
                    mypara.find('input.pp_box_href').val("/").trigger('input');
                    mypara.find('input.pp_lead_head').val("").trigger('input');
                    mypara.find('input.pp_button_href').val("").trigger('input');
                    mypara.find('input.pp_h2').click().click();
                     break;
                case '5':
                     mypara.find('input.pp_background_color').val('').change();
                    mypara.find('.pp_full_screen').prop('checked',false).click().click()
                    mypara.find('input.pp_box_color').val('').trigger('input');
                    mypara.find('input.pp_box_theme').val('').trigger('input');
                    
                    mypara.find('input.pp_headline').val('').trigger('input');
                    
                    mypara.find('input.pp_lead').val('').trigger('input');
                    mypara.find('input.pp_before_heading').val("").trigger('input');
                    mypara.find('input.pp_button_text').val("").trigger('input');
                    mypara.find('input.pp_box_href').val("").trigger('input');
                    mypara.find('input.pp_lead_head').val("").trigger('input');
                    mypara.find('input.pp_button_href').val("").trigger('input');
                    mypara.find('input.pp_h0').click().click();
                     break;
                     
             }
         })
          $('input[name="theme1"]').click(function(){
             mypara=$(this).parents('.parentsection');
             switch($(this).val()){
                case '11':
                    mypara.find('input.sboxh4').click().click();
                    //mypara.find('input.sboxh').val('h4').trigger('input');
                    mypara.find('input.sboxtitle').val('Product Unique Feature').trigger('input');
                    mypara.find('select.scol').val('col_two_third').change();
                    mypara.find('input.sfbox').val('').trigger('input');
                    mypara.find('input.sboxmid').val('(You can select image insted of this)').trigger('input');
                    mypara.find('input.ssubtitlestyle').val('text-align:left').trigger('input');
                    mypara.find('input.sbuttontext').val('').trigger('input');
                    mypara.find('input.sbuttonhref').val('').trigger('input');
                    mypara.find('input.sbutton2text').val('').trigger('input');
                    mypara.find('input.sbutton2href').val('').trigger('input');
                    mypara.find('input.ssubtitle').val('The patented hopping foot of the Q’nique 21 can be positioned for optimum visibility of the needle. Easily switch the hopping foot to either the side or the back of the needle according to your preference.').trigger('input');
                    //mypara.find('input.pp_h2').click().click();
                    break;
                case '12':
                    mypara.find('input.sboxh4').click().click();
                    //mypara.find('input.sboxh').val('h4').trigger('input');
                    mypara.find('input.sboxtitle').val('Second Unique Feature').trigger('input');
                    mypara.find('select.scol').val('col_one_third col_last').change();
                    mypara.find('input.sfbox').val('').trigger('input');
                    mypara.find('input.sbuttontext').val('').trigger('input');
                    mypara.find('input.sbuttonhref').val('').trigger('input');
                    mypara.find('input.sbutton2text').val('').trigger('input');
                    mypara.find('input.sbutton2href').val('').trigger('input');
                    mypara.find('input.sboxmid').val('(You can select image insted of this)').trigger('input');
                    mypara.find('input.ssubtitlestyle').val('text-align:left').trigger('input');
                    mypara.find('input.ssubtitle').val('The patented hopping foot of the Q’nique 21 can be positioned for optimum visibility of the needle. Easily switch the hopping foot to either the side or the back of the needle according to your preference.').trigger('input');
                    break;
                case '13':
                    mypara.find('input.sboxh4').click().click();
                    //mypara.find('input.sboxh').val('h4').trigger('input');
                    mypara.find('input.sboxtitle').val('Second Unique Feature').trigger('input');
                    mypara.find('input.sfbox').val('suitcase').trigger('input');
                    mypara.find('select.scol').val('col-sm-4').change();
                    mypara.find('input.sboxmid').val('').trigger('input');
                    mypara.find('input.sbuttontext').val('').trigger('input');
                    mypara.find('input.sbuttonhref').val('').trigger('input');
                    mypara.find('input.sbutton2text').val('').trigger('input');
                    mypara.find('input.sbutton2href').val('').trigger('input');
                    mypara.find('input.ssubtitlestyle').val('text-align:center').trigger('input');
                    mypara.find('input.ssubtitle').val('The patented hopping foot of the Q’nique 21 can be positioned for optimum visibility of the needle. Easily switch the hopping foot to either the side or the back of the needle according to your preference.').trigger('input');
                    break;
                case '14':
                    mypara.find('input.sboxh0').click().click();
                    // mypara.find('input.sboxh').val('').trigger('input');
                    mypara.find('input.sboxtitle').val('').trigger('input');
                    mypara.find('select.scol').val('col-md-6').change();
                    mypara.find('input.sfbox').val('').trigger('input');
                    mypara.find('input.sbuttontext').val('Buy Now').trigger('input');
                    mypara.find('input.sbuttonhref').val('/').trigger('input');
                    mypara.find('input.sbutton2text').val('See More').trigger('input');
                    mypara.find('input.sbutton2href').val('/').trigger('input');
                    mypara.find('input.sboxmid').val('(You can select image insted of this)').trigger('input');
                    mypara.find('input.ssubtitlestyle').val('').trigger('input');
                    mypara.find('input.ssubtitle').val('').trigger('input');
                    break;
            }
            });
            $('.pp_box_color').colorpicker().colorpicker('enable');
            $('.pp_background_color').colorpicker().colorpicker('enable');
            $('.slbagcolor').colorpicker().colorpicker('enable');
            $('.sloverlaycolor').colorpicker().colorpicker('enable');
            $('.pp_box_color, .pp_background_color').colorpicker().on('changeColor',
            function(ev) {
                $('#'+$(this).attr('data-div')).css('background-color',$(this).val());
                //$(this).trigger('input');
            });
            $('.pp_h1, .pp_h2,.pp_h3,.pp_h4,.pp_h5,.pp_h6').on('click',function(){
                mypara=$(this);
                mypara.parent().find('.pphref').val('');
            });
            $('.pphref').on('keyup',function(){
                mypara=$(this);
                    if($('.pphref').val()){
                        mypara.parent().find('.pp_h0').click().click()
                    }
            });
    });
</script>