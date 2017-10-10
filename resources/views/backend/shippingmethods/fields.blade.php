<!-- Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('id')? 'has-error' : '' }}">
    {!! Form::label('id', 'Id:', ['class' => 'control-label']) !!}
    {!! Form::text('id', null, ['class' => 'form-control', 'value' => old('id')]) !!}
    {!! $errors->has('id')? '<p class="help-block"> '.$errors->first('id').' </p>':'' !!}
    <small></small>
</div>

<!-- Id Field -->
<div class="form-group {{ $errors->has('id')? 'has-error' : '' }}">
    {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('id', null, ['class' => 'form-control', 'value' => old('id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('id')? '<p class="help-block"> '.$errors->first('id').' </p>':'' !!}
</div>

<!-- Access Key Field -->
<div class="form-group col-sm-6 {{ $errors->has('access_key')? 'has-error' : '' }}">
    {!! Form::label('access_key', 'Access Key:', ['class' => 'control-label']) !!}
    {!! Form::text('access_key', null, ['class' => 'form-control', 'value' => old('access_key')]) !!}
    {!! $errors->has('access_key')? '<p class="help-block"> '.$errors->first('access_key').' </p>':'' !!}
    <small></small>
</div>

<!-- Access Key Field -->
<div class="form-group {{ $errors->has('access_key')? 'has-error' : '' }}">
    {!! Form::label('access_key', 'Access Key:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('access_key', null, ['class' => 'form-control', 'value' => old('access_key')]) !!}
    <small></small>
    </div>
    {!! $errors->has('access_key')? '<p class="help-block"> '.$errors->first('access_key').' </p>':'' !!}
</div>

<!-- Ups Username Field -->
<div class="form-group col-sm-6 {{ $errors->has('ups_username')? 'has-error' : '' }}">
    {!! Form::label('ups_username', 'Ups Username:', ['class' => 'control-label']) !!}
    {!! Form::text('ups_username', null, ['class' => 'form-control', 'value' => old('ups_username')]) !!}
    {!! $errors->has('ups_username')? '<p class="help-block"> '.$errors->first('ups_username').' </p>':'' !!}
    <small></small>
</div>

<!-- Ups Username Field -->
<div class="form-group {{ $errors->has('ups_username')? 'has-error' : '' }}">
    {!! Form::label('ups_username', 'Ups Username:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('ups_username', null, ['class' => 'form-control', 'value' => old('ups_username')]) !!}
    <small></small>
    </div>
    {!! $errors->has('ups_username')? '<p class="help-block"> '.$errors->first('ups_username').' </p>':'' !!}
</div>

<!-- Ups Password Field -->
<div class="form-group col-sm-6 {{ $errors->has('ups_password')? 'has-error' : '' }}">
    {!! Form::label('ups_password', 'Ups Password:', ['class' => 'control-label']) !!}
    {!! Form::password('ups_password', ['class' => 'form-control']) !!}
    {!! $errors->has('ups_password')? '<p class="help-block"> '.$errors->first('ups_password').' </p>':'' !!}
</div>

<!-- Ups Password Field -->
<div class="form-group col-sm-6 {{ $errors->has('password_confirmation')? 'has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Ups Password Confirm:', ['class' => 'control-label']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    {!! $errors->has('password_confirmation')? '<p class="help-block"> '.$errors->first('password_confirmation').' </p>':'' !!}
</div>


<!-- Ups Password Field -->
<div class="form-group{{ $errors->has('ups_password')? 'has-error' : '' }}">
    {!! Form::label('ups_password', 'Ups Password:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::password('ups_password', ['class' => 'form-control']) !!}
    </div>
    {!! $errors->has('ups_password')? '<p class="help-block"> '.$errors->first('ups_password').' </p>':'' !!}
</div>

<!-- Ups Password Field -->
<div class="form-group{{ $errors->has('password_confirmation')? 'has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Ups Password Confirm:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
    {!! $errors->has('password_confirmation')? '<p class="help-block"> '.$errors->first('password_confirmation').' </p>':'' !!}
</div>


<!-- Method Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('method_title')? 'has-error' : '' }}">
    {!! Form::label('method_title', 'Method Title:', ['class' => 'control-label']) !!}
    {!! Form::text('method_title', null, ['class' => 'form-control', 'value' => old('method_title')]) !!}
    {!! $errors->has('method_title')? '<p class="help-block"> '.$errors->first('method_title').' </p>':'' !!}
    <small></small>
</div>

<!-- Method Title Field -->
<div class="form-group {{ $errors->has('method_title')? 'has-error' : '' }}">
    {!! Form::label('method_title', 'Method Title:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('method_title', null, ['class' => 'form-control', 'value' => old('method_title')]) !!}
    <small></small>
    </div>
    {!! $errors->has('method_title')? '<p class="help-block"> '.$errors->first('method_title').' </p>':'' !!}
</div>

<!-- Account Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('account_number')? 'has-error' : '' }}">
    {!! Form::label('account_number', 'Account Number:', ['class' => 'control-label']) !!}
    {!! Form::text('account_number', null, ['class' => 'form-control', 'value' => old('account_number')]) !!}
    {!! $errors->has('account_number')? '<p class="help-block"> '.$errors->first('account_number').' </p>':'' !!}
    <small></small>
</div>

<!-- Account Number Field -->
<div class="form-group {{ $errors->has('account_number')? 'has-error' : '' }}">
    {!! Form::label('account_number', 'Account Number:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('account_number', null, ['class' => 'form-control', 'value' => old('account_number')]) !!}
    <small></small>
    </div>
    {!! $errors->has('account_number')? '<p class="help-block"> '.$errors->first('account_number').' </p>':'' !!}
</div>

<!-- Delivery Confirmation Field -->
<div class="form-group col-sm-6 {{ $errors->has('delivery_confirmation')? 'has-error' : '' }}">
    {!! Form::label('delivery_confirmation', 'Delivery Confirmation:', ['class' => 'control-label']) !!}
    {!! Form::select('delivery_confirmation', ['' => '', 'none' => 'No Signature Required', 'regular' => 'Signature Required', 'adult' => 'Adult Signature Required'], null, ['class' => 'form-control']) !!}
    {!! $errors->has('delivery_confirmation')? '<p class="help-block"> '.$errors->first('delivery_confirmation').' </p>':'' !!}
</div>

<!-- Dc Per Package Price Field -->
<div class="form-group col-sm-6 {{ $errors->has('dc_per_package_price')? 'has-error' : '' }}">
    {!! Form::label('dc_per_package_price', 'Dc Per Package Price:', ['class' => 'control-label']) !!}
    {!! Form::text('dc_per_package_price', null, ['class' => 'form-control', 'value' => old('dc_per_package_price')]) !!}
    {!! $errors->has('dc_per_package_price')? '<p class="help-block"> '.$errors->first('dc_per_package_price').' </p>':'' !!}
    <small></small>
</div>

<!-- Dc Per Package Price Field -->
<div class="form-group {{ $errors->has('dc_per_package_price')? 'has-error' : '' }}">
    {!! Form::label('dc_per_package_price', 'Dc Per Package Price:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('dc_per_package_price', null, ['class' => 'form-control', 'value' => old('dc_per_package_price')]) !!}
    <small></small>
    </div>
    {!! $errors->has('dc_per_package_price')? '<p class="help-block"> '.$errors->first('dc_per_package_price').' </p>':'' !!}
</div>

<!-- Pickup Type Field -->
<div class="form-group col-sm-6 {{ $errors->has('pickup_type')? 'has-error' : '' }}">
    {!! Form::label('pickup_type', 'Pickup Type:', ['class' => 'control-label']) !!}
    {!! Form::select('pickup_type', ['' => '', '01' => 'Daily Pickup', '03' => 'Customer Counter', '06' => 'One Time Pickup', '07' => 'On Call Air', '19' => 'Letter Center', '20' => 'Air Service Center'], null, ['class' => 'form-control']) !!}
    {!! $errors->has('pickup_type')? '<p class="help-block"> '.$errors->first('pickup_type').' </p>':'' !!}
</div>

<!-- Price Adjustment Flat Field -->
<div class="form-group col-sm-6 {{ $errors->has('price_adjustment_flat')? 'has-error' : '' }}">
    {!! Form::label('price_adjustment_flat', 'Price Adjustment Flat:', ['class' => 'control-label']) !!}
    {!! Form::text('price_adjustment_flat', null, ['class' => 'form-control', 'value' => old('price_adjustment_flat')]) !!}
    {!! $errors->has('price_adjustment_flat')? '<p class="help-block"> '.$errors->first('price_adjustment_flat').' </p>':'' !!}
    <small></small>
</div>

<!-- Price Adjustment Flat Field -->
<div class="form-group {{ $errors->has('price_adjustment_flat')? 'has-error' : '' }}">
    {!! Form::label('price_adjustment_flat', 'Price Adjustment Flat:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('price_adjustment_flat', null, ['class' => 'form-control', 'value' => old('price_adjustment_flat')]) !!}
    <small></small>
    </div>
    {!! $errors->has('price_adjustment_flat')? '<p class="help-block"> '.$errors->first('price_adjustment_flat').' </p>':'' !!}
</div>

<!-- Price Adjustment Percent Field -->
<div class="form-group col-sm-6 {{ $errors->has('price_adjustment_percent')? 'has-error' : '' }}">
    {!! Form::label('price_adjustment_percent', 'Price Adjustment Percent:', ['class' => 'control-label']) !!}
    {!! Form::text('price_adjustment_percent', null, ['class' => 'form-control', 'value' => old('price_adjustment_percent')]) !!}
    {!! $errors->has('price_adjustment_percent')? '<p class="help-block"> '.$errors->first('price_adjustment_percent').' </p>':'' !!}
    <small></small>
</div>

<!-- Price Adjustment Percent Field -->
<div class="form-group {{ $errors->has('price_adjustment_percent')? 'has-error' : '' }}">
    {!! Form::label('price_adjustment_percent', 'Price Adjustment Percent:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('price_adjustment_percent', null, ['class' => 'form-control', 'value' => old('price_adjustment_percent')]) !!}
    <small></small>
    </div>
    {!! $errors->has('price_adjustment_percent')? '<p class="help-block"> '.$errors->first('price_adjustment_percent').' </p>':'' !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6 {{ $errors->has('weight')? 'has-error' : '' }}">
    {!! Form::label('weight', 'Weight:', ['class' => 'control-label']) !!}
    {!! Form::number('weight', null, ['class' => 'form-control', 'value' => old('weight')]) !!}
    {!! $errors->has('weight')? '<p class="help-block"> '.$errors->first('weight').' </p>':'' !!}
</div>


<!-- Measurement Field -->
<div class="form-group col-sm-6 {{ $errors->has('measurement')? 'has-error' : '' }}">
    {!! Form::label('measurement', 'Measurement:', ['class' => 'control-label']) !!}
    {!! Form::number('measurement', null, ['class' => 'form-control', 'value' => old('measurement')]) !!}
    {!! $errors->has('measurement')? '<p class="help-block"> '.$errors->first('measurement').' </p>':'' !!}
</div>


<!-- Box Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('box_id')? 'has-error' : '' }}">
    {!! Form::label('box_id', 'Box Id:', ['class' => 'control-label']) !!}
    {!! Form::text('box_id', null, ['class' => 'form-control', 'value' => old('box_id')]) !!}
    {!! $errors->has('box_id')? '<p class="help-block"> '.$errors->first('box_id').' </p>':'' !!}
    <small></small>
</div>

<!-- Box Id Field -->
<div class="form-group {{ $errors->has('box_id')? 'has-error' : '' }}">
    {!! Form::label('box_id', 'Box Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('box_id', null, ['class' => 'form-control', 'value' => old('box_id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('box_id')? '<p class="help-block"> '.$errors->first('box_id').' </p>':'' !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('product_id')? 'has-error' : '' }}">
    {!! Form::label('product_id', 'Product Id:', ['class' => 'control-label']) !!}
    {!! Form::text('product_id', null, ['class' => 'form-control', 'value' => old('product_id')]) !!}
    {!! $errors->has('product_id')? '<p class="help-block"> '.$errors->first('product_id').' </p>':'' !!}
    <small></small>
</div>

<!-- Product Id Field -->
<div class="form-group {{ $errors->has('product_id')? 'has-error' : '' }}">
    {!! Form::label('product_id', 'Product Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('product_id', null, ['class' => 'form-control', 'value' => old('product_id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('product_id')? '<p class="help-block"> '.$errors->first('product_id').' </p>':'' !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('location_id')? 'has-error' : '' }}">
    {!! Form::label('location_id', 'Location Id:', ['class' => 'control-label']) !!}
    {!! Form::text('location_id', null, ['class' => 'form-control', 'value' => old('location_id')]) !!}
    {!! $errors->has('location_id')? '<p class="help-block"> '.$errors->first('location_id').' </p>':'' !!}
    <small></small>
</div>

<!-- Location Id Field -->
<div class="form-group {{ $errors->has('location_id')? 'has-error' : '' }}">
    {!! Form::label('location_id', 'Location Id:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('location_id', null, ['class' => 'form-control', 'value' => old('location_id')]) !!}
    <small></small>
    </div>
    {!! $errors->has('location_id')? '<p class="help-block"> '.$errors->first('location_id').' </p>':'' !!}
</div>


<div style="clear:both"></div>

{{-- <div class="well"> --}}
 <hr style="clear:both" />


            <div class="col-md-12 text-center form-table">
                <h1>UPS BOX FORM</h1>
                <p class="lead">Repeating row</p>
                    <table class="ups_boxes widefat table table-stripedtable-condensed table-hover">
                        <thead>
                            <tr>
                                <th class="check-column"><input type="checkbox"></th>
                                <th>Outer Length</th>
                                <th>Outer Width</th>
                                <th>Outer Height</th>
                                <th>Inner Length</th>
                                <th>Inner Width</th>
                                <th>Inner Height</th>
                                <th>Weight of Box</th>
                                <th>Max Weight</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="4">
                                    <a href="#" class="btn btn-primary button plus insert">Add Box</a>
                                    <a href="#" class="btn btn-warning button minus remove">Remove selected box(es)</a>
                                </th>
                                <th colspan="6">
                                    <small class="description">Items will be packed into these boxes depending based on item dimensions and volume. Outer dimensions will be passed to UPS, whereas inner dimensions will be used for packing. Items not fitting into boxes will be packed individually.</small>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody id="rates">
                            <tr class="new">
                                <td class="check-column"><input type="checkbox"></td>
                                <td class="text-center"><input type="text" size="" name="outer_length[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="outer_width[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="outer_height[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="inner_length[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="inner_width[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="inner_height[0]">IN</td>
                                <td class="text-center"><input type="text" size="" name="box_weight[0]">LBS</td>
                                <td class="text-center"><input type="text" size="" name="max_weight[0]">LBS</td>
                            </tr>
                        </tbody>
                    </table>

            </div>






{{-- </div> --}}



<div style="clear:both"></div>
</div>

<hr style="clear:both" />



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.shippingmethods.index') !!}" class="btn btn-default">Cancel</a>
</div>


