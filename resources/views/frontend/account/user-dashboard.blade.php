@extends('frontend.layout.account')

@section('json-ld')
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Person",
  "name": "{!! Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name !!}",
  "url": "{!! Request::url() !!}",
  "sameAs": [
    "{!! $user->userInfo->facebook_url !!}",
    "{!! isset($user->userInfo->instagram_username) ? 'https://instagram.com/'. $user->userInfo->instagram_username : '' !!}",
    "{!! $user->userInfo->google_plus_url !!}"
  ]
}
</script>
@endsection

@section('content')
<!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row clearfix">
                @include('flash::message')
                <div class="col-sm-9">

                    <img itemprop="image" src="{!! (@$userdtl->userInfo->photo)?@$userdtl->userInfo->photo :'http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' !!}" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="{{$user->first_name . ' ' . $user->last_name}}" style="max-width: 84px;">

                    <div class="heading-block noborder">
                        <h3>{!! Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name !!} <small>{!!$user->username!!}</small></h3>
                        <span>Your Profile & Account Section</span>
                    </div>
                    <div class="clear"></div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="tabs tabs-alt clearfix" id="tabs-profile">
                                <ul class="tab-nav clearfix">
                                    <li><a href="#tab-dash"><i class="icon-home2"></i> Dashboard</a></li>

                                    <li><a href="#tab-account"><i class="icon-shopping-cart"></i> Orders</a></li>

                                    <li><a href="#tab-addresses"><i class="icon-location"></i> Addresses</a></li>

                                    <li><a href="#tab-profile"><i class="icon-user"></i> Profile</a></li>
                                    <li><a href="#tab-edit"><i class="icon-pencil2"></i> Edit Profile</a></li>
                                    <li><a href="#tab-wishlist"><i class="icon-heart"></i> Wishlist</a></li>
                                    @if($user->isDealer)
                                    <li><a href="#tab-ownshipping"><i class="icon-paperplane"></i> Shipping Accounts</a></li>
                                    @endif
<!--                                    <li><a href="#tab-new-location"><i class="icon-reply"></i> Add Address</a></li>-->
                                </ul>
                                <div class="tab-container">
                                    <div class="tab-content clearfix" id="tab-dash">
                                        Welcome {!! Sentinel::getUser()->first_name!!}!
                                    </div>
                                    <div class="tab-content clearfix" id="tab-account">
                                        @include('frontend.account.partials.orders')
                                    </div>
                                    <div class="tab-content clearfix" id="tab-addresses">
                                        {!! Form::model($user, ['route' => ['userlocation.update', $user->id], 'method' => 'patch']) !!}
                                        @include('frontend.account.partials.user-billing-shipping')
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="tab-content clearfix" id="tab-profile">
                                       @include('frontend.account.partials.parts.profile-show-fields')
                                    </div>
                                    <div class="tab-content clearfix" id="tab-edit">
                                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch', 'files'=>true]) !!}
                                        @include('frontend.account.partials.parts.profile-fields')
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="tab-content clearfix" id="tab-wishlist">
                                         @include('frontend.account.partials.wishlist')
                                    </div>
                                    @if($user->isDealer)
                                    <div class="tab-content clearfix" id="tab-ownshipping">
                                         @include('frontend.account.partials.own-shipping')
                                    </div>
                                    @endif
<!--                                    <div class="tab-content clearfix" id="tab-new-location">
                                        {{--@include('frontend.account.partials.account-sidebar')--}}
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line visible-xs-block"></div>
				@include('frontend.account.partials.account-sidebar')
            </div>
        </div>
    </div>
</section>
@endsection
