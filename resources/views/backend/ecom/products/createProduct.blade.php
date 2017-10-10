@extends('backend/layout/clip')

@section('topcss')@endsection

@section('topscripts')
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="{!! asset('/clip/assets/bootstrap/css/bootstrap-tagsinput.css') !!}" type="text/css" />
        <link rel="stylesheet" href="{!! asset('/clip/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}" type="text/css" />
        <link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/ladda-bootstrap/dist/ladda-themeless.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-social/bootstrap-social.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') !!}" rel="stylesheet" />
        <link href="{!! asset('/clip/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') !!}" rel="stylesheet" />
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('topjs')
    @if($app->environment('local'))
        <script> if( window.console && window.console.log ) {
                console.log("%c LIST OF FILES AS THEY ARE LOADED ", 'background: #222; color: yellow', "loaded");
                console.log("%c CREATEPRODUCT.blade.php", 'background: #222; color: yellow', "loaded");
            }
        </script>
    @endif
@endsection

@section('in_page_title')@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Products</li>
        </ol>
        <div class="page-header">
            <h1 itemprop="headline" class="pull-left">Create New Product</h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="add-product">


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{{--@if(Sentinel::findRoleById(1))--}}
{{--@include('backend.ecom.products.devtools.devtools')--}}
{{--@endif--}}


    <form action="{!! route('product.store') !!}" method="post" enctype="multipart/form-data">
    {{-- {!! Form::open(['route' => 'product.store', 'method' => 'post', "enctype" => "multipart/form-data"]) !!} --}}

<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <h3>TAB SELECTION:</h3>
            <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                <li class="active"> <a data-toggle="tab" href="#panel_tab_overview"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; OVERVIEW </a> </li>
                <li class=""> <a data-toggle="tab" href="#panel_tab_image"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; IMAGES &amp; FILES </a> </li>
                <li class=""> <a data-toggle="tab" href="#panel_tab_pricing"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; VARIATIONS </a> </li>
                <li class=""> <a data-toggle="tab" href="#panel_tab_meta"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp; META / SEO </a> </li>
                <li class=""> <a data-toggle="tab" href="#panel_tab_additional"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; ADDITIONAL </a> </li>
                <li class=""> <a data-toggle="tab" href="#panel_tab_sub_products"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; SUB-PRODUCTS </a> </li>
                @if(Sentinel::findRoleById(1))
                <li class=""> <a data-toggle="tab" href="#panel_tab_developer"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; DEVELOPER </a> </li>
                @endif
            </ul>
            <div class="tab-content">
                {{--<div class="form-group col-sm-12 right">--}}
                    {{--{!! Form::submit('Add Product', ['class' => 'btn btn-primary' ]) !!}--}}
                    {{--<a href="{!! url(getLang().'.admin.products.index') !!}" class="btn btn-default">Cancel</a>--}}
                {{--</div>--}}


                <div id="panel_tab_overview" class="tab-pane active">
                    @include('backend.ecom.products.create-sections.overview-fields')
                    <br style="clear:both" />
                </div>

                <div id="panel_tab_image" class="tab-pane">
                    @include('backend.ecom.products.create-sections.image-fields')
                    <br style="clear:both" />
                </div>
                <div id="panel_tab_pricing" class="tab-pane">
                    @include('backend.ecom.products.create-sections.pricing-fields')
                    <br style="clear:both" />
                </div>
                <div id="panel_tab_meta" class="tab-pane">
                    @include('backend.ecom.products.create-sections.meta-fields')
                    <br style="clear:both" />
                </div>
                <div id="panel_tab_additional" class="tab-pane">
                    @include('backend.ecom.products.create-sections.additional-fields')
                    <br style="clear:both" />
                </div>
                <div id="panel_tab_sub_products" class="tab-pane">
                    @include('backend.ecom.products.create-sections.sub_products-fields')
                    <br style="clear:both" />
                </div>

                @if(Sentinel::findRoleById(1))
                <div id="panel_tab_developer" class="tab-pane">
                    @include('backend.ecom.products.create-sections.developer-fields')
                    <br style="clear:both" />
                </div>
                @endif

            </div>
        </div>

        <div class="line"></div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{-- {!! Form::close() !!} --}}


        <div class="form-group col-sm-12">
            {!! Form::submit('Add Product', ['class' => 'btn btn-primary btn-squared']) !!}

            <a href={!! url(getLang().'.admin.products.index') !!}" class="btn btn-default btn-squared">Cancel</a>
        </div>

    </form>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('bottomscripts')

       <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="{!! asset('/clip/jasny-bootstrap/js/jasny-bootstrap.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/moment/min/moment.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/autosize/dist/autosize.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/select2/dist/js/select2.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery-maskmoney/dist/jquery.maskMoney.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/jquery.tagsinput/src/jquery.tagsinput.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/summernote/dist/summernote.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/ckeditor/ckeditor.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/ckeditor/adapters/jquery.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/fileinput.js') !!}"></script>
        <script src="{!! asset('/clip/assets/js/jquery.chained.remote.js') !!}"></script>
        <script src="{!! asset('/clip/assets/js/jquery.chained.js') !!}"></script>

        <script src="{!! asset('/clip/assets/js/repeatable-fields.js') !!}"></script>
        <script src="{!! asset('/clip/assets/js/min/form-elements.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') !!}"></script>

        <script src="{!! asset('/clip/assets/js/product-elements.js') !!}"></script>

        @if(Sentinel::findRoleById(1))
        <script src="{!! asset('/clip/assets/js/product-devtools.js') !!}"></script>
        @endif
        @if($app->environment('local'))
        @endif
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript">
          window.onload = function () {
//
//              $("#thumbnail").fileinput({
//                  overwriteInitial: true,
//                  maxFileSize: 2000,
//                  showClose: false,
//                  showCaption: false,
//                  browseLabel: '',
//                  removeLabel: '',
//                  browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
//                  removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
//                  removeTitle: 'Cancel or reset changes',
//                  elErrorContainer: '#kv-avatar-errors',
//                  msgErrorClass: 'alert alert-block alert-danger',
//                  defaultPreviewContent: '<img itemprop="image" src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your product" >',
//                  layoutTemplates: {main2: '{preview} {remove} {browse}'},
//                  allowedFileExtensions: ["jpg", "png", "gif"]
//              });

            CKEDITOR.replace('details', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}",


            });


            CKEDITOR.replace('description', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });

            for (var i in CKEDITOR.instances) {
              CKEDITOR.instances[i].updateElement();
            }

        };


        </script>


<script language="JavaScript"><!--
jQuery(document).ready(function($){
{{-- @if(Sentinel::findRoleById(1)) --}}
{{-- @endif --}}


 });

    //--></script>



@endsection

@section('clipinline')
 FormElements.init();
 ProductElements.init();
 @if(Sentinel::findRoleById(1) && $app->environment('local'))
     ProductDevTools.init();
 @endif
@endsection

@section('js_init')@endsection
