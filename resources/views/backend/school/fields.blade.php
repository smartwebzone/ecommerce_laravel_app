<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}

</div>


<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','value' => old('phone'),'required' => true]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','value' => old('email'),'required' => true]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', 'Contact Person:') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control','value' => old('contact_person'),'required' => true]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address1', 'Address 1:') !!}
    {!! Form::text('address1', null, ['class' => 'form-control','value' => old('address1'),'required' => true]) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address2', 'Address 2:') !!}
    {!! Form::text('address2', null, ['class' => 'form-control','value' => old('address2')]) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::text('area', null, ['class' => 'form-control','value' => old('area'),'required' => true]) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control','value' => old('city'),'required' => true]) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $state, null, array('class' => 'form-control', 'value'=>Input::old('state'),'required' => true)) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::text('zip', null, ['class' => 'form-control','value' => old('zip'),'required' => true]) !!}
</div>

<!-- Show on Shop page Field -->
<div class="form-group col-sm-2">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox">
        {!! Form::checkbox('status', 1, (isset($school->status))?$school->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
    <a href="{!! route('admin.school') !!}" class="btn btn-default">Cancel</a>
</div>
