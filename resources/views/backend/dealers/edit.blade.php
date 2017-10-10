@extends('backend/layout/create')

@section('topscripts-off')
<script type="text/javascript">
    (function($){});
</script>
@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{!! route('admin.dealers.index') !!}"><i class="fa fa-gears"></i>  Dealer</a></li>
            <li class="active">Update Dealers</li>
            </ol>
            <div class="page-header">
                <h1> Dealers <small> | Update</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
            
            @if(!Sentinel::inRole('dealer'))
                          <div class="space12">
                            <div class="btn-group btn-group-lg">
                                <a class="btn btn-default" href="{!! route('admin.dealers.index') !!}">Dealers </a>
                                <a class="btn btn-default hidden-xs" href="{!! route('admin.dealers.create') !!}">
                                  <i class="fa fa-plus"></i> Add Dealer </a>
                            </div>
                        </div>
            @endif
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-10">
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
                    {{--    @include('flash::message') --}}
                    {{--    @include('adminlte-templates::common.errors') --}}
                        <div class="clearfix"></div>



                        <div class="col-md-10">
                            {!! Form::model($dealer, ['route' => ['admin.dealers.update', $dealer->id], 'method' => 'patch']) !!}

                            @include('backend.dealers.fields')

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('bottomscripts')
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            $('.tags').tagsInput({
            removeWithBackspace: true,
            width: 'auto',
            placeholderColor: 'red'

        });
            </script>

        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')

@endsection
