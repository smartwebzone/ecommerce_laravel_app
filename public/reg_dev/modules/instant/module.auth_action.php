<?php
	ini_set('display_errors','1');
	//if(!$including_parent) die();
	require_once('../../core.php');
	$core = new Core();
	//$core->templateStart("default","Authentication");
	
		if(isset($_POST['UserAuthLogin'])){
			$core->import("AccountHandler");
			
			$account = new AccountHandler();
			
				$account->setUser($_POST['user']['email']);
				$account->setPassword($_POST['user']['password']);
			
			try {
				$account->verify();
			} catch (Exception $e) {
				error($e->getMessage());
			}
		}
	
	//$core->templateEnd('default');
?>