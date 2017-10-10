<input type="hidden" name="location_type" value="dealer_location">
@if(@$dealer_id)
<input type="hidden" name="dealer_id" value="{{$dealer_id}}">
@else
<!-- Dealer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dealer', 'Dealer:') !!}
    {!! Form::select('dealer_id', $dealers, @$location->Dealers[0]->id, ['class' => 'form-control select2', 'value'=> Input::old('dealer_id'),'id'=>'dealer_id'] ) !!}
</div>
@endif
<!-- Nickname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nickname', 'Nickname:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Street Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street', 'Street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<!-- Street Additional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street_additional', 'Street Additional:') !!}
    {!! Form::text('street_additional', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>
<?php $region = @$location['region'] ?>
<!-- Region Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region', 'Region:') !!}
    <select name="region" id="region" class="form-control" >
        <option value="">Please Select...</option>
        <option <?= (@$region == 'U.S.A') ? 'selected' : '' ?> value="U.S.A">U.S.A</option>
        <option <?= (@$region == 'Europe') ? 'selected' : '' ?> value="Europe">Europe</option>
        <option <?= (@$region == 'Africa') ? 'selected' : '' ?> value="Africa">Africa</option>
        <option <?= (@$region == "Canada") ? 'selected' : '' ?> value="Canada">Canada</option>
        <option <?= (@$region == "Asia") ? 'selected' : '' ?> value="Asia">Asia</option>
        <option <?= (@$region == "South America") ? 'selected' : '' ?> value="South America">South America</option>
        <option <?= (@$region == "Australia") ? 'selected' : '' ?> value="Australia">Australia</option>
    </select>
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Product tag Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_tag', 'Product tag:') !!}
    {!! Form::text('product_tag', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>
<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.locations.index') !!}" class="btn btn-default">Cancel</a>
</div>