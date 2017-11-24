<?php
$cart_menu = (isset($cart_menu) ? $cart_menu : true);
$cart_count = getCartCount();
?>
<h2><i class="fa fa-book"></i>Online Store
    @if(Sentinel::check() && $cart_menu == true)
    <ul class="user-cart">
        <li><a href="{{url(getLang().'/store/selectSchool')}}"><i class="fa fa-home"></i><span>Home</span></a></li>
        <li><a href="{{url('/my_profile')}}"><i class="fa fa-group"></i><span>My Account</span></a></li>
        <li><a href="{{url('/signout')}}"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        <li>
            <div class="cart-notification">{{$cart_count}}</div>
            <a href="{{url(getLang().'/store/cart')}}"><i class="fa fa-shopping-basket"></i><span>Cart</span></a>
        </li>
    </ul>
    @endif    
</h2>