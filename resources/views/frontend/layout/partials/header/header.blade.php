<?php
$action_name = \Request::route()->getName();
?>
<!-- Start Header -->
<div class="header">
	<div class="wrapper cf">
		<div class="logo">
			<a href="{{url()}}">JEEVANDEEP PRAKASHAN PVT. LTD.</a><span>enlightening minds for a brighter tomorrow</span>
		</div>
		<div class="menu">
			<ul class="cf">
				<li class="{{($action_name == 'dashboard' ? 'active' : '')}}"><a href="{{url()}}">jeevandeep</a></li>
				<li><a href="javsscript:;">our story</a></li>
				<li><a href="javsscript:;">what we do</a></li>
				<li><a href="javsscript:;">lets connect</a></li>
				<li><a href="javsscript:;">work with us</a></li>
				<li><a href="javsscript:;">write for us</a></li>
                                <li class="{{($action_name != 'dashboard' ? 'active' : '')}}"><a href="{!! url(getLang() . '/store') !!}">store</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- End Header --> 