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

            <li class="active">Users</li>
        </ol>
        <div class="page-header">
            <h1>  Users </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
{{-- <div class="container-fluid"> --}}
<div class="row">
    {{--
    <div class="col-sm-2"></div>
    --}}
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
                        <div class="clearfix"></div>

                        <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! url(getLang() . '/admin/user') !!}"> Users</a>
                                <a class="btn btn-default hidden-xs" href="{!!  url(getLang() . '/admin/user/create') !!}"> <i class="fa fa-plus"></i> Add  User </a>
                            </div>
                        </div>
                        <div class="widget search col-md-12">
                            <form role="form" method="GET">
                                <!--                                <div class="control-group col-md-2">
                                                                    <label class="control-label" for="status_filter">User Type</label>
                                                                    <div class="controls">
                                                                        <select name="user_type" id="status_filter" class="form-control">
                                                                            <option value="">ALL</option>
                                                                            <option value="Admin" {{ @$user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                                            <option value="User" {{ @$user_type == 'User' ? 'selected' : '' }}>User</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group col-md-4">
                                                                    <label class="control-label" for="title">From Date</label>
                                
                                                                    <div class="controls">
                                                                        <input type="date" name="from" value="{{@$from}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="control-group col-md-4">
                                                                    <label class="control-label" for="title">To Date</label>
                                
                                                                    <div class="controls">
                                                                        <input type="date" name="to" value="{{@$to}}" class="form-control">
                                                                    </div>
                                                                </div>-->
                                <div class="control-group col-md-4">
                                    <label class="control-label" for="name">Name</label>

                                    <div class="controls">
                                        <input type="text" name="name" value="{{@$name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="phone">Phone</label>

                                    <div class="controls">
                                        <input type="text" name="phone" value="{{@$phone}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="email">Email</label>

                                    <div class="controls">
                                        <input type="text" name="email" value="{{@$email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-2">
                                    <label class="control-label" for="type">User Type</label>

                                    <div class="controls">
                                        <select name="user_type" id="status_filter" class="form-control">
                                            <option value="">ALL</option>
                                            <option value="Admin" {{ @$user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                                            @if(!Sentinel::inRole('dealer'))
                                            <option value="User" {{ @$user_type == 'User' ? 'selected' : '' }}>Customer</option>
                                            @endif
                                            <option value="Dealer" {{ @$user_type == 'Dealer' ? 'selected' : '' }}>Dealer</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col-md-2">
                                    <label class="control-label" for="title">&nbsp;</label>
                                    <div class="controls">
                                        <button class="btn btn-info" type="submit">FILTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            @include('backend.user.table')
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