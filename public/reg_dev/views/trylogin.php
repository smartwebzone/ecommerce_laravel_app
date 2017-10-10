<?
require_once'../core.php';
$core = new Core();

$core->import('Database');
$core->import('FormBuilder');
$core->templateStart('default','Try Logging In');
$core->session_lock(3);

	FormBuilder::startForm('TryLoginMage','modules/instant/module.auth_action.php','post');
	?>
		<script>
			$(function(){	
				$("#SubmitLogin").click(function(){
				  var data = $("form#TryLoginMage").serialize();
				  $.ajax({
					 url: "modules/instant/module.auth_action.php" ,
					 type: "POST",
					 data: data,
					 success: function(results){
						$("#ResponseBox").html(results);
	
					 }
				  });
				  return false;
			   });		
			});
		</script>
		<table style="padding:20px;">
			<?
				FormBuilder::addTInput("Email Address","text","user[email]");
				FormBuilder::addTInput("Password","password","user[password]");
				FormBuilder::addField("hidden","UserAuthLogin","true");
				FormBuilder::addTButton("Login","button","SubmitLogin");
			?>
		</table>
		<div id="ResponseBox">

		</div>
	<?
	FormBuilder::endForm();
$core->templateEnd('default');


?>