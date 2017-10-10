@extends('backend/layout/create')
@section('pagetitle')
    <div class="row">
       
    </div>
@endsection


@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <i class="clip-round"></i> Update Page 
               @if($page->title)
               {!! '('.$page->title.')' !!}
               @endif
            </div>
            <div class="panel-body">
                @if(Session::has('flash_message'))
                <div class="flash-message alert alert-success">
                    {{ session('flash_message') }}
                </div>
                @endif
                <div class="space12">
                    <a href="{!! url(getLang(). '/admin/product_page') !!}" class="btn btn-primary">Back</a>
                    @if($page->slug)
                    <a target="_blank" href="{!! url(getLang().'/' . $page->slug) !!}" class="preview btn btn-default"><i class="fa fa-eye"></i>&nbsp; Preview</a>
                    @endif
                </div>

                <div class="tabbable">

                {!! Form::model($page,  [ 'route' => [ getLang() . '.admin.product_page.update', $page->id], 'method' => 'PATCH', 'files'=>true,'enctype'=> 'multipart/form-data']) !!}
                    <ul class="nav nav-tabs">
                        <li id="tabconfig"  class="active"> <a data-toggle="tab" onclick="$('#tabnav').val('config');" href="#panel_tab_content"> Page Config </a> </li>
                        <li id="tabseo"> <a data-toggle="tab" onclick="$('#tabnav').val('seo');" href="#panel_tab_seo"> SEO </a> </li>
                        <li id="tabsocial"> <a data-toggle="tab" onclick="$('#tabnav').val('social');" href="#panel_tab_social"> SOCIAL </a> </li>
                        <li id="tabslider"> <a data-toggle="tab" onclick="$('#tabnav').val('slider');$( window ).resize()" href="#panel_tab_slider"> SLIDER </a> </li>
                        <li id="tabsections"> <a data-toggle="tab" onclick="$('#tabnav').val('sections');" href="#panel_tab_parallax"> SECTIONS </a> </li>

                    </ul>
                <input type="hidden" name="tabnav" id="tabnav" value="config"/>
                    <div class="tab-content" ng-app="myApp">
                        @include('backend.product_page.fields')

	                    <div class="pull-right">
		                    {!! Form::submit('UPDATE', ['class'=>'btn btn-primary btn-squared']) !!}
		                    <a href="{!! url(getLang(). '/admin/product_page') !!}" class="cancel btn btn-dark-grey btn-squared">Cancel</a>
	                    </div>

	                    <div style="clear:both"></div>
                    </div>
                {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection


@section('topscripts')
	
        <style>
    .tab-pane{min-height:800px;height:100%;}
    </style>
@endsection

@section('bottomscripts')
 <script src="{!! asset('/clip/assets/js/productpage-elements.js') !!}"></script>
 <script>
    // $(document).ready(function(){
      @if(Session::has('tabnav'))
          $("#tab{{session('tabnav')}}").find('a').click();
      @endif
  //});
     </script>
@endsection

@section('js_init')
CreatePage.init();
	$('.fileinput').fileinput();
@endsection
