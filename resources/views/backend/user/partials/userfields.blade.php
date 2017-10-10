<div class="row">
    <div class="col-sm-5 col-md-5">
        <div class="user-left">
            <div class="col-sm-12">
                <!-- start: FILE UPLOAD PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> User Info
                    </div>
                    <div class="panel-body">
                        <!-- Is Published Field -->
                        <div class="form-group col-sm-4 {{ $errors->has('userInfo[is_published]')? 'has-error' : '' }}">
                            {!! Form::label('userInfo[is_published]', 'Is Published:') !!}
                            <label class="checkbox">
                                {!!Form::hidden('userInfo[is_published]',0)!!}
                                {!! Form::checkbox('userInfo[is_published]', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('userInfo[is_published]') ]) !!}
                            </label>
                            {!! $errors->has('userInfo[is_published]')? '
                            <p class="help-block"> '.$errors->first('userInfo[is_published]').' </p>
                            ':'' !!}
                        </div>
                        <!-- Is Published Field -->
                        <div class="form-group col-sm-4 {{ $errors->has('userInfo[is_active]')? 'has-error' : '' }}">
                            {!! Form::label('userInfo[is_active]', 'Is Active:') !!}
                            <label class="checkbox">
                                {!!Form::hidden('userInfo[is_active]',0)!!}
                                {!! Form::checkbox('userInfo[is_active]', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('userInfo[is_active]') ]) !!}
                            </label>
                            {!! $errors->has('userInfo[is_active]')? '
                            <p class="help-block"> '.$errors->first('userInfo[is_active]').' </p>
                            ':'' !!}
                        </div>
                        <div class="form-group col-sm-4 {{ $errors->has('isAdmin')? 'has-error' : '' }}">
                            {!! Form::label('isAdmin', 'Is Admin:') !!}
                            <label class="checkbox">
                                {!!Form::hidden('isAdmin',0)!!}
                                {!! Form::checkbox('isAdmin', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('isAdmin') ]) !!}
                            </label>
                            {!! $errors->has('isAdmin')? '
                            <p class="help-block"> '.$errors->first('isAdmin').' </p>
                            ':'' !!}
                        </div>
                        <div class="center">
                            <!-- First Name Field -->
                            <div class="form-group col-sm-6 {{ $errors->has('first_name')? 'has-error' : '' }}">
                                {!! Form::label('first_name', 'First Name:') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'value' => old('first_name')]) !!}
                                {!! $errors->has('first_name')? '
                                <p class="help-block"> '.$errors->first('first_name').' </p>
                                ':'' !!}
                            </div>
                            <!-- Last Name Field -->
                            <div class="form-group col-sm-6 {{ $errors->has('last_name')? 'has-error' : '' }}">
                                {!! Form::label('last_name', 'Last Name:') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name')]) !!}
                                {!! $errors->has('last_name')? '
                                <p class="help-block"> '.$errors->first('last_name').' </p>
                                ':'' !!}
                            </div>
                            <!-- Display Name Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('userInfo[display_name]')? 'has-error' : '' }}">
                                {!! Form::label('userInfo[display_name]', 'Display Name:') !!}
                                {!! Form::text('userInfo[display_name]', null, ['id'=>'display_name','class' => 'form-control', 'value' => old('userInfo[display_name]')]) !!}
                                {!! $errors->has('userInfo[display_name]')? '
                                <p class="help-block"> '.$errors->first('userInfo[display_name]').' </p>
                                ':'' !!}
                            </div>
                            <!-- Dob Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('userInfo[dob]')? 'has-error' : '' }}">
                                {!! Form::label('userInfo[dob]', 'Birth Date::') !!}
                                {!! Form::text('userInfo[dob]', null, ['data-provide'=>"datepicker",'class' => 'form-control', 'value' => old('userInfo[dob]')]) !!}
                                {!! $errors->has('userInfo[dob]')? '
                                <p class="help-block"> '.$errors->first('userInfo[dob]').' </p>
                                ':'' !!}
                            </div>
                            <hr>
                            <p>
                                <!-- Twitter Username Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[twitter_username]', 'Twitter Username:') !!}
                                {!! Form::text('userInfo[twitter_username]', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Instagram Username Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[instagram_username]', 'Instagram Username:') !!}
                                {!! Form::text('userInfo[instagram_username]', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Facebook Username Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[facebook_username]', 'Facebook Username:') !!}
                                {!! Form::text('userInfo[facebook_username]', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Facebook Url Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[facebook_url]', 'Facebook Url:') !!}
                                {!! Form::text('userInfo[facebook_url]', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Linked In Url Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[linked_in_url]', 'Linked In Url:') !!}
                                {!! Form::text('userInfo[linked_in_url]', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- Google Plus Url Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('userInfo[google_plus_url]', 'Google Plus Url:') !!}
                                {!! Form::text('userInfo[google_plus_url]', null, ['class' => 'form-control']) !!}
                            </div>
                            </p>
                            <hr>
                        </div>
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Contact Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <!-- Company Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[company]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[company]', 'Company:') !!}
                                            {!! Form::text('userInfo[company]', null, ['class' => 'form-control', 'value' => old('userInfo[company]')]) !!}
                                            {!! $errors->has('userInfo[company]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[company]').' </p>
                                            ':'' !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Website Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[website]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[website]', 'Website:') !!}
                                            {!! Form::text('userInfo[website]', null, ['class' => 'form-control', 'value' => old('userInfo[website]')]) !!}
                                            {!! $errors->has('userInfo[website]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[website]').' </p>
                                            ':'' !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Phone Field -->
                                        <div class="form-group col-sm-6 {{ $errors->has('userInfo[phone]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[phone]', 'Phone:') !!}
                                            {!! Form::text('userInfo[phone]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[phone]')]) !!}
                                            {!! $errors->has('userInfo[phone]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[phone]').' </p>
                                            ':'' !!}
                                        </div>
                                        <!-- Mobile Field -->
                                        <div class="form-group col-sm-6 {{ $errors->has('userInfo[mobile]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[mobile]', 'Mobile:') !!}
                                            {!! Form::text('userInfo[mobile]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[mobile]')]) !!}
                                            {!! $errors->has('userInfo[mobile]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[mobile]').' </p>
                                            ':'' !!}
                                        </div>
                                        <!-- Work Field -->
                                        <div class="form-group col-sm-6 {{ $errors->has('userInfo[work]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[work]', 'Work:') !!}
                                            {!! Form::text('userInfo[work]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[work]')]) !!}
                                            {!! $errors->has('userInfo[work]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[work]').' </p>
                                            ':'' !!}
                                        </div>
                                        <!-- Other Field -->
                                        <div class="form-group col-sm-6 {{ $errors->has('userInfo[other]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[other]', 'Other:') !!}
                                            {!! Form::text('userInfo[other]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[other]')]) !!}
                                            {!! $errors->has('userInfo[other]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[other]').' </p>
                                            ':'' !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Skypeid Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[skypeid]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[skypeid]', 'Skypeid:') !!}
                                            {!! Form::text('userInfo[skypeid]', null, ['class' => 'form-control', 'value' => old('userInfo[skypeid]')]) !!}
                                            {!! $errors->has('userInfo[skypeid]')? '
                                            <p class="help-block"> '.$errors->first('userInfo[skypeid]').' </p>
                                            ':'' !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th colspan="3">Login Crediantials</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <!-- Email -->
                                        <div class="form-group col-sm-12 {!! $errors->has('email') ? 'has-error' : '' !!}">
                                            <label class="control-label" for="email">Email</label>
                                            <div class="controls">
                                                {!! Form::text('email', null, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) !!}
                                                @if ($errors->first('email'))
                                                <span class="help-block">{!! $errors->first('email') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <!-- Password -->
                                        <div class="form-group col-sm-12 {!! $errors->has('password') ? 'has-error' : '' !!}">
                                            <label class="control-label" for="password">Password</label>
                                            <div class="controls">
                                                {!! Form::password('password', array('class'=>'form-control', 'id' => 'password', 'placeholder'=>'Password')) !!}
                                                @if ($errors->first('password'))
                                                <span class="help-block">{!! $errors->first('password') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Confirm Password -->
                                        <div class="form-group col-sm-12 {!! $errors->has('confirm-password') ? 'has-error' : '' !!}">
                                            <label class="control-label" for="confirm-password">Confirm Password</label>
                                            <div class="controls">
                                                {!! Form::password('confirm_password', array('class'=>'form-control', 'id' => 'confirm_password', 'placeholder'=>'Confirm Password')) !!}
                                                @if ($errors->first('confirm-password'))
                                                <span class="help-block">{!! $errors->first('confirm-password') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- @includes('backend.user.partials.employee')--}}
                        @if (!Sentinel::inRole('dealer')):
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th colspan="3">Additional information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <div class="form-group col-sm-10 {!! $errors->has('is_published') ? 'has-error' : '' !!}">
                                            {!! Form::label('role', 'Roles: ') !!}
                                            <div class="checkbox">
                                                @foreach($roles as $id=>$role)
                                                <label class="checkbox-inline"> 
                                                    <input class="dealer-check" type="checkbox" <?= @(in_array($role, $userRoles) ? 'checked="checked"' : '') ?> value="{!! $id !!}" name="roles[{!! $role !!}]" data-toggle="toggle">  {!! $role !!}
                                                </label>
                                                @endforeach
                                            </div>
                                            <div id="dealer_box" class="{{($user->isDealer)?'':'hide'}}">
                                                Dealer
                                                {!! Form::select('dealer_id', $dealers, @$user->dealer->first()->id, ['class' => 'form-control']) !!}
                                            </div>
<!--                                            @if($user && $user->isDealer)
                                            Tier:
                                            {!! Form::select('tier', $tier, $user->tier->first()->id, ['class' => 'form-control']) !!}
                                            @endif-->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @else:
                        <input type="hidden" name="roles[Dealer]" value="6">
                        @endif
                    </div>
                </div>
            </div>
            <!-- end: FILE UPLOAD PANEL -->
        </div>
    </div>
    <div class="col-sm-7 col-md-7">
        <div class="col-sm-12">
            <!-- start: FILE UPLOAD PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> BIO
                </div>
                <div class="panel-body">
                    <h3>About Me </h3>
                    <!-- About Me Field -->
                    <div class="form-group col-sm-12 col-lg-12 {{ $errors->has('userInfo[about_me]')? 'has-error' : '' }}">
                        {!! Form::textarea('userInfo[about_me]', null, ['class' => 'form-control summernote', 'value' => old('userInfo[about_me]')]) !!}
                        {!! $errors->has('userInfo[about_me]')? '
                        <p class="help-block"> '.$errors->first('userInfo[about_me]').' </p>
                        ':'' !!}
                    </div>
                </div>
            </div>
            <!-- end: FILE UPLOAD PANEL -->
        </div>
        <div class="col-sm-12">
            <!-- start: FILE UPLOAD PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> File upload
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        @if(@$user->userInfo->photo)
                        <div class="pull-right col-sm-7">
                            <label class='col-sm-12'>
                                Current Image
                            </label>
                            <div class="file-preview-frame">
                                <img class="file-preview-image" src="{!! @$user->userInfo->photo !!}" alt="img" />
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-5">
                            <label>
                                Width file preview thumbnails
                            </label>
                            {!! Form::file('userInfo[photo]', ['class' => 'file','id'=>'input-preview']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: FILE UPLOAD PANEL -->
        </div>
        
<!--        <div class="col-sm-12">
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
        </div>-->
        
        <div class="form-group col-sm-12">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            <a href="{!! url(getLang() . '/admin/user') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
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
        $data.user_id = {{($user && $user->id ? $user->id : 0)}};
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
    $('.dealer-check').change(function(){
    $('#dealer_box').toggle();
    });
    $('#addnew').click(function(){
        select= '{!! Form::select("account", getShippingAccount(), old("account"), ["id" => "account","class"=>"form-control"]) !!}';
        cancel='<span onclick="$(this).parents(\'tr\').remove()" class="fa fa-trash" role="button"></span>';
        ok='<span class="add-shipping fa fa-check" style="margin-left:10px" role="button" onclick="addshipping($(this))"></span>';
        html="<tr><td>"+select+"</td><td><input type='text' id='number' name='number' class='form-control'></td><td class='text-center'> "+cancel+" "+ok+" </td></tr>";
        $(this).parents('tr').before(html);
    });
</script>