<div id="top-bar">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
    <div class="container clearfix">
        <div class="col_half nobottommargin hidden-xs hidden-xs-* hidden-sm-* hidden-md-* hidden-md" style="margin-right:10px;">
            <p class="contact-bar nobottommargin Lato">
                <i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> &nbsp; <strong><a class="phone-link" href="tel:8002640644">1 (800) 264-0644</a></strong> |
                <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> &nbsp; <strong><a class="email-link" href="mailto:info@graceframe.com" target="_top">INFO@GRACEFRAME.COM</a></strong> 
            </p>
            
        </div>
        <div class="col_half" style="margin-bottom:0px !important;height: 39px !important; margin-top:1px;">
            <div class=" top-search">
                <input class="form-control" style="margin-left:5px" type="text" id="search-input" placeholder="Search" />
            </div>    
        </div>
         <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
                <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
                <script>
                        var client = algoliasearch("3UCDROF5HB", "3233b256858db385fa2f6ec62c885296")
                        var index = client.initIndex('products');
                        autocomplete('#search-input', {hint: false}, [
                            {
                                source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
                                displayKey: 'name',
                                templates: {
                                    suggestion: function (suggestion) {
                                        return suggestion._highlightResult.name.value;
                                    }
                                }
                            }
                        ]).on('autocomplete:selected', function (event, suggestion, dataset) {
                            window.location.href = "{{ secure_url(getLang()) }}"+suggestion.url+suggestion.slug;
                        });
                </script>
        <div class="col_half col_last fright nobottommargin">
            <div class="top-links">

                <ul>
                    {{-- @include('header-locatlization') --}}

                    @if ($user = Sentinel::check())
                        <li><a href="{{ secure_url(getLang() . '/dashboard') }}"><i class="fa fa-user fa-lg" style="vertical-align: baseline;" aria-hidden="true"></i> My Account</a></li>
                    @endif

                    @if($user = Sentinel::check())
                        <li><a href="{{ secure_url(getLang() . '/dashboard#tab-account') }}"> My Orders &nbsp;<span class="fa fa-briefcase"></span></a></li>
                        <li><a href="{{ secure_url(getLang() . '/cart') }}"> My Cart &nbsp;<span class="fa fa-shopping-cart"></span></a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="/flags/{{ LaravelLocalization::getCurrentLocale() }}.png"> &nbsp; &nbsp;
                            <span class="username">{{ LaravelLocalization::getCurrentLocaleName() }}</span>

                        </a>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}" hreflang="{{$localeCode}}">
                                        <img alt="" src="/flags/{{$localeCode}}.png">&nbsp; &nbsp;{{{ $properties['native'] }}} </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @if(!$user = Sentinel::check())
                        <li><a href="#">Login &nbsp; / &nbsp;Register</a>
                        <div class="top-link-section" style="display:none;">
                            {!! Form::open(['route' => 'signin', 'method' => 'post', 'id' => 'login-form',  'name' => 'login-form', 'class' => 'nobottommargin']) !!}
                                <div class="input-group" id="top-login-username">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>
                                <div class="input-group" id="top-login-password">
                                    <span class="input-group-addon"><i class="icon-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                </div>
                            <a href="{{ secure_url(getLang() . '/forgot-password') }}">Forgot Password</a>
                                <label class="checkbox">
                                  <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            <div class="col-xs-6"><button class="btn btn-danger btn-block" type="submit">Sign in</button></div>
                            <div class="col-xs-6"><a class="btn btn-success btn-block" href="{{ secure_url(getLang() . '/signin') }}">Sign up</a></div>
                            {!! Form::close() !!}
                        </div>
                        </li>
                    @else
                        <li><a href="{{ secure_url(getLang() . '/logout') }}"> Logout  </a></li>
                    @endif

                </ul>
            </div><!-- .top-links end -->
        </div>
    </div>
</div><!-- #top-bar end -->