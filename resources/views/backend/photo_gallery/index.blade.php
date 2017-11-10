@extends('backend/layout/clip')

@section('topscripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
        // publish settings
        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! url(getLang() . '/admin/photo-gallery/" + id + "/toggle-publish/') !!}",
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{!!url('/')!!}/assets/images/publish.png" : "{!!url('/')!!}/assets/images/not_publish.png";
                        $("#publish-image-" + id).attr('src', imagePath);
                    }
                },
                error: function () {
                    alert("error");
                }
            })
        });
    });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Photo Gallery</li>
        </ol>
        <div class="page-header">
            <h1> Photo Gallery </h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
{{-- <div class="container-fluid"> --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="clip-stats"></i>
                    Panel Data
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                        <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="space12">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-default active" href="javascript:void(0)">Photo Galleries </a>
                            <a class="btn btn-default hidden-xs" href="{!! langRoute('admin.photo-gallery.create') !!}"> <i class="fa fa-plus"></i>&nbsp;Add Photo Gallery </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        @if($photo_galleries->count())
                        <div class="">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $photo_galleries as $photo_gallery )
                                    <tr>
                                        <td> {!! link_to_route(getLang(). '.admin.photo-gallery.show', $photo_gallery->title, $photo_gallery->id, array( 'class' => 'btn btn-link btn-xs' )) !!}
                                        <td>{!! $photo_gallery->created_at !!}</td>
                                        <td>{!! $photo_gallery->updated_at !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                                Action
                                                <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{!! langRoute('admin.photo-gallery.show', array($photo_gallery->id)) !!}">
                                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Photo Gallery
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{!! langRoute('admin.photo-gallery.edit', array($photo_gallery->id)) !!}">
                                                        <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Photo Gallery
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{!! URL::route('admin.photo-gallery.delete', array($photo_gallery->id)) !!}">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Photo Gallery
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a target="_blank" href="{!! URL::route('dashboard.photo_gallery.show', ['slug' => $photo_gallery->slug]) !!}">
                                                        <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" id="{!! $photo_gallery->id !!}" class="publish"><img id="publish-image-{!! $photo_gallery->id !!}" src="{!!url('/')!!}/assets/images/{!! ($photo_gallery->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-danger">No results found</div>
                        @endif
                        <div class="pull-left">
                            <ul class="pagination">
                                {!! $photo_galleries->render() !!}
                            </ul>
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
    (function($){
       $('.sidebar #photo-gallery').addClass('active-section active open');
    });
</script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')
@endsection