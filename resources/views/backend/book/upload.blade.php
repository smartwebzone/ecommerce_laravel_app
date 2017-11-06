@extends('backend/layout/create')

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
            <li><a href="{!! url(getLang() . '/admin/book') !!}"><i class="fa fa-book"></i> Books</a></li>
            <li class="active">Upload Book</li>
        </ol>
        <div class="page-header">
            <h1> Upload Book </h1>
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
                        {{--    @include('flash::message') --}}
                        {{--    @include('adminlte-templates::common.errors') --}}
                        <div class="clearfix"></div>

                        <div class="col-md-12"> 
                            {!! Form::open(['route' => ['admin.book.import'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::label('company_id', 'Company:') !!}
                                    {!! Form::select('company_id', $company, NULL, array('class' => 'form-control', 'value'=>Input::old('company_id'),'required' => true)) !!}
                                    @if ($errors->has('company_id'))
                                    <div class="error">{{ $errors->first('company_id') }}</div>
                                    @endif
                                </div>
<!--                                <div class="form-group col-sm-6">
                                    {!! Form::label('standard_id', 'Standard:') !!}
                                    {!! Form::select('standard_id', $standard, NULL, array('class' => 'form-control', 'value'=>Input::old('standard_id'),'required' => true)) !!}
                                    @if ($errors->has('standard_id'))
                                    <div class="error">{{ $errors->first('standard_id') }}</div>
                                    @endif
                                </div>-->
<!--                            </div>
                            <div class="row">-->
                                <div class="form-group col-sm-6">  
                                    {!! Form::label('Upload', 'Upload File:') !!}
                                    <input required="" class="form-control" type="file" name="upload" value="Upload">

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Import', ['class' => 'btn btn-primary','required' => true]) !!}
                                    <a href="{!! route('admin.book') !!}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
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


<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')

@endsection
