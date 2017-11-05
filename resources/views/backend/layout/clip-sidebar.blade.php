<div class="main-navigation navbar-collapse collapse">
    <!-- start: MAIN MENU TOGGLER BUTTON -->
    <div class="navigation-toggler">
        <i class="clip-chevron-left"></i>
        <i class="clip-chevron-right"></i>
    </div>
    <!-- end: MAIN MENU TOGGLER BUTTON -->
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
        <li class="">
            <a target="_blank" href="{{ url(getLang() . '/') }}"><i class="clip-home-2"></i>
                <span class="title"> Live Site </span>
            </a>
        </li>
        <li class="{{ setActive('admin') }}">
            <a href="{{ url(getLang() . '/admin') }}"><i class="clip-home-3"></i>
                <span class="title"> Dashboard </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/company*') }}">
            <a href="{{ url(getLang() . '/admin/company') }}"><i class="fa fa-building-o"></i>
                <span class="title"> Companies </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/standard*') }}">
            <a href="{{ url(getLang() . '/admin/standard') }}"><i class="fa fa-paperclip"></i>
                <span class="title"> Standards </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/school*') }}">
            <a href="{{ url(getLang() . '/admin/school') }}"><i class="fa fa-university"></i>
                <span class="title"> Schools </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/book*') }}">
            <a href="{{ url(getLang() . '/admin/book') }}"><i class="fa fa-book"></i>
                <span class="title"> Books </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/product*') }}">
            <a href="{{ url(getLang() . '/admin/product') }}"><i class="fa fa-shopping-bag"></i>
                <span class="title"> Products </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/email*') }}">
            <a href="{{ url(getLang() . '/admin/email') }}"><i class="fa fa-envelope"></i>
                <span class="title"> Email Templates </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/unavailable*') }} hide">
            <a href="javascript:void(0)"> <i class="fa fa-list"></i> <span class="title">Unavailable Master</span>
                <i class="fa fa-angle-right pull-right"></i> </a>
                <ul class="sub-menu">
                    <li><a href="{{ url(getLang() . '/admin/unavailable/schools') }}"><i class="fa fa-university"></i> Schools</a>
                    <li><a href="{{ url(getLang() . '/admin/unavailable/standards') }}"><i class="fa fa-paperclip"></i> Standards</a>
                </ul>
        </li>
        <li class="{{ setActive('admin/user*') }}">
            <a href="{{ url(getLang() . '/admin/user') }}"><i class="fa fa-users"></i>
                <span class="title"> Users </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/order*') }}">
            <a href="{{ url(getLang() . '/admin/order') }}"><i class="fa fa-shopping-cart"></i>
                <span class="title"> Orders </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/logout*') }}">
            <a href="{{ url('/admin/logout') }}"> <i class="fa fa-sign-out"></i> <span class="title">Logout</span> </a>
        </li>
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->

</div>
