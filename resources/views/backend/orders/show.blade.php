@extends('backend/layout/clip')

@section('topscripts-off')
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">

        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! url(getLang(). '/admin/sections') !!}"><i class="fa fa-gears"></i>  Order</a></li>
            <li class="active">Preview Order</li>
        </ol>
        <div class="page-header">
            <h1>  Orders <small> | Preview Order</small> </h1>
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
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="clearfix"></div>
                        @include('flash::message')
                        @if(Session::has('flash_message'))
                        <div class="flash-message alert {{ Session::has('flash-warning') ? 'alert-danger' : 'alert-success' }}">
                            {{ session('flash_message') }}
                        </div>
                        @endif
                        <div class="clearfix"></div>

                        <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/orders') !!}"> Orders</a>
                                @if(!$order->charge_date)
                                <a onclick="return confirm('Are you sure want to charge ${{$order->amount}} for this order?')" href="{!! route('admin.orders.charge', [$order->id]) !!}" class='btn btn-default btn-xs'>Charge</a>
                                @endif
                                <a target="_blank"  class="btn btn-default" href="{!! route('admin.orders.download', [$order->id]) !!}"> Print</a>

                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            @include('backend.orders.show_fields')
                            @if(!$order->charge_date)
                            <a onclick="return confirm('Are you sure want to charge ${{$order->amount}} for this order?')" href="{!! route('admin.orders.charge', [$order->id]) !!}" class='btn btn-success'>Charge</a>
                            @endif
                            <a target="_blank" href="{!! route('admin.orders.download', [$order->id]) !!}" class='btn btn-primary'>Print</a>
                            <a href="{!! url(getLang() . '/admin/orders') !!}" class="btn btn-default">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottomscripts-off')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline-off')
@endsection
