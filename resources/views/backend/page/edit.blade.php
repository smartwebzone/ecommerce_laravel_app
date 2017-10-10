@extends('backend/layout/create')





@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">

            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{!! url(getLang() . '/admin/page') !!}"><i class="fa fa-bookmark"></i> Page</a></li>
        <li class="active"> Update Page</li>
            </ol>
            <div class="page-header">
                <h1> Page <small> | Update Page</small> </h1>
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
               Page Data
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="panel-body">
                @include('flash::message')
                <div class="space12">
                    <div class="btn-group btn-group-lg">
                        <a class="btn btn-default active" href="javascript:;"> Pages </a>
                        <a class="btn btn-default hidden-xs" href="{!! langRoute('admin.page.create') !!}">
                        <i class="fa fa-plus"></i> Add Page
                        </a>
                    </div>
                </div>

                <div class="tabbable">

                {!! Form::model($page,  [ 'route' => [ getLang() . '.admin.page.update', $page->id], 'method' => 'PATCH', 'files'=>true]) !!}
                    <ul class="nav nav-tabs">
                        <li class="active"> <a data-toggle="tab" href="#panel_tab_content"> Page Content </a> </li>
                        <li> <a data-toggle="tab" href="#panel_tab_seo"> SEO < META > </a> </li>
                        <li> <a data-toggle="tab" href="#panel_tab_social"> SOCIAL </a> </li>

                    </ul>
                    <div class="tab-content">
                        @include('backend.page.fields')

	                    <div class="pull-right">
		                    {!! Form::submit('UPDATE', ['class'=>'btn btn-primary btn-squared']) !!}
		                    <a href="{!! url(getLang(). '/admin/page') !!}" class="cancel btn btn-dark-grey btn-squared">Cancel</a>
	                    </div>

	                    <div style="clear:both"></div>
                    </div>
                {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>


@endsection


@section('topscripts')
	<script type="text/javascript">
		(function() {
	        $('#notification').show().delay(4000).fadeOut(700);
	        // publish settings
	       $(".publish").bind("click", function (e) {
	                var id = $(this).attr('id');
	                e.preventDefault();
	                $.ajax({
	                    type: "POST",
	                    url: "{!! url(getLang() . '/admin/page/" + id + "/toggle-publish/') !!}",
	                    headers: {
	                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
	                    },
	                    success: function (response) {
	                        if (response['result'] == 'success') {
	                            var imagePath = (response['changed'] == 1) ? "{!!url('/assets/images/publish.png')!!}" : "{!!url('/assets/images/not_publish.png')!!}";
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
        <style>
    .tab-pane{min-height:800px;height:100%;}
    </style>
@endsection

@section('bottomscripts')
 <script src="{!! asset('/clip/assets/js/page-elements.js') !!}"></script>
@endsection

@section('js_init')
CreatePage.init();
	$('.fileinput').fileinput();
	$('input#slug').attr('disabled', 'disabled');
@endsection
