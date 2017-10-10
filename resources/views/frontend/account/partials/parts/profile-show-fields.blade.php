
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First name:') !!}
    <p>{!! $user->first_name !!}</p>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last name:') !!}
    <p>{!! $user->last_name !!}</p>
</div>
<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    @if($user->userinfo->photo)
    <p> <img itemprop="image" src="{{$user->userinfo->photo}}" class="alignleft img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;"></p>
    @else
    <img itemprop="image" src="{!! Gravatar::get($user->email, 'default') !!}" />
    @endif
</div>

<!-- About Me Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about_me', 'About Me:') !!}
    <p>{!! $user->userInfo->about_me !!}</p>
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    <p>{!! $user->userInfo->website !!}</p>
</div>

<!-- Company Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company', 'Company:') !!}
    <p>{!! $user->userInfo->company !!}</p>
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $user->userInfo->gender !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $user->userInfo->phone !!}</p>
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{!! $user->userInfo->mobile !!}</p>
</div>

<!-- Work Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work', 'Work:') !!}
    <p>{!! $user->userInfo->work !!}</p>
</div>

<!-- Other Field -->
<div class="form-group col-sm-6">
    {!! Form::label('other', 'Other:') !!}
    <p>{!! $user->userInfo->other !!}</p>
</div>



<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{!! $user->userInfo->dob !!}</p>
</div>

<!-- Skypeid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skypeid', 'Skypeid:') !!}
    <p>{!! $user->userInfo->skypeid !!}</p>
</div>

<!-- Githubid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('githubid', 'Githubid:') !!}
    <p>{!! $user->userInfo->githubid !!}</p>
</div>

<!-- Twitter Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter_username', 'Twitter Username:') !!}
    <p>{!! $user->userInfo->twitter_username !!}</p>
</div>

<!-- Instagram Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram_username', 'Instagram Username:') !!}
    <p>{!! $user->userInfo->instagram_username !!}</p>
</div>

<!-- Facebook Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_username', 'Facebook Username:') !!}
    <p>{!! $user->userInfo->facebook_username !!}</p>
</div>

<!-- Facebook Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_url', 'Facebook Url:') !!}
    <p>{!! $user->userInfo->facebook_url !!}</p>
</div>

<!-- Linked In Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linked_in_url', 'Linked In Url:') !!}
    <p>{!! $user->userInfo->linked_in_url !!}</p>
</div>

<!-- Google Plus Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('google_plus_url', 'Google Plus Url:') !!}
    <p>{!! $user->userInfo->google_plus_url !!}</p>
</div>

<!-- Slug Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $user->userInfo->slug !!}</p>
</div>-->

<!-- Display Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name', 'Display Name:') !!}
    <p>{!! $user->userInfo->display_name !!}</p>
</div>

<!-- Created At Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->userInfo->created_at !!}</p>
</div>-->

<!-- Updated At Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->userInfo->updated_at !!}</p>
</div>-->

