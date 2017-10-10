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
        <li class="{{ setActive(['admin/user*']) }}">
            <a href="{{ url(getLang() . '/admin/user') }}"><i class="clip-users"></i>
                <span class="title"> Users </span><span class="selected"></span>
            </a>
        </li>
        <?php $dealer = App\Models\DealerUser::where(['user_id' => Sentinel::getUser()->id])->first();?>
        <li class="{{ setActive(['admin/dealers*']) }}">
            <a href="{{ url(getLang() . '/admin/dealers/'.$dealer->dealer_id) }}"><i class="clip-user"></i>
                <span class="title"> Profile </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive(['admin/orders*']) }}">
            <a href="{{ url(getLang() . '/admin/orders?user_type=Dealer') }}"><i class="fa fa-ticket"></i>
                <span class="title"> Orders </span><span class="selected"></span>
            </a>
        </li>
        <li id="locations" class="{{ setActive('admin/locations*') }}">
            <a href="javascript:void(0)"><i class="fa fa-sitemap" aria-hidden="true"></i> <span class="title"> &nbsp; Locations</span>
                <i class="fa fa-angle-left pull-right"></i> </a>
            <ul class="sub-menu">
                <li><a href="{{ url(getLang() . '/admin/locations') }}"><i class="fa fa-th-list" aria-hidden="true"></i> Locations</a></li>
                <li> <a href="{{ url(getLang() . '/admin/locations/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Location</a> </li>
            </ul>
        </li>

        <li class="{{ setActive('admin/logout*') }}">
            <a href="{{ url('/admin/logout') }}"> <i class="fa fa-sign-out"></i> <span class="title">Logout</span> </a>
        </li>
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->

</div>
