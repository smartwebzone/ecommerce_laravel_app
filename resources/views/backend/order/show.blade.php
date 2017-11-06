@extends('backend/layout/clip')

@section('topscripts-off')
<script type="text/javascript">
    (function ($) {
    });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">

        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! url(getLang(). '/admin/order') !!}"><i class="fa fa-shopping-cart"></i>  Order</a></li>
            <li class="active">Preview Order</li>
        </ol>
        <div class="page-header">
            <h1>  Order <small> | Preview Order</small> </h1>
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
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="clearfix"></div>
                        @include('flash::message')
                        <div class="clearfix"></div>

                        <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/order') !!}"> Back</a>
                                <a class="btn btn-default" href="{!! route('admin.order.invoice', [$order->id]) !!}" target="_blank"> Print Order</a>
                            </div>
                        </div>

                        <div class="col-md-12">
                            @include('backend.order.show_fields')
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

@section('clipinline-off')

@endsection