<?
	
	//$orig_aNum = "3398799";
	//$aNum = "0000000000" . $orig_aNum;
	//$acct_num = substr($aNum,-10,10);
	
	//echo 'Original Account Number: <span style="color:red;">'.$orig_aNum.'</span>';
	//	echo'<br/>';
	//echo $acct_num;
	
	ini_set('display_errors','1');
	//if(!$including_parent) die();
	require_once('../core.php');
	$core = new Core();
	//$core->templateStart("default","Authentication");
	
	
			$core->import("AccountHandler");
			
			$account = new AccountHandler();
			
				$account->setUser($_GET['email']);
			
			try {
				echo $account->getSetPassword();
			} catch (Exception $e) {
				error($e->getMessage());
			}
	
	//$core->templateEnd('default');
?>