<!-- Page Sub Menu
============================================= -->
<div id="page-menu" style="text-transform: uppercase;">
    <div id="page-menu-wrap">
        <div class="container clearfix ">

        {{--<div class="menu-title hidden-xs hidden-sm hidden-md">The New <span>Qnique Quilter 21"</span></div>--}}

                <nav class="one-page-menu">
                    @foreach($items as $item)
                        <li @if($item->hasChildren())class ="dropdown"@endif>
                            @if($item->link) <a @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif href="{{ $item->url() }}">
                                <div>{!! $item->title !!}</div>
                                @if($item->hasChildren())
                                	<b class="caret"></b>
                                @endif
                            </a>
                            @else
                                <div>{{$item->title}}</div>
                            @endif
                            @if($item->hasChildren())
                                <ul class="dropdown-menu">
                                    @foreach($item->children() as $child)
                                        <li><a href="{{ $child->url() }}"><div>{{ $child->title }}</div></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @if($item->divider)
                            <li{{\HTML::attributes($item->divider)}}></li>
                        @endif
                    @endforeach
                </nav>
            <div id="page-submenu-trigger">Categories<i class="icon-reorder"></i></div>
        </div>
    </div>
</div>
