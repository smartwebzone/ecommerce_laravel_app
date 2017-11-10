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

            <li class="active">Items</li>
        </ol>
        <div class="page-header">
            <h1>  Items </h1>
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
    <div class="col-md-12">
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
                                <a class="btn btn-default hidden-xs" href="{!!  url(getLang() . '/admin/book/create') !!}"> <i class="fa fa-plus"></i> Add Item </a>
                                <a class="btn btn-default hidden-xs" href="{!!  url(getLang() . '/admin/book/upload') !!}"> <i class="fa fa-upload"></i> Upload Items </a>
                            </div>
                        </div>
                        <div class="widget search col-md-12">
                            <form role="form" method="GET">

                                
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="charge_status">Company</label>
                                    <div class="controls">
                                        {!! Form::select('company_id', $company, $company_id, array('class' => 'form-control', 'value'=>Input::old('company_id'))) !!}
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="charge_status">Standard</label>
                                    <div class="controls">
                                        {!! Form::select('standard_id', $standard, $standard_id, array('class' => 'form-control', 'value'=>Input::old('standard_id'))) !!}
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="title">Search</label>
                                    <div class="controls">
                                        <input placeholder="Search" type="text" name="search" value="{{@$search}}" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="status_filter">Taxable</label>
                                    <div class="controls">
                                        <!--{!! Form::checkbox('is_taxable', 1, (isset($book->is_taxable))?$book->is_taxable:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_taxable')]) !!}-->
                                        {!! Form::select('is_taxable', [''=>'ALL',1=>'No',2=>'Yes'], $is_taxable, array('class' => 'form-control', 'value'=>Input::old('is_taxable'))) !!}
                                    </div>
                                </div>
                                <div class="control-group col-md-3">
                                    <label class="control-label" for="title">&nbsp;</label>
                                    <div class="controls">
                                        <button class="btn btn-info" type="submit">FILTER</button>
                                        <a class="btn btn-default" href="{{url(getLang().'/admin/book')}}">CLEAR</a>
                                        <input type="hidden" value="{{@$offset}}" name="offset">
                                            <input type="hidden" value="" class="delete-order" name="delete_book">
                                            <label class="control-label" for="title">&nbsp;</label>

                                            <button  name="delete" disabled="" value="1" class="btn btn-danger delete-btn" type="submit">Delete</button>
                                    </div>
                                </div>
                                    
                            </form>
                        </div>
                        <div class="col-md-12">
                            @include('backend.book.table')
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
            $('.delete-btn').removeAttr('disabled');
            $('.order-check').prop('checked', true);
        }else{
            $('.delete-btn').attr('disabled','');
        $('.order-check').prop('checked', false);
        }
         var a = ''
        $('.order-check').each(function(){
            if(this.checked) {
                a += $(this).attr('data')+',';
            }
         });
        $('.delete-order').val(a.replace(/^,|,$/g,''));
    });
    $('.order-check').change(function(){
        var a = ''
        $('.order-check').each(function(){
            if(this.checked) {
                a += $(this).attr('data')+',';
            }
         });
         if(a){
             $('.delete-btn').removeAttr('disabled');
         }else{
             
             $('.delete-btn').attr('disabled','');
         }
        $('.delete-order').val(a.replace(/^,|,$/g,''));
    });
</script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline-off')

@endsection