<div class="account-left">
    <ul class="cf">
        <li class="{{(Route::currentRouteName() == 'my_profile' ? 'active' : '')}}"><a href="{{route('my_profile')}}">MY PROFILE</a></li>
        <li class="{{(Route::currentRouteName() == 'my_orders' ? 'active' : '')}}"><a href="{{route('my_orders')}}">MY ORDERS</a></li>
    </ul>
</div>