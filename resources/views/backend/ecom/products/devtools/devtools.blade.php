<?php
/**
 * Created by PhpStorm.
 * User: Phillip
 * Date: 11/4/2016
 * Time: 12:35 PM
 */
?>

<div class="form-group col-sm-12">
	<button class="btn btn-primary " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Dev Tools </button>
</div>
<div style="clear:both"></div>
<div class="collapse" id="collapseExample">
	<div class="well">

		<button class="btn btn-primary " id="addlorem" type="button">add Lorem</button>&nbsp;

		&nbsp;	<a class="pull-right btn btn-primary button" data-role="button"  onclick="ProductDevTools.FakeMeta();">Add Meta</a> &nbsp;
		&nbsp;	<a class="pull-right btn btn-primary button" data-role="button"  onclick="ProductDevTools.FakeFeature();">Add Features</a>&nbsp;
		&nbsp;	<a class="pull-right btn btn-primary button" data-role="button"  onclick="ProductDevTools.FakePricing();">Add Pricing</a>&nbsp;
		&nbsp;	<a class="pull-right btn btn-primary button" data-role="button"  onclick="ProductDevTools.init();">Add Everything</a>&nbsp;

		<button type="button" class="pull-right btn btn-default" onclick="ProductDevTools.ShowLayoutIndoInConsole();">Display Layout in Console</button>

		<br style="clear:both"/>
	</div>
</div>


@if($app->environment('local'))
	<script> if( window.console && window.console.log ) {
			console.log("%c DEVTOOLS.blade.php", 'background: #222; color: yellow', "loaded");
		}
	</script>
@endif