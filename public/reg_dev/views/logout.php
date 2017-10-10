<?
ini_set('display_errors', '1');
ob_start();
	include'../core.php';
	$core = new Core();
	
	echo 'hi';
	$core->import('Session');
	$session = new Session();
	$session->stop();
	
	redirect(ROOT.'/');
ob_end_flush();
?>