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
        <li class="{{ setActive('admin/school*') }}">
            <a href="{{ url(getLang() . '/admin/school') }}"><i class="fa fa-safari"></i>
            <span class="title"> School </span><span class="selected"></span>
            </a>
        </li>
        <li class="{{ setActive('admin/logout*') }}">
            <a href="{{ url('/admin/logout') }}"> <i class="fa fa-sign-out"></i> <span class="title">Logout</span> </a>
        </li>
<!--        <li class="{{ setActive(['admin/group*', 'admin/category*', 'admin/article*', 'admin/page*', 'admin/photo-gallery*', 'admin/video*', 'admin/slider*', 'admin/project*', 'admin/faq*']) }}">
            <a class="{{ setActive('admin') }}" href="javascript:void(0)"><i class="clip-home-3"></i> <span class="title"> Website </span><span class="selected"></span> </a>
            <ul class="sub-menu">
                <li class="{{ setActive('admin/article*') }}">
                    <a href="javascript:void(0)"> <i class="fa fa-book"></i> <span class="title">Blog Articles</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                    <ul class="sub-menu">
                        <li><a href="{{ url(getLang() . '/admin/article') }}"><i class="fa fa-archive"></i> All Articles</a>
                        </li>
                        <li>
                            <a href="{{ url(getLang() . '/admin/article/create') }}"><i class="fa fa-plus-square"></i> Add Article</a>
                        </li>
                    </ul>
                </li>
    
            </ul>
        </li>-->
    </ul>
    <!-- end: MAIN NAVIGATION MENU -->

</div>
