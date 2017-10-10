@extends('backend/layout/create')

@section('topcss')
    <link rel="stylesheet" href="{!! asset('/clip/assets/bootstrap/css/bootstrap-tagsinput.css') !!}" type="text/css" />
<!--    <link rel="stylesheet" href="{!! asset('/clip/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}" type="text/css" />-->
    <link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />


<style>
    .tab-pane{min-height:800px;height:100%;}
</style>
@endsection

@section('topscripts')@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin/page') !!}"><i class="fa fa-bookmark"></i> Page</a></li>
            <li class="active">Add Page</li>
        </ol>
        <div class="page-header">
            <h1> Page <small> | Add Page</small> </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                Page Data
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="space12">
                    <div class="btn-group btn-group-lg">
                        <a class="btn btn-default active" href="{!! route('admin.menu') !!}"> Menus </a>
                        <a class="btn btn-default hidden-xs" href="javascript:;">
                        <i class="fa fa-plus"></i> Add Link To Menu</a>
                    </div>
                </div>
@if(Session::has('message'))
    <div class="alert alert-info">
      {{Session::get('message')}}
    </div>
@endif
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
                <br style="clear:both" />


                <div class="tabbable">

                    {!! Form::open(['action' => '\App\Http\Controllers\Admin\PageController@store', 'method'=>'post', 'files'=>'true', 'novalidate'=>'novalidate']) !!}
                    <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                        <li class="active"> <a data-toggle="tab" href="#panel_tab_content"> Page Content </a> </li>
                        <li> <a data-toggle="tab" href="#panel_tab_seo"> SEO < META > </a> </li>
                        <li> <a data-toggle="tab" href="#panel_tab_social"> SOCIAL </a> </li>
                    </ul>
                    <div class="tab-content">



                        @include('backend.page.fields')

                        <div class="pull-right">
                            {!! Form::submit('Save', ['class'=>'btn btn-primary btn-squared']) !!}
                            <a href="{!! url(getLang(). '/admin/page') !!}" class="cancel btn btn-dark-grey btn-squared">Cancel</a>
                        </div>

                        <div style="clear:both"></div>
                    </div>
                    {!! Form::close() !!}


                </div>
                <br style="clear:both" />

            </div>
        </div>
    </div>
</div>
@endsection



@section('bottomscripts')

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
{{-- <script type="text/javascript" src="{!! asset('/clip/jasny-bootstrap/js/jasny-bootstrap.min.js') !!}"></script>
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
<script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/fileinput.min.js') !!}"></script>
<script src="{!! asset('/clip/assets/js/bootstrap-toggle.min.js') !!}" type="text/javascript" charset="utf-8"></script>
<script src="{!! asset('/clip/assets/js/min/form-elements.min.js') !!}"></script> --}}
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{!! asset('/clip/assets/js/page-elements.js') !!}"></script>

<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('js_init')
CreatePage.init();
$('.fileinput').fileinput();
$('input#slug').attr('disabled', 'disabled');
@endsection
