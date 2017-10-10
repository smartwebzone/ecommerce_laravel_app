<div class="col-md-12">

@include('backend.ecom.products.partials.productvariants')
@include('backend.ecom.products.partials.productoptions')

<!-- add_to_googlefeed Field -->
<div class="form-group col-sm-2 hide">
    {!! Form::label('add_to_googlefeed', 'add_to_googlefeed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('add_to_googlefeed', false) !!}
        {!! Form::checkbox('add_to_googlefeed', '1', null) !!} 1
    </label>
</div>

<!-- Google Category Field -->
	<div class="form-group col-sm-6 hide">
		{!! Form::label('google_category_code', 'Google Category Code:') !!}
		{!! Form::text('google_category_code', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Google Category Field -->
	<div class="form-group col-sm-6 hide">
		{!! Form::label('google_category', 'Google Category:') !!}
		{!! Form::text('google_category', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Google Type Field -->
	<div class="form-group col-sm-6 hide">
		{!! Form::label('google_type', 'Google Type:') !!}
		{!! Form::text('google_type', null, ['class' => 'form-control']) !!}
	</div>
	<div style="clear:both"></div>
</div>

@if($app->environment('local'))
	<script> if( window.console && window.console.log ) {
			console.log("%c Additional-Fields.blade.php", 'background: #222; color: yellow', "loaded");
		}
	</script>
@endif
