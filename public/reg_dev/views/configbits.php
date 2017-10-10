<?php
	ini_set('display_errors', '1');
	include('../includes/helpers/helper.swfunctions.php');

	if(isset($_GET['swids'])) {
		echo getConfigBits_wp($_GET['mpage'],$_GET['swids']);
	}
?>