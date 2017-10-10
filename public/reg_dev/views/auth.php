<?
ob_start();
$including_parent = "auth";
ini_set('display_errors', '1');
include_once'../core.php';
$core=new core();
$core->templateStart('default','Login and Verify, or Register');
	$core->include_script('uifunctions.js');
	$core->include_helper('jsfunctions');
	
	
	if(isset($_GET['p'])){
		if($_GET['p']=="registration"){
			redirect_view("register_mage","");
		}
	}
?>
	<script>
		$(document).ready(function(){
			$("#forgot_accountgf").click(function(){
				directTo("forgot?from=login");
			});
			$("#has_accountgf_no").click(function(){
				directTo("http://www.graceframe.com/cl_custom_reg.php?data_f=software_page");
			});
		});
		
	</script>
	<?
		doAjaxHandler('POST','LoginValidateB','LoginValidateF','auth_action','AuthResponse');
	?>
	<div id="inner" style="margin-top:10px;">
		<div id="login-box-reg">
			<h3>Please verify your account with us below</h3>
			<!--<form id="LoginValidateF" action="auth" method="post">
				<table style="margin-left:30px;" cellspacing="5px">
					<tr>
						<td class="align-right"><label for="user">Username</label></td>
						<td class="align-left"><input type="text" name="user[email]" value="<?=$_GET['user'];?>"/></td>
					</tr>
					<tr>
						<td class="align-right"><label for="password">Password</label></td>
						<td class="align-left"><input type="password" name="user[password]" value="<?=$_GET['pass'];?>"/></td>
					</tr>
					<tr>
						<input type="hidden" name="UserAuthLogin" value="<?=md5('true');?>"/>
						<td class="align-left"><button type="button" id="LoginValidateB">Login</button> </td>
					</tr>
				</table>
				<table>
					<tr>
						<td class="redborder"><button type="button" id="forgot_accountgf">I forgot my account information</button></td>
						<td><button type="button" id="forgot_accountgf_no">I don't have an account?</button></td>
					</tr>
				</table>
				<div id="AuthResponse">
					
				</div>
			</form>-->
		</div>
	</div>
<?
$core->templateEnd('default');
ob_end_flush();
?>