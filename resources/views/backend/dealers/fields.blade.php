<br style="clear:both" />
<br style="clear:both" />
<div class="col-sm-12">
    <!-- Dealer Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('dealer', 'Dealer:') !!}
        {!! Form::text('dealer', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Contact Person Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contact_person', 'Contact Person:') !!}
        {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group col-sm-12">
        <!-- Tag -->
        {!! Form::label('tag', 'Tags:', ['class' => 'control-label']) !!}

        <div class="controls">
            {!! Form::text('tag', @$tags, array('class'=>'form-control tags', 'id' => 'tag', 'placeholder'=>'tags', 'value'=>Input::old('tag'))) !!}
        </div>

    </div>
</div>
<div class="col-sm-6">
    <h3>Phone Numbers</h3>
    <hr>
    <!-- Mobile Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('mobile', 'Mobile:') !!}
        {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Toll Free Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('toll_free', 'Toll Free:') !!}
        {!! Form::text('toll_free', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Company Phone Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('company_phone', 'Company Phone:') !!}
        {!! Form::text('company_phone', null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="col-sm-6">
    <h3>Store Hours</h3>
    <hr>
    <!-- Hours Opening Mf Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_opening_mf', 'Hours Opening Mf:') !!}
        {!! Form::text('hours_opening_mf', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hours Closing Mf Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_closing_mf', 'Hours Closing Mf:') !!}
        {!! Form::text('hours_closing_mf', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hours Opening Sat Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_opening_sat', 'Hours Opening Sat:') !!}
        {!! Form::text('hours_opening_sat', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hours Closing Sat Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_closing_sat', 'Hours Closing Sat:') !!}
        {!! Form::text('hours_closing_sat', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hours Opening Sun Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_opening_sun', 'Hours Opening Sun:') !!}
        {!! Form::text('hours_opening_sun', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hours Closing Sun Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hours_closing_sun', 'Hours Closing Sun:') !!}
        {!! Form::text('hours_closing_sun', null, ['class' => 'form-control']) !!}
    </div>
</div>





<div class="col-sm-12">
    <h3>Email @</h3>
    <hr>
    <!-- Public Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('public_email', 'Public Email:') !!}
        {!! Form::text('public_email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Support Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('support_email', 'Support Email:') !!}
        {!! Form::text('support_email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-sm-12 hide">
    <h3>Store Images</h3>
    <hr>
    <!-- Logo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('logo', 'Logo:') !!}
        {!! Form::file('logo') !!}
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-sm-12 hide">
    <!-- Thumbnail Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('thumbnail', 'Thumbnail:') !!}
        {!! Form::file('thumbnail') !!}
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> Shipping Accounts
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-shipping">
                            <tr id="table-header">
                                <td>Account</td>
                                <td>Number</td>
                                <td class="text-center" width="10%">Remove</td>
                            </tr>
                            @foreach($ownshipping as $os)
                            <tr>            

                                <td>{{ $os->account }}</td>
                                <td>{{ $os->number }}</td>
                                <td class="text-center" nowrap="nowrap">

                                    <span data-id="{{$os->id}}" class="delete-shipping fa fa-trash" role="button"></span>
                                </td>
                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <input type="button" name="add" id="addnew" value="Add New">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   @if(!Sentinel::inRole('dealer'))
   <div class="form-group col-sm-6">
       <div class="col-sm-12">
           Tier:
           {!! Form::select('tier', $tier, @$dealer->tier_id, ['class' => 'form-control']) !!}
       </div>
   </div>
    @endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.dealers.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
    $('.delete-shipping').click(function () {
        var url = "{{ url(getLang().'/cart/removefromshipping/') }}";
        var $data = {};
        $this = $(this);
        $data.id = $this.attr('data-id');
        $data.ajax = 1;
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                type: 'POST',
                url: url,
                data: $data,
                cache: false,
                dataType: 'json',
                error: function (request, error) {
                },
                success: function (data) {
                    $this.parents('tr').remove();
                }
            });
        }
    });
    function addshipping($thiss) {
        var url = "{{ url(getLang().'/cart/addownshipping/') }}";
        var $data = {};
        $this = $thiss.parents('tr');
        $data.account = $this.find('#account').val();
        $data.number = $this.find('#number').val();
        $data.dealer_id = {{($dealer && $dealer->id ? $dealer->id : 0)}};
        $data.ajax = 1;
        if (confirm('Are you sure you want to add this?')) {
            $.ajax({
                type: 'POST',
                url: url,
                data: $data,
                cache: false,
                dataType: 'json',
                error: function (request, error) {
                },
                success: function (data) {
                   $thiss.remove();
                   $this.find('.fa-trash').replaceWith('<span style="color:green">Success</span>');
                   $this.find('select,input').attr('readonly','readonly');
                }
            });
        }
    }
    $('#addnew').click(function(){
        select= '{!! Form::select("account", getShippingAccount(), old("account"), ["id" => "account","class"=>"form-control"]) !!}';
        cancel='<span onclick="$(this).parents(\'tr\').remove()" class="fa fa-trash" role="button"></span>';
        ok='<span class="add-shipping fa fa-check" style="margin-left:10px" role="button" onclick="addshipping($(this))"></span>';
        html="<tr><td>"+select+"</td><td><input type='text' id='number' name='number' class='form-control'></td><td class='text-center'> "+cancel+" "+ok+" </td></tr>";
        $(this).parents('tr').before(html);
    });
</script>