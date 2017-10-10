<!-- Id Field -->
<!--<div class="form-group col-md-6">
    {!! Form::label('id', 'Id ') !!}
    <span>{!! $dealer->id !!}</span>
</div>-->

<!-- Dealer Field -->
<style>
    
    .profile-view label{
        font-weight:bold;
        border-right: 1px solid lightgrey;
        width: 45%;
    }
    .profile-view .form-group{
        border: 1px solid lightgrey;
    }
</style>
<div class="profile-view">
<div class="form-group col-md-6">
    {!! Form::label('dealer', 'Dealer ') !!}
    <span>{!! $dealer->dealer !!}</span>
</div>

<!-- Contact Person Field -->
<div class="form-group col-md-6">
    {!! Form::label('contact_person', 'Contact Person ') !!}
    <span>{!! $dealer->contact_person !!}</span>
</div>

<!-- Mobile Field -->
<div class="form-group col-md-6">
    {!! Form::label('mobile', 'Mobile ') !!}
    <span>{!! $dealer->mobile !!}</span>
</div>

<!-- Phone Field -->
<div class="form-group col-md-6">
    {!! Form::label('phone', 'Phone ') !!}
    <span>{!! $dealer->phone !!}</span>
</div>

<!-- Hours Opening Mf Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_opening_mf', 'Hours Opening Mf ') !!}
    <span>{!! $dealer->hours_opening_mf !!}</span>
</div>

<!-- Hours Closing Mf Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_closing_mf', 'Hours Closing Mf ') !!}
    <span>{!! $dealer->hours_closing_mf !!}</span>
</div>

<!-- Hours Opening Sat Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_opening_sat', 'Hours Opening Sat ') !!}
    <span>{!! $dealer->hours_opening_sat !!}</span>
</div>

<!-- Hours Closing Sat Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_closing_sat', 'Hours Closing Sat ') !!}
    <span>{!! $dealer->hours_closing_sat !!}</span>
</div>

<!-- Hours Opening Sun Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_opening_sun', 'Hours Opening Sun ') !!}
    <span>{!! $dealer->hours_opening_sun !!}</span>
</div>

<!-- Hours Closing Sun Field -->
<div class="form-group col-md-6">
    {!! Form::label('hours_closing_sun', 'Hours Closing Sun ') !!}
    <span>{!! $dealer->hours_closing_sun !!}</span>
</div>

<!-- Company Phone Field -->
<div class="form-group col-md-6">
    {!! Form::label('company_phone', 'Company Phone ') !!}
    <span>{!! $dealer->company_phone !!}</span>
</div>

<!-- Toll Free Field -->
<div class="form-group col-md-6">
    {!! Form::label('toll_free', 'Toll Free ') !!}
    <span>{!! $dealer->toll_free !!}</span>
</div>

<!-- Public Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('public_email', 'Public Email ') !!}
    <span>{!! $dealer->public_email !!}</span>
</div>

<!-- Support Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('support_email', 'Support Email ') !!}
    <span>{!! $dealer->support_email !!}</span>
</div>
<div class="form-group col-md-12">
    {!! Form::label('Shipping', 'Shipping ') !!}
</div>
 @foreach($ownshipping as $os)
<!-- Public Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('public_email', $os->account) !!}
    <span>{{ $os->number }}</span>
</div>

@endforeach
</div>
<!-- Location Id Field -->
    <!--<div class="form-group col-md-12">
        {!! Form::label('location_id', 'Location Id ') !!}
        <span>{!! $dealer->location_id !!}</span>
    </div>-->
</div>

