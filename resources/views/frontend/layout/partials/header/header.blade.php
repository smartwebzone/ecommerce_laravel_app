<?php
$action_name = \Request::route()->getName();
?>
<!-- Start Header -->
<div class="header">
	<div class="wrapper cf">
		<div class="logo">
			<a href="https://jeevandeep.in/">JEEVANDEEP PRAKASHAN PVT. LTD.</a><span>enlightening minds for a brighter tomorrow</span>
		</div>
		<div class="menu">
			<ul class="cf">
				<li><a href="https://jeevandeep.in/">jeevandeep</a></li>
				<li><a href="https://jeevandeep.in/our-story.html">our story</a></li>
				<li><a href="https://jeevandeep.in/what-we-do.html">what we do</a></li>
				<li><a href="https://jeevandeep.in/lets-connect.html">lets connect</a></li>
				<li><a href="https://jeevandeep.in/work-with-us.html">work with us</a></li>
				<li><a href="https://jeevandeep.in/write-for-us.html">write for us</a></li>
                                <li class="active"><a href="{!! url(getLang() . '/store') !!}">store</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- End Header --> 