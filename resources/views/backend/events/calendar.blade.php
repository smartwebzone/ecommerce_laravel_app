@extends('backend/layout/events')

@section('topcss')
	<link href="{!! asset('/clip/bower_components/bootstrap-modal/css/bootstrap-modal-bs3patch.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/bootstrap-modal/css/bootstrap-modal.css') !!}" rel="stylesheet" />
	<link href="{!! asset('/clip/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}" rel="stylesheet" />
@endsection

@section('topjs')@endsection

@section('topscripts')
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
				<li><a href="{!! url(getLang(). '/admin/project') !!}"><i class="fa fa-date"></i> Events </a></li>
				<li class="active"> Calendar </li>
			</ol>
			<div class="page-header">
				<h1>Calendar <small> | with draggable and editable events </small></h1>
			</div>
			<!-- end: PAGE TITLE & BREADCRUMB -->
		</div>
	</div>
@endsection

@section('content')
	{{-- <div class="container-fluid"> --}}
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-calendar"></i> Events Calendar
					<div class="panel-tools">
						<a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
						<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
						<a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
						<a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
					</div>
				</div>
				<div class="panel-body">

					<div class="panel-body">
						<div class="col-sm-9">
							<div id='calendar'></div>
						</div>
						<div class="col-sm-3">
							<h4>Draggable categories</h4>
							<div id="event-categories">
								<div class="event-category label-green" data-class="label-green">
									<i class="fa fa-move"></i> Home
								</div>
								<div class="event-category label-default" data-class="label-default">
									<i class="fa fa-move"></i> Work
								</div>
								<div class="event-category label-purple" data-class="label-purple">
									<i class="fa fa-move"></i> Holidays
								</div>
								<div class="event-category label-orange" data-class="label-orange">
									<i class="fa fa-move"></i> Party
								</div>
								<div class="event-category label-yellow" data-class="label-yellow">
									<i class="fa fa-move"></i> Birthday
								</div>
								<div class="event-category label-teal" data-class="label-teal">
									<i class="fa fa-move"></i> Generic
								</div>
								<div class="event-category label-beige" data-class="label-beige">
									<i class="fa fa-move"></i> To Do
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" class="grey" id="drop-remove" />
										Remove after drop
									</label>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	{{-- </div> --}}
@endsection

@section('eventmodal')
	<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title">Event Management</h4>
		</div>
		<div class="modal-body"></div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-light-grey">
				Close
			</button>
			<button type="button" class="btn btn-danger remove-event no-display">
				<i class='fa fa-trash-o'></i> Delete Event
			</button>
			<button type='submit' class='btn btn-success save-event'>
				<i class='fa fa-check'></i> Save
			</button>
		</div>
	</div>
@endsection

@section('bottomscripts')
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="{!! asset('/clip/bower_components/moment/min/moment.min.js') !!}"></script>
	<script src="{!! asset('/clip/bower_components/bootstrap-modal/js/bootstrap-modal.js') !!}"></script>
	<script src="{!! asset('/clip/bower_components/bootstrap-modal/js/bootstrap-modalmanager.js') !!}"></script>
	<script src="{!! asset('/clip/assets/plugin/jquery-ui.custom.min.js') !!}"></script>
	<script src="{!! asset('/clip/bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js') !!}"></script>
	<script src="{!! asset('/clip/bower_components/fullcalendar/dist/fullcalendar.min.js') !!}"></script>
	<script src="{!! asset('/clip/assets/js/min/form-calendar.min.js') !!}"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('js_init')
	Calendar.init();
@endsection

@section('clipinline')@endsection
