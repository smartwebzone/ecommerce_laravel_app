<div class="col-md-6">
    <h3>Billing Address</h3>
    {!! Form::hidden('billing_id', @$billing['id']) !!}
    <div class="col_half {{ $errors->has('billing-form-name')? 'has-error' : '' }}">
        <label for="billing-form-name">First Name:</label>
        <input type="text" id="billing-form-name" name="billing-form-name" value="{{(old('billing-form-name'))?old('billing-form-name'):@$billing['first_name']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-name')? '
        <p class="errormsg"> '.$errors->first('billing-form-name').' </p>
        ':'' !!}

    </div>

    <div class="col_half col_last {{ $errors->has('billing-form-lname')? 'has-error' : '' }}">
        <label for="billing-form-lname">Last Name:</label>
        <input type="text" id="billing-form-lname" name="billing-form-lname" value="{{(old('billing-form-lname'))?old('billing-form-lname'):@$billing['last_name']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-lname')? '
        <p class="errormsg"> '.$errors->first('billing-form-lname').' </p>
        ':'' !!}

    </div>

    <div class="clear"></div>

    <div class="col_full {{ $errors->has('billing-form-companyname')? 'has-error' : '' }}">
        <label for="billing-form-companyname">Company Name:</label>
        <input type="text" id="billing-form-companyname" name="billing-form-companyname" value="{{(old('billing-form-companyname'))?old('billing-form-companyname'):@$billing['company']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-companyname')? '<p class="errormsg"> '.$errors->first('billing-form-companyname').' </p> ':'' !!}
    </div>

    <div class="col_full {{ $errors->has('billing-form-address')? 'has-error' : '' }}">
        <label for="billing-form-address">Address:</label>
        <input type="text" id="billing-form-address" name="billing-form-address" value="{{(old('billing-form-address'))?old('billing-form-address'):@$billing['address']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-address')? '<p class="errormsg"> '.$errors->first('billing-form-address').' </p> ':'' !!}
    </div>

    <div class="col_full">
        <input type="text" id="billing-form-street" name="billing-form-street" value="{{(old('billing-form-street'))?old('billing-form-street'):@$billing['street']}}" class="sm-form-control" />
    </div>

    <div class="col_half  {{ $errors->has('billing-form-city')? 'has-error' : '' }}">
        <label for="billing-form-city">City / Town</label>
        <input type="text" id="billing-form-city" name="billing-form-city" value="{{(old('billing-form-city'))?old('billing-form-city'):@$billing['city']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-city')? '<p class="errormsg"> '.$errors->first('billing-form-city').' </p> ':'' !!}
    </div>
    <div class="col_half col_last {{ $errors->has('billing-form-state')? 'has-error' : '' }}">
        <label for="billing-form-state">State</label>
        {!! Form::select('billing-form-state', getStates(), (!empty(old('billing-form-state'))?old('billing-form-state'):@$billing['state']), ['id' => 'billing-form-state','class' => 'sm-form-control']) !!}
        {!! $errors->has('billing-form-state')? '
        <p class="errormsg"> '.$errors->first('billing-form-state').' </p>
        ':'' !!}
    </div>
    <div class="col_half  {{ $errors->has('billing-form-country')? 'has-error' : '' }}">
        <label for="billing-form-country">Country</label>
        <input type="text" id="billing-form-country" name="billing-form-country" value="{{(old('billing-form-country'))?old('billing-form-country'):@$billing['country']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-country')? '<p class="errormsg"> '.$errors->first('billing-form-country').' </p> ':'' !!}
    </div>
    <div class="col_half col_last  {{ $errors->has('billing-form-zipcode')? 'has-error' : '' }}">
        <label for="billing-form-zipcode">Zipcode</label>
        <input type="text" id="billing-form-zipcode" name="billing-form-zipcode" value="{{(old('billing-form-zipcode'))?old('billing-form-zipcode'):@$billing['zipcode']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-zipcode')? '<p class="errormsg"> '.$errors->first('billing-form-zipcode').' </p> ':'' !!} </div>
    <div class="clear"></div>

    <div class="col_half {{ $errors->has('billing-form-email')? 'has-error' : '' }}">
        <label for="billing-form-email">Email Address:</label>
        <input type="email" id="billing-form-email" name="billing-form-email" value="{{(old('billing-form-email'))?old('billing-form-email'):@$billing['email']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-email')? '<p class="errormsg"> '.$errors->first('billing-form-email').' </p> ':'' !!}
    </div>

    <div class="col_half col_last {{ $errors->has('billing-form-phone')? 'has-error' : '' }}">
        <label for="billing-form-phone">Phone:</label>
        <input type="text" id="billing-form-phone" name="billing-form-phone" value="{{(old('billing-form-phone'))?old('billing-form-phone'):@$billing['phone']}}" class="sm-form-control" />
        {!! $errors->has('billing-form-phone')? '<p class="errormsg"> '.$errors->first('billing-form-phone').' </p> ':'' !!}
    </div>

</div>
<div class="col-md-6">
    <h3 class="">Shipping Address <span style="float: right; font-size:14px;"><input type="checkbox" name="copy" id="copy" onclick="copyData($(this))"> Same As Billing</span></h3>

    {!! Form::hidden('shipping_id', @$shipping['id']) !!}
    <div class="col_half {{ $errors->has('shipping-form-name')? 'has-error' : '' }}">
        <label for="shipping-form-name">First Name:</label>
        <input type="text" id="shipping-form-name" name="shipping-form-name" value="{{(old('shipping-form-name'))?old('shipping-form-name'):@$shipping['first_name']}}" class="sm-form-control" />

        {!! $errors->has('shipping-form-name')? '<p class="errormsg"> '.$errors->first('shipping-form-name').' </p> ':'' !!}
    </div>


    <div class="col_half col_last  {{ $errors->has('shipping-form-lname')? 'has-error' : '' }}">
        <label for="shipping-form-lname">Last Name:</label>
        <input type="text" id="shipping-form-lname" name="shipping-form-lname" value="{{(old('shipping-form-lname'))?old('shipping-form-lname'):@$shipping['last_name']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-lname')? '<p class="errormsg"> '.$errors->first('shipping-form-lname').' </p> ':'' !!}
    </div>

    <div class="clear"></div>

    <div class="col_full {{ $errors->has('shipping-form-companyname')? 'has-error' : '' }}">
        <label for="shipping-form-companyname">Company Name:</label>
        <input type="text" id="shipping-form-companyname" name="shipping-form-companyname" value="{{(old('shipping-form-companyname'))?old('shipping-form-companyname'):@$shipping['company']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-companyname')? '<p class="errormsg"> '.$errors->first('shipping-form-companyname').' </p> ':'' !!}
    </div>

    <div class="col_full {{ $errors->has('shipping-form-address')? 'has-error' : '' }}">
        <label for="shipping-form-address">Address:</label>
        <input type="text" id="shipping-form-address" name="shipping-form-address" value="{{(old('shipping-form-address'))?old('shipping-form-address'):@$shipping['address']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-address')? '<p class="errormsg"> '.$errors->first('shipping-form-address').' </p> ':'' !!}
    </div>

    <div class="col_full">
        <input type="text" id="shipping-form-street" name="shipping-form-street" value="{{(old('shipping-form-street'))?old('shipping-form-street'):@$shipping['street']}}" class="sm-form-control" />
    </div>

    <div class="col_half {{ $errors->has('shipping-form-city')? 'has-error' : '' }}">
        <label for="shipping-form-city">City / Town</label>
        <input  type="text" id="shipping-form-city" name="shipping-form-city" value="{{(old('shipping-form-city'))?old('shipping-form-city'):@$shipping['city']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-city')? '<p class="errormsg"> '.$errors->first('shipping-form-city').' </p> ':'' !!}
    </div>
    <div class="col_half col_last {{ $errors->has('shipping-form-state')? 'has-error' : '' }}">
        <label for="shipping-form-state">State</label>
        {!! Form::select('shipping-form-state', getStates(), (!empty(old('shipping-form-state'))?old('shipping-form-state'):@$shipping['state']), ['id' => 'shipping-form-state','class' => 'sm-form-control']) !!}
        {!! $errors->has('shipping-form-state')? '
        <p class="errormsg"> '.$errors->first('shipping-form-state').' </p>
        ':'' !!}
    </div>
    <div class="col_half {{ $errors->has('shipping-form-country')? 'has-error' : '' }}">
        <label for="shipping-form-country">Country</label>
        <input type="text" id="shipping-form-country" name="shipping-form-country" value="{{(old('shipping-form-country'))?old('shipping-form-country'):@$shipping['country']}}" class="sm-form-control" />

        {!! $errors->has('shipping-form-country')? '<p class="errormsg"> '.$errors->first('shipping-form-country').' </p> ':'' !!}
    </div>
    <div class="col_half col_last {{ $errors->has('shipping-form-zipcode')? 'has-error' : '' }}">
        <label for="shipping-form-zipcode">Zipcode</label>
        <input type="text" id="shipping-form-zipcode" name="shipping-form-zipcode" value="{{(old('shipping-form-zipcode'))?old('shipping-form-zipcode'):@$shipping['zipcode']}}" class="sm-form-control" />

        {!! $errors->has('shipping-form-zipcode')? '<p class="errormsg"> '.$errors->first('shipping-form-zipcode').' </p> ':'' !!}
    </div>
    <div class="clear"></div>


    <div class="col_half {{ $errors->has('shipping-form-email')? 'has-error' : '' }}">
        <label for="shipping-form-email">Email Address:</label>
        <input type="email" id="shipping-form-email" name="shipping-form-email" value="{{(old('shipping-form-email'))?old('shipping-form-email'):@$shipping['email']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-email')? '<p class="errormsg"> '.$errors->first('shipping-form-email').' </p> ':'' !!}
    </div>

    <div class="col_half col_last {{ $errors->has('shipping-form-phone')? 'has-error' : '' }}">
        <label for="shipping-form-phone">Phone:</label>
        <input type="text" id="shipping-form-phone" name="shipping-form-phone" value="{{(old('shipping-form-phone'))?old('shipping-form-phone'):@$shipping['phone']}}" class="sm-form-control" />
        {!! $errors->has('shipping-form-phone')? '<p class="errormsg"> '.$errors->first('shipping-form-phone').' </p> ':'' !!}
    </div>
</div>
<button type="submit" class="button button-3d fright">SUBMIT</button>
<script>
    function copyData($this) {
        if ($this.prop('checked')) {
            copyBilling();
        } else {
            shippingReset();
        }
    }
    function copyBilling() {
        $("input[name^='billing-form'],select[name^='billing-form']").each(function () {
            $("[name='" + $(this).attr('name').replace('billing', 'shipping') + "']").val($(this).val());
        });
    }
    function shippingReset() {
        $("input[name^='shipping-form'],select[name^='shipping-form']").each(function () {
            $(this).val($(this).prop("defaultValue"));
        });
    }
</script>
