<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'value' => old('name'),'required' => true]) !!}
        @if ($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control','value' => old('phone'),'required' => true]) !!}
        @if ($errors->has('phone'))
        <div class="error">{{ $errors->first('phone') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control','value' => old('email'),'required' => true]) !!}
        @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('contact_person', 'Contact Person:') !!}
        {!! Form::text('contact_person', null, ['class' => 'form-control','value' => old('contact_person'),'required' => true]) !!}
        @if ($errors->has('contact_person'))
        <div class="error">{{ $errors->first('contact_person') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('address1', 'Address 1:') !!}
        {!! Form::text('address1', null, ['class' => 'form-control','value' => old('address1'),'required' => true]) !!}
        @if ($errors->has('address1'))
        <div class="error">{{ $errors->first('address1') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('address2', 'Address 2:') !!}
        {!! Form::text('address2', null, ['class' => 'form-control','value' => old('address2')]) !!}
        @if ($errors->has('address2'))
        <div class="error">{{ $errors->first('address2') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('area', 'Area:') !!}
        {!! Form::text('area', null, ['class' => 'form-control','value' => old('area'),'required' => true]) !!}
        @if ($errors->has('area'))
        <div class="error">{{ $errors->first('area') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, ['class' => 'form-control','value' => old('city'),'required' => true]) !!}
        @if ($errors->has('city'))
        <div class="error">{{ $errors->first('city') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'State:') !!}
        {!! Form::select('state', $state, null, array('class' => 'form-control', 'value'=>Input::old('state'))) !!}
        @if ($errors->has('state'))
        <div class="error">{{ $errors->first('state') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('zip', 'Zip:') !!}
        {!! Form::text('zip', null, ['class' => 'form-control','value' => old('zip'),'required' => true]) !!}
        @if ($errors->has('zip'))
        <div class="error">{{ $errors->first('zip') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('payment_gateway', 'Payment Gateway:') !!}
        {!! Form::text('payment_gateway', null, ['class' => 'form-control','value' => old('payment_gateway')]) !!}
        @if ($errors->has('payment_gateway'))
        <div class="error">{{ $errors->first('payment_gateway') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('payment_gateway_key', 'Payment Gateway Key:') !!}
        {!! Form::text('payment_gateway_key', null, ['class' => 'form-control','value' => old('payment_gateway_key')]) !!}
        @if ($errors->has('payment_gateway_key'))
        <div class="error">{{ $errors->first('payment_gateway_key') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('gstn', 'GSTN:') !!}
        {!! Form::text('gstn', null, ['class' => 'form-control', 'value' => old('gstn'),'required' => true]) !!}
        @if ($errors->has('gstn'))
        <div class="error">{{ $errors->first('gstn') }}</div>
        @endif
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('status', 'Status:') !!}
        <label class="checkbox">
            {!! Form::checkbox('status', 1, (isset($company->status))?$company->status:true,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('status')]) !!}
        </label>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
        <a href="{!! route('admin.company') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
