@extends('backend/layout/clip')

<<<<<<< HEAD
@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{!! langRoute('admin.photo-gallery.index') !!}"><i class="fa fa-desktop"></i> Photo Gallery</a></li>
        <li class="active">Delete Photo Gallery</li>
        </ol>
        <div class="page-header">
              <h1> Photo Gallery <small> | Delete Photo Gallery</small> </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')

<div class="col-lg-10">
    {!! Form::open( array(  'route' => array(getLang(). '.admin.photo-gallery.destroy', $photo_gallery->id ) ) ) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $photo_gallery->title !!} </b> ?
=======
@section('topscripts')

@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-md-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{!! langRoute('admin.photo-gallery.index') !!}"><i class="fa fa-desktop"></i> Photo Gallery</a></li>
                <li class="active">Delete Photo Gallery</li>
            </ol>
            <div class="page-header">
                <h1> Photo Gallery
                    <small> | Delete Photo Gallery</small>
                </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
>>>>>>> refs/remotes/origin/master
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">


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
                            {!! Form::open( array(  'route' => array(getLang(). '.admin.photo-gallery.destroy', $photo_gallery->id ) ) ) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            <div class="alert alert-warning">
                                <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $photo_gallery->title !!} </b> ?
                                </div>
                                <div class="pull-right">
                                    {!! Form::submit('Yes', array('class' => 'btn btn-danger')) !!}
                                    {!! link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {!! Form::close() !!}


                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    {!! Form::close() !!}
</div>
=======
@endsection

@section('bottomscripts')

@endsection

@section('clipinline')
>>>>>>> refs/remotes/origin/master

@endsection
