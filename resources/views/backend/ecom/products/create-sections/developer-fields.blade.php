
<div class="well">
    <!-- Tracking Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tracking', 'Tracking:') !!}
        {!! Form::text('tracking', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Datalayer Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('datalayer', 'Datalayer:') !!}
        {!! Form::text('datalayer', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Datalayer Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('notes', 'Notes:') !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
    </div>





<br style="clear:both" />
</div>



@if($app->environment('local'))
    <script> if( window.console && window.console.log ) {
            console.log("%c Developer-Fields.blade.php", 'background: #222; color: yellow', "loaded");
        }
    </script>
@endif