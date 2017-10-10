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
 
 /*if(!(isset($_GET['password']) && $_GET['password'] == "Br@d3232")) {
 	die();
 }*/
$db = connect_db("swreg");
$dbHelper = new DatabaseHelper($db);

	//if(!isset($_GET['acctnum']) || !isset($_GET['devid'])) {
	//	die("The account number and device ID must be set");
	//}
/*
$accountNumber = $_GET['acctnum'];
$devID = $_GET['devid'];

if(!$account_id = $dbHelper->getSingleResult("id","accounts","acctnum='{$accountNumber}'")){
	die("<ERROR>The account does not exist</ERROR>");
}
if(!$device = $dbHelper->getArrayResult("*","devices","devid='{$devID}' AND account_id='{$account_id}'")) {
	die("<ERROR>The device does not exist</ERROR>");
}
$software = $dbHelper->getArrayResult("swid,purchase_date_cts,expiration_date_cts","software","account_id='{$account_id}' AND device_id='{$device['id']}'");
*/
$devID = "TYUS";
$mPage = "00000000"; 
$device['configs'] = "010000000000000000000000000000000000000000";
$software['expiration_date_cts'] = 458;
$device['remove'] = "01";
$device['nature'] = "1";

$DATA['mDevID'] = $devID;
$DATA['mPage'] = $mPage;
$DATA['mConfigs'] = $device['configs'];
$DATA['mRemove'] = $device['remove'];
$DATA['mTimeStamp'] = getCTSPosition(); //get the current date (timestamp) position number in the sequence since Jan 1, 2014
$DATA['mCountDown'] = $software['expiration_date_cts'] - $DATA['mTimeStamp']; 
$DATA['mNature'] = $device['nature'];

/*
foreach($DATA AS $key=>$data) {
	echo $key." ".$data.'<br/>';
}
*/

$skeymaker = new SKeyMaker($DATA);

echo"<KEY>{$skeymaker->doString()}</KEY>";
?>