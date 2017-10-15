@extends('backend/layout/clip')

@section('topcss')
<link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
<link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />
@endsection

@section('pagetitle')
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="tabbable">
            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                <li class="active">
                    <a data-toggle="tab" href="#panel_overview">
                        Overview
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" onClick="alert('Create User First!');" href="javascript:void(0);">
                        Locations
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="panel_overview" class="tab-pane in active">
                    {!! Form::open(['action' => 'Admin\UserController@store', 'method' => 'post', 'files' => true]) !!}
                    @include('backend.user.partials.userfields')
                    {!! Form::close() !!}
                </div>
                {{-- @include('partials.user.myaccountedit') --}}
                {{--@include('partials.header.top-bar')--}}
                <div id="panel_user_locations" class="tab-pane">
                    <br style="clear:both" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
<script src="{!! asset('/clip/assets/js/min/form-elements.min.js') !!}"></script>
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
<script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') !!}"></script>
<script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/fileinput.js') !!}"></script>
<!--<script src="{!! asset('/clip/assets/js/bootstrap-toggle.min.js') !!}" type="text/javascript" charset="utf-8"></script>-->

@endsection

@section('clipinline')

$("input#display_name").attr('readonly','readonly');
$('#display_name,#first_name,#last_name').blur(function() {
$('input[name="userInfo[display_name]"]').val(
$('#first_name').val() + " " +
$('#last_name').val() );
});

FormElements.init();
@endsection
