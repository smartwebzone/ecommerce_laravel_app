<?
ob_start();
ini_set('display_errors', '1');
include_once'core.php';
$core=new core();
$core->session_lock(2);
$core->templateStart((isset($_SESSION['user_id']) ? 'user':'default'),'Welcome');
	
?>
	<div id="inner" style="margin-top:10px;">
		<?warning('Welcome to your account. More features and options will be available here.');?>
	</div>
<?
$core->templateEnd('default');
ob_end_flush();
?>