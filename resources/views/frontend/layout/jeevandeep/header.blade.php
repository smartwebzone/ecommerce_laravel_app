<h2><i class="fa fa-book"></i>Online Store
    @if(Sentinel::check())
    <ul class="user-cart">
        <li><a href="my-account.html"><i class="fa fa-group"></i><span>My Account</span></a></li>
        <li><a href="{{url('/signout')}}"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        <li>
            @if(Session::get('product'))
            <div class="cart-notification">{{count(Session::get('product'))}}</div>
            @endif
            <a href="{{url(getLang().'/store/cart')}}"><i class="fa fa-shopping-basket"></i><span>Cart</span></a>
        </li>
    </ul>
    @endif    
</h2>