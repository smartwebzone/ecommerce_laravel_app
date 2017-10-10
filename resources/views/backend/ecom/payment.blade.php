@extends('backend/layout/clip')

@section('topscripts')
	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<style type="text/css">
hr.style-one {
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}

hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}

hr.style-three {
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
}
hr.style-four {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
hr.style-five {
    border: 0;
    height: 0; /* Firefox... */
    box-shadow: 0 0 10px 1px black;
}
hr.style-five:after {  /* Not really supposed to work, but does */
    content: "\00a0";  /* Prevent margin collapse */
}


hr.style-six {
    border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

 hr.style-seven {
    height: 30px;
    border-style: solid;
    border-color: black;
    border-width: 1px 0 0 0;
    border-radius: 20px;
}
hr.style-seven:before { /* Not really supposed to work, but does */
    display: block;
    content: "";
    height: 30px;
    margin-top: -31px;
    border-style: solid;
    border-color: black;
    border-width: 0 0 1px 0;
    border-radius: 20px;
}

hr.style-eight {
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style-eight:after {
    content: "§";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}
</style>
	<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('pagetitle')
	<div class="row">
		<div class="col-sm-12">
			<!-- start: PAGE TITLE & BREADCRUMB -->
			<ol class="breadcrumb">
				<li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
				<li><a href="{!! url(getLang() . '/admin/ecom') !!}"><i class="fa fa-dashboard"></i>&nbsp; eCommerce Dashboard</a></li>
				<li class="active"> Gateways</li>
			</ol>
			<div class="page-header">
				<h1 itemprop="headline" class="pull-left">{!! trans('payment.pg') !!}</h1>
			</div>
		</div>
	</div>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-sm-12">
		{!! Form::open(['route' => 'admin.payment.config', 'method' => 'post']) !!}
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <i class="clip-stats"></i>
	                {!! trans('payment.ppgsk') !!}
	                <div class="panel-tools">
	                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
	                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
	                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
	                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
	                </div>
	            </div>
	            <div class="panel-body">
					<!-- paypal_client_id Field -->
					<div class="form-group col-sm-10 col-md-10 col-lg-10">
					{!! Form::label('paypal_client_id', trans('payment.paypal_client_id')) !!}
					{!! Form::text('paypal_client_id', null, ['class' => 'form-control']) !!}
					</div>
					<!-- paypal_secret Field -->
					<div class="form-group col-sm-10 col-md-10 col-lg-10">
					{!! Form::label('paypal_secret', trans('payment.paypal_secret')) !!}
					{!! Form::text('paypal_secret', null, ['class' => 'form-control']) !!}
					</div>

					{!! Form::submit('Click Me!') !!}
	            </div>
	        </div>


	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <i class="clip-stats"></i>
	                {!! trans('payment.sgsk') !!}
	                <div class="panel-tools">
	                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
	                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
	                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
	                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
	                </div>
	            </div>
	            <div class="panel-body">
					<!-- stripe secret key Field -->
					<div class="form-group col-sm-10 col-md-10 col-lg-10">
					{!! Form::label('stripe_secret_key', trans('payment.stripe_secret_key')) !!}
					{!! Form::text('stripe_secret_key', null, ['class' => 'form-control']) !!}
					</div>
					<!-- stripe_publishable_key Field -->
					<div class="form-group col-sm-10 col-md-10 col-lg-10">
					{!! Form::label('stripe_publishable_key', trans('payment.stripe_publishable_key')) !!}
					{!! Form::text('stripe_publishable_key', null, ['class' => 'form-control']) !!}
					</div>

					{!! Form::submit('Click Me!') !!}
				</div>
	        </div>
	    {!! Form::close() !!}
	    </div>
	</div>
</div>

@endsection

@section('bottomscripts')
		<script>
			$(document).ready(function(){
				$('.sidebar #payment').addClass('active-section');
			});
		</script>
@endsection

@section('clipinline')

@endsection
