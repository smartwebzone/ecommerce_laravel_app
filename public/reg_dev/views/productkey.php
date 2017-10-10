<?
ini_set('display_errors', '1');
include_once'../core.php';
$core=new core();
$core->import('ProductKey');
$core->import('Database');
$core->include_helper('timeutil');


$db = connect_db("swreg");
$dbHelper = new DatabaseHelper($db);

if(isset($_GET['productkey'])) {
	$productKey = $_GET['productkey'];
}
//$productKey = "APQ5 B8TM 7EES QNRE";
	if(empty($productKey)) {
		die("The productkey must be set");
	}

$DATA['productKey'] = urldecode($productKey);
//$DATA['productKey'] = $productKey;
$DATA['mPage'] = "00000001";
$productKey = new ProductKey($DATA);
$debug = false;


try {
	$pkOutput = $productKey->decipher();
	
	foreach($pkOutput AS $key=>$data) {
		if($debug){
			echo $data."<Br/>";
		}else{
			echo"<{$key}>{$data}</{$key}><Br/>";
		}
	}
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>