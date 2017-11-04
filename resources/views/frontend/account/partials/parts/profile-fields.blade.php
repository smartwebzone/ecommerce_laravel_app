<div class="row">
    <div class="col-sm-5 col-md-5">
        <div class="user-left">
            <div class="col-sm-12">
                <!-- start: FILE UPLOAD PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Personal Info
                    </div>
                    <div class="panel-body">

                        <div class="center">
                            <!-- First Name Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('first_name')? 'has-error' : '' }}">
                                {!! Form::label('first_name', 'First Name:') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'value' => old('first_name')]) !!}
                                {!! $errors->has('first_name')? '<p class="errormsg"> '.$errors->first('first_name').' </p> ':'' !!}
                            </div>
                            <!-- Last Name Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('last_name')? 'has-error' : '' }}">
                                {!! Form::label('last_name', 'Last Name:') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'value' => old('last_name')]) !!}
                                {!! $errors->has('last_name')? '<p class="errormsg"> '.$errors->first('last_name').' </p> ':'' !!}
                            </div>
                            <!-- Display Name Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('userInfo[display_name]')? 'has-error' : '' }}">
                                {!! Form::label('userInfo[display_name]', 'Display Name:') !!}
                                {!! Form::text('userInfo[display_name]', null, ['id'=>'display_name','class' => 'form-control', 'value' => old('userInfo[display_name]')]) !!}
                                {!! $errors->has('userInfo[display_name]')? '<p class="errormsg"> '.$errors->first('userInfo[display_name]').' </p> ':'' !!}
                            </div>

                            <!-- Dob Field -->
                            <div class="form-group col-sm-12 {{ $errors->has('userInfo[dob]')? 'has-error' : '' }}">
                                {!! Form::label('userInfo[dob]', 'Birth Date::') !!}
                                {!! Form::text('userInfo[dob]', null, ['data-provide'=>"datepicker",'class' => 'form-control', 'value' => old('userInfo[dob]')]) !!}
                                {!! $errors->has('userInfo[dob]')? '<p class="errormsg"> '.$errors->first('userInfo[dob]').' </p> ':'' !!}
                            </div>

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
                                            {!! $errors->has('userInfo[company]')? '<p class="errormsg"> '.$errors->first('userInfo[company]').' </p>':'' !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Website Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[website]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[website]', 'Website:') !!}
                                            {!! Form::text('userInfo[website]', null, ['class' => 'form-control', 'value' => old('userInfo[website]')]) !!}
                                            {!! $errors->has('userInfo[website]')? '<p class="errormsg"> '.$errors->first('userInfo[website]').' </p> ':'' !!}
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
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[phone]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[phone]', 'Phone:') !!}
                                            {!! Form::text('userInfo[phone]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[phone]')]) !!}
                                            {!! $errors->has('userInfo[phone]')? '<p class="errormsg"> '.$errors->first('userInfo[phone]').' </p> ':'' !!}
                                        </div>
                                        <!-- Mobile Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[mobile]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[mobile]', 'Mobile:') !!}
                                            {!! Form::text('userInfo[mobile]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[mobile]')]) !!}
                                            {!! $errors->has('userInfo[mobile]')? '<p class="errormsg"> '.$errors->first('userInfo[mobile]').' </p> ':'' !!}
                                        </div>
                                        <!-- Work Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[work]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[work]', 'Work:') !!}
                                            {!! Form::text('userInfo[work]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[work]')]) !!}
                                            {!! $errors->has('userInfo[work]')? '<p class="errormsg"> '.$errors->first('userInfo[work]').' </p> ':'' !!}
                                        </div>
                                        <!-- Other Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[other]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[other]', 'Other:') !!}
                                            {!! Form::text('userInfo[other]', null, ['class' => 'form-control input-mask-phone text-center', 'value' => old('userInfo[other]')]) !!}
                                            {!! $errors->has('userInfo[other]')? '<p class="errormsg"> '.$errors->first('userInfo[other]').' </p>':'' !!}
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
                                                <span class="errormsg">{!! $errors->first('email') !!}</span>
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
                                                <span class="errormsg">{!! $errors->first('password') !!}</span>
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
                                                <span class="errormsg">{!! $errors->first('confirm-password') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                        {!! $errors->has('userInfo[about_me]')? '<p class="errormsg"> '.$errors->first('userInfo[about_me]').' </p> ':'' !!}
                    </div>
                </div>
            </div>
            <!-- end: FILE UPLOAD PANEL -->
        </div>
        <div class="col-sm-12">
            <!-- start: FILE UPLOAD PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> Profile Pic. upload
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            {!! Form::file('userInfo[photo]', ['class' => 'file','id'=>'input-preview', 'value' => old('userInfo[photo]')]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: FILE UPLOAD PANEL -->
        </div>


          <hr>
                            <p>
                                <!-- Twitter Username Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[twitter_username]', 'Twitter Username:') !!}
                                {!! Form::text('userInfo[twitter_username]', null, ['class' => 'form-control', 'value' => old('userInfo[twitter_username]')]) !!}
                            </div>
                            <!-- Instagram Username Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[instagram_username]', 'Instagram Username:') !!}
                                {!! Form::text('userInfo[instagram_username]', null, ['class' => 'form-control', 'value' => old('userInfo[instagram_username]')]) !!}
                            </div>
                            <!-- Facebook Username Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[facebook_username]', 'Facebook Username:') !!}
                                {!! Form::text('userInfo[facebook_username]', null, ['class' => 'form-control', 'value' => old('userInfo[facebook_username]')]) !!}
                            </div>
                            <!-- Facebook Url Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[facebook_url]', 'Facebook Url:') !!}
                                {!! Form::text('userInfo[facebook_url]', null, ['class' => 'form-control', 'value' => old('userInfo[facebook_url]')]) !!}
                            </div>
                            <!-- Linked In Url Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[linked_in_url]', 'Linked In Url:') !!}
                                {!! Form::text('userInfo[linked_in_url]', null, ['class' => 'form-control', 'value' => old('userInfo[linked_in_url]')]) !!}
                            </div>
                            <!-- Google Plus Url Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('userInfo[google_plus_url]', 'Google Plus Url:') !!}
                                {!! Form::text('userInfo[google_plus_url]', null, ['class' => 'form-control', 'value' => old('userInfo[google_plus_url]')]) !!}
                            </div>

                                                    <!-- Skypeid Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[skypeid]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[skypeid]', 'Skypeid:') !!}
                                            {!! Form::text('userInfo[skypeid]', null, ['class' => 'form-control', 'value' => old('userInfo[skypeid]')]) !!}
                                            {!! $errors->has('userInfo[skypeid]')? '<p class="errormsg"> '.$errors->first('userInfo[skypeid]').' </p>':'' !!}
                                        </div>
                                        <!-- Githubid Field -->
                                        <div class="form-group col-sm-12 {{ $errors->has('userInfo[githubid]')? 'has-error' : '' }}">
                                            {!! Form::label('userInfo[githubid]', 'Githubid:') !!}
                                            {!! Form::text('userInfo[githubid]', null, ['class' => 'form-control', 'value' => old('userInfo[githubid]')]) !!}
                                            {!! $errors->has('userInfo[githubid]')? '<p class="errormsg"> '.$errors->first('userInfo[githubid]').' </p>':'' !!}
                                        </div>
                            </p>
                            <hr>




        <div class="form-group col-sm-12">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            <a href="{!! url(getLang() . '/admin/user') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
