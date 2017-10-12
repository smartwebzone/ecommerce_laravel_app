@extends('backend/layout/create')

@section('topscripts-off')
<script type="text/javascript">
    (function ($) {});
</script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
            <li><a href="{!! url(getLang() . '/admin/order') !!}"><i class="fa fa-building"></i> Order</a></li>
            <li class="active">Add Order</li>
            </ol>
            <div class="page-header">
                <h1> Add Order </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')
{{-- <div class="container-fluid"> --}}
<div class="row">
    {{-- <div class="col-sm-2"></div> --}}
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="clearfix"></div>
{{--    @include('flash::message') --}}
{{--    @include('adminlte-templates::common.errors') --}}
                        <div class="clearfix"></div>

                        <div class="col-md-12">
                    {!! Form::open(['action' => 'Admin\OrderController@store', 'method' => 'post', 'files' => true]) !!}

                        @include('backend.order.fields')

                    {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection

@section('bottomscripts-off')
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->


        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
    $('input#slug').attr('disabled', 'disabled');
    $("input#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("input#slug").val(Text);
    });
    $("input#meta_description").blur(function () {
        $('input#meta_description').val($('input#meta_description').val() + ' by The Jeevandeep Order');
    });
@endsection
