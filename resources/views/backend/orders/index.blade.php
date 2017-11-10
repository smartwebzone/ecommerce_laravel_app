@extends('backend/layout/clip')

@section('topscripts-off')
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">

        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Orders</li>
        </ol>
        <div class="page-header">
            <h1>  Orders </h1>
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

                            </div>
                        </div>
                        <div class="widget search col-md-12">
                            <form role="form" method="GET">
                                 
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="status_filter">Order Status</label>
                                    <div class="controls">
                                        <select name="status" id="status_filter" class="form-control">
                                            <option value="">ALL</option>
                                            <option value="Processing" {{ @$status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="Confirmed" {{ @$status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Shipping" {{ @$status == 'Shipping' ? 'selected' : '' }}>Shipping</option>
                                            <option value="Shipped" {{ @$status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="Delivered" {{ @$status == 'Delivered' ? 'selected' : '' }} >Delivered</option>
                                            <option value="Cancelled" {{ @$status == 'Cancelled' ? 'selected' : '' }} >Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="charge_status">Charge Status</label>
                                    <div class="controls">
                                        <select name="charge_status" id="charge_status" class="form-control">
                                            <option value="">ALL</option>
                                            <option value="charged" {{ @$charge_status == 'charged' ? 'selected' : '' }}>Charged</option>
                                            <option value="not_charged" {{ @$charge_status == 'not_charged' ? 'selected' : '' }}>Charge Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="title">From Date</label>

                                    <div class="controls">
                                        <input type="date" name="from" value="{{@$from}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="title">To Date</label>

                                    <div class="controls">
                                        <input type="date" name="to" value="{{@$to}}" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="type">User Type</label>

                                    <div class="controls">
                                        <select name="user_type" id="status_filter" class="form-control">
                                            <option value="">ALL</option>
                                            <option value="Admin" {{ @$user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="User" {{ @$user_type == 'User' ? 'selected' : '' }}>Customer</option>
                                            <option value="Dealer" {{ @$user_type == 'Dealer' ? 'selected' : '' }}>Dealer</option>

                                        </select>
                                    </div>
                                </div>
                                 <div class="control-group col-md-3">
                                    <label class="control-label" for="title">Customer</label>

                                    <div class="controls">
                                        <input type="text" placeholder="Name / Email / Phone" name="cust" value="{{@$cust}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="type">Exported</label>

                                    <div class="controls">
                                        <select name="exported" id="status_filter" class="form-control">
                                            <option value="">ALL</option>
                                            <option value="1" {{ @$exported == '1' ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ @$exported == '0' ? 'selected' : '' }}>No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="title">&nbsp;</label>
                                    <div class="controls">
                                        <button class="btn btn-info" type="submit">FILTER</button>
                                    </div>
                                </div>
                                 <div class="control-group col-md-3">
                                        <label class="control-label" for="title">&nbsp;</label>
                                        <div class="controls">
                                        <input type="hidden" value="{{@$offset}}" name="offset">
                                        <input type="hidden" value="" class="export-order" name="export_order">
                                        
                                        <button disabled="" name="export" value="1" class="btn btn-success export-btn" type="submit">EXPORT</button>
                                        <label class="control-label" for="title">&nbsp;</label>
                                        <button name="export_all" value="1" class="btn btn-success" type="submit">EXPORT ALL</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12">
                            @include('backend.orders.table')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<script>
    $('.check-all').click(function(){
        if ($('.check-all').prop('checked')){
            $('.export-btn').removeAttr('disabled');
            $('.order-check').prop('checked', true);
        }else{
            $('.export-btn').attr('disabled','');
        $('.order-check').prop('checked', false);
        }
         var a = ''
        $('.order-check').each(function(){
            if(this.checked) {
                a += $(this).attr('data')+',';
            }
         });
        $('.export-order').val(a.replace(/^,|,$/g,''));
    });
    $('.order-check').change(function(){
        var a = ''
        $('.order-check').each(function(){
            if(this.checked) {
                a += $(this).attr('data')+',';
            }
         });
         if(a){
             $('.export-btn').removeAttr('disabled');
         }else{
             
             $('.export-btn').attr('disabled','');
         }
        $('.export-order').val(a.replace(/^,|,$/g,''));
    });
</script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline-off')
@endsection
