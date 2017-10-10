					<div class="line visible-xs-block"></div>

						<div class="col-sm-3 clearfix">

							<div class="list-group">
								<a href="#tab-dash" class="list-group-item clearfix">Dashboard <i class="icon-laptop2 pull-right"></i></a>
								<a href="#tab-profile" class="list-group-item clearfix">Profile <i class="icon-user pull-right"></i></a>
								{{--<a target="_blank" href="#" class="list-group-item clearfix">Messages <i class="icon-envelope2 pull-right"></i></a>--}}
								{{--<a href="#tab-account" class="list-group-item clearfix">Billing <i class="icon-credit-cards pull-right"></i></a>--}}
								<a href="#tab-account" class="list-group-item clearfix">Orders <i class="icon-credit-cards pull-right"></i></a>
								{{--<a href="#" class="list-group-item clearfix">Keys <i class="icon-credit-cards pull-right"></i></a>--}}
								{{--<a href="#tab-profile" class="list-group-item clearfix">Settings <i class="icon-cog pull-right"></i></a>--}}
								<a href="{{ url(getLang() . '/logout') }}" class="list-group-item clearfix">Logout <i class="icon-line2-logout pull-right"></i></a>
							</div>
							@if($user->userInfo->about_me)
							<div class="fancy-title topmargin title-border">
								<h4>About Me</h4>
							</div>

							<p>{!! $user->userInfo->about_me !!}</p>
							@endif
							<div class="fancy-title topmargin title-border">
								<h4>Social Profiles</h4>
							</div>

							@if($user->userInfo->facebook_url)
							<a href="{!! $user->userInfo->facebook_url !!}" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							@else
							<a href="https://www.facebook.com/{!! $user->userInfo->facebook_username !!}" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							@endif

							@if($user->userInfo->google_plus_url)
							<a href="{!! $user->userInfo->google_plus_url !!}" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>
							@endif
							@if($user->userInfo->instagram_username)
							<a href="{!! $user->userInfo->instagram_username !!}" class="social-icon si-instagram si-small si-rounded si-light" title="instagram">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>
							@endif
							@if($user->userInfo->flickr)
							<a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
								<i class="icon-flickr"></i>
								<i class="icon-flickr"></i>
							</a>
							@endif
							@if($user->userInfo->linked_in_url)
							<a href="{!! $user->userInfo->linked_in_url !!}" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							@endif
							@if($user->userInfo->twitter_username)
							<a href="//twitter.com/{!! $user->userInfo->twitter_username  !!}" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
							@endif
						</div>
