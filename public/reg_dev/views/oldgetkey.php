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
 * dev_id is the referenced id that links to the software/account provided devID
 */
 
 if(!(isset($_GET['password']) && $_GET['password'] == "Br@d3232")) {
 	die();
 }
$db = connect_db("swreg");
$dbHelper = new DatabaseHelper($db);

	if(!isset($_GET['acctnum']) || !isset($_GET['devid'])) {
		die("The account number and device ID must be set");
	}
	
$accountNumber = $_GET['acctnum'];
$devID = $_GET['devid'];

$account_id = $dbHelper->getSingleResult("id","accounts","acctnum='{$accountNumber}'");
$dev_id = $dbHelper->getSingleResult("id","devices","devid='{$devID}'");
$software = $dbHelper->getArrayResult("swid,purchase_date_cts,expiration_date_cts","software","account_id='{$account_id}' AND dev_id='{$dev_id}'");

$DATA['mDevID'] = $devID;
$DATA['mConfigs'] = "10010000000000000000000000000000000000000000000000";
$DATA['mRemove'] = "10";
$DATA['mTimeStamp'] = $software['purchase_date_cts']; //get the current date (timestamp) position number in the sequence since Jan 1, 2014
$DATA['mCountDown'] = $software['expiration_date_cts'];

if(isset($_GET['data'])) {
	$data = explode(',',$_GET['data']);
	$DATA['mConfigs'] = $data[0];
	$DATA['mRemove'] = $data[1];
	$DATA['mTimeStamp'] = $data[2]; //get the current date (timestamp) position number in the sequence since Jan 1, 2014
	$DATA['mCountDown'] = $data[3];
}

$DATA['mNature'] = "1";

foreach($DATA AS $key=>$data) {
	echo $key." ".$data.'<br/>';
}

$skeymaker = new SKeyMaker($DATA);

echo"Your Generated Software Key should appear below: <br/>";
$skeymaker->doString();
?>