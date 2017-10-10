<?

ini_set('display_errors', '1');
include_once'../core.php';
$core=new core();
$core->import('SKeyMaker');
$core->import('Database');
$core->include_helper('timeutil');

//AS OF NOW
/*
 * There is a difference between dev_id and devid(devID) in the database and system
 * dev_id is the referenced id that links to the software/user provided devID
 */
 
 if(!(isset($_GET['password']) && $_GET['password'] == "Br@d3232")) {
 	die();
 }
 
 	$db = connect_db("swreg");
	$dbHelper = new DatabaseHelper($db);

 	$acctNum = $_GET['acctnum'];
	$devID = $_GET['devid'];
	$configs = $_GET['configs'];
	$remove = $_GET['remove'];
	
	$CLEAN['purchase_date'] = str_replace('-','/',$_GET['pd']);
	$CLEAN['expiration_date'] = str_replace('-','/',$_GET['ed']);
	
	$purchaseDateCTS = getCTSPosition($CLEAN['purchase_date']);
	$expirationDateCTS = getCTSPosition($CLEAN['expiration_date']);
	//$timestamp = getCTSPosition($_GET['pd']);
	//$countdown = $expirationdate - $purchaseDate;
	
	//this is an old account number
	if($dbHelper->exists("accounts","acctnum",$_GET['acctnum'])) {
		//this is an old device ID as well
		if($dbHelper->exists("devices","devid",$_GET['devid'])) {
			//only update this account's device's information
	
			$account_id = $dbHelper->getSingleResult("id","accounts","acctnum='{$_GET['acctnum']}'");
			$device_id = $dbHelper->getSingleResult("id","devices","devid='".$_GET['devid']."' AND account_id='{$account_id}'");
			
			$deviceArray = array(
				"set" => array(
					"configs"=>$_GET['configs'],
					"remove"=>$_GET['remove'],
					"nature"=>"1"
				),
				"where" => array(
					"id"=>array('=',$device_id),
				)
			);
			
			$dbHelper->update("devices",$deviceArray);
			
			$softwareArray = array(
				"set" => array(
					"purchase_date"=>date('n/d/y',strtotime($CLEAN['purchase_date'])),
					"purchase_date_cts"=>$purchaseDateCTS,
					"expiration_date"=>date('n/d/y',strtotime($CLEAN['expiration_date'])),
					"expiration_date_cts"=>$expirationDateCTS
				),
				"where" => array(
					"account_id"=>array('=',$account_id),
					"AND",
					"device_id"=>array('=',$device_id),
				)
			);
			$dbHelper->update("software",$softwareArray);
	
		}else{
			//make a new device ID and insert new data, all for old account number
			$account_id = $dbHelper->getSingleResult("id","accounts","acctnum='{$_GET['acctnum']}'");
			$deviceArray = array(
				"account_id"=>$account_id,
				"devid"=>$_GET['devid'],
				"configs"=>$_GET['configs'],
				"remove"=>$_GET['remove'],
				"nature"=>"1"
			);
			$device_id = $dbHelper->insertInto("devices",$deviceArray,true);
			
			$softwareArray = array(
				"account_id"=>$account_id,
				"device_id"=>$device_id,
				"account_id"=>$account_id,
				"purchase_date"=>date('n/d/y',strtotime($CLEAN['purchase_date'])),
				"purchase_date_cts"=>$purchaseDateCTS,
				"expiration_date"=>date('n/d/y',strtotime($CLEAN['expiration_date'])),
				"expiration_date_cts"=>$expirationDateCTS
			);
			$dbHelper->insertInto("software",$softwareArray);
		}
 	}else{
	
		$accountArray = array(
			"acctnum"=>$_GET['acctnum']
		);
		$account_id = $dbHelper->insertInto("accounts",$accountArray,true);
		
	
		$deviceArray = array(
			"account_id"=>$account_id,
			"devid"=>$_GET['devid'],
			"configs"=>$_GET['configs'],
			"remove"=>$_GET['remove'],
			"nature"=>"1"
		);
		$device_id = $dbHelper->insertInto("devices",$deviceArray,true);
		
		$softwareArray = array(
			"account_id"=>$account_id,
			"device_id"=>$device_id,
			"purchase_date"=>date('n/d/y',strtotime($_GET['pd'])),
			"purchase_date_cts"=>$purchaseDateCTS,
			"expiration_date"=>date('n/d/y',strtotime($_GET['ed'])),
			"expiration_date_cts"=>$expirationDateCTS,
		);
		$dbHelper->insertInto("software",$softwareArray);
	
	}
	echo "update successful";
	

?>