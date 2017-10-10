@extends('backend/layout/clip')

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

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Products</li>
        </ol>
        <div class="page-header">
            <h1 itemprop="headline" class="pull-left">Update Product</h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="container add-product">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($product, ['route' => ['admin.product.edit', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

        @include('backend.ecom.products.partials.layout-options')


<div class="col-lg-12">
    <div class="tabbable">
        <h4>TAB SELECTOR:</h4>
        <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
            <li class="active"> <a data-toggle="tab" href="#panel_tab_overview"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; OVERVIEW </a> </li>
            <li class=""> <a data-toggle="tab" href="#panel_tab_image"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; IMAGES &amp; FILES </a> </li>
            <li class=""> <a data-toggle="tab" href="#panel_tab_pricing"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; VARIATIONS </a> </li>
            <li class=""> <a data-toggle="tab" href="#panel_tab_meta"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp; META / SEO </a> </li>
            <li class=""> <a data-toggle="tab" href="#panel_tab_additional"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; ADDITIONAL </a> </li>
            <li class=""> <a data-toggle="tab" href="#panel_tab_sub_products"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; SUB-PRODUCTS </a> </li>
            @if($product->reviews_tab)
            <li class=""> <a data-toggle="tab" href="#panel_tab_reviews"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp; REVIEWS</a> </li>
            @endif

            @if($product->support_tab)
            <li class=""> <a data-toggle="tab" href="#panel_tab_help"><i class="fa fa-info" aria-hidden="true"></i>&nbsp; HELP / SUPPORT</a> </li>
            @endif

            @if($product->docs_tab)
            <li class=""> <a data-toggle="tab" href="#panel_tab_docs"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; DOCS </a> </li>
            @endif

            @if($product->warranty_tab)
            <li class=""> <a data-toggle="tab" href="#panel_tab_warranty"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp; WARRANTY </a> </li>
            @endif

            @if(Sentinel::findRoleById(1))
            <li class=""> <a data-toggle="tab" href="#panel_tab_developer"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; DEVELOPER </a> </li>
            @endif
        </ul>
        <div class="tab-content">



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
                @if($product->reviews_tab)
                <div id="panel_tab_reviews" class="tab-pane">
                    @include('backend.ecom.products.create-sections.reviews')
                    <br style="clear:both" />
                </div>
                @endif

                @if($product->support_tab)
                <div id="panel_tab_help" class="tab-pane">
                    @include('backend.ecom.products.create-sections.help')
                    <br style="clear:both" />
                </div>
                @endif

                @if($product->docs_tab)
                <div id="panel_tab_docs" class="tab-pane">
                    @include('backend.ecom.products.create-sections.docs')
                    <br style="clear:both" />
                </div>
                @endif

                @if($product->warranty_tab)
                <div id="panel_tab_warranty" class="tab-pane">
                    @include('backend.ecom.products.create-sections.warranty')
                    <br style="clear:both" />
                </div>
                @endif

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
    {!! Form::close() !!}
    <div class="clearfix"></div>
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
<!--        <script src="{!! asset('/clip/assets/js/bootstrap-toggle.min.js') !!}" type="text/javascript" charset="utf-8"></script>-->
        <script src="{!! asset('/clip/assets/js/repeatable-fields.js') !!}"></script>
        <script src="{!! asset('/clip/assets/js/min/form-elements.min.js') !!}"></script>
        <script src="{!! asset('/clip/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') !!}"></script>

        <script src="{!! asset('/clip/assets/js/product-elements.js') !!}"></script>
<script>
  window.onload = function () {

            // CKEDITOR.instances["email-body"].setData('');
            for (var i in CKEDITOR.instances) {
              CKEDITOR.instances[i].on('details', function() { CKEDITOR.instances[i].updateElement() });
              CKEDITOR.instances[i].on('description', function() { CKEDITOR.instances[i].updateElement() });
            }
            
            CKEDITOR.replace('details', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}",
                extraPlugins: 'autogrow',
                autoGrow_minHeight: 200,
                autoGrow_maxHeight: 600,
                autoGrow_bottomSpace: 50,
                removePlugins: 'resize'
            });

            CKEDITOR.replace('description', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}",
                extraPlugins: 'autogrow',
                autoGrow_minHeight: 400,
                autoGrow_maxHeight: 1200,
                autoGrow_bottomSpace: 50,
                removePlugins: 'resize'
            });

            $("#product-pricing-table input").css( "color", "black");
//            $("#product-pricing-table input").css("fontWeight", "bold" );
            $("#product-pricing-table input").css( "background-color", "#D8D8D8" );
            $("#product-pricing-table select").css( "color", "black" );
            $("#product-pricing-table select").css( "background-color", "#D8D8D8" );
        };
</script>
@endsection

@section('clipinline')
 FormElements.init();
 ProductElements.init();
@endsection
