<?
ob_start();
$including_parent = "registration";

require_once'../core.php';
$core=new core();
$core->templateStart('default','Registration');
$core->session_lock(3);

	$core->include_script('uifunctions.js');
	$core->include_helper('jsfunctions');
	$core->include_helper('htmlfunctions');
	$core->include_helper('cryptutil');
	$core->include_helper('xmlfunctions');
	$core->import('FormBuilder');


		
	if(isset($_GET['return']) AND $_GET['return'] == "success"){
		//when getting a return of the data just put into the database, verify that the cookie is present
		if(isset($_COOKIE['user_r_id_return'])){
			$cookie_acctnumber = strstr($_COOKIE['user_r_id_return'],'=');
			if(base64_decode($_GET['acct_num']) == $cookie_acctnumber){

				define('HOST','us-west-2');
				define('KEY','AKIAIFW5OZ2MOHBQPUCA');
				define('SECRET','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');
				
				require '../library/sdk/sdk.class.php';
				$storage = new AmazonS3();
				
				$single_acctnum = $cookie_acctnumber;
				$up_hash_fn = getUPHash(xstrbetween(base64_decode(strrev($_COOKIE['user_r_userpass_c'])),'<0>','</0>'));
				
				//look for the file in the S3 Cloud
				if(!$storage->if_object_exists(GAL_BUCKET,getAcctHash($up_hash_fn))) {
					//if its not there than we get to create it, which is exactly what we want to do
						$storage->create_object(
							GAL_BUCKET,
							$up_hash_fn,
							array(
							    'body' => "<0>$single_acctnum</0>"
							)
						);
					
				}
			
			}
		}else{
			die(error(ERROR_CONTACTUS));
		}
	}
?>

<?
	FormBuilder::startForm('RegistrationMage','http://www.graceframe.com/site/register_cl_custom.php','post');
?>
	<style>
		input {
			padding:4px;
			width:180px;
			height:12px;
			margin:2px;
		}
	</style>
	<h3>Please enter the information below to register for GraceFrame.com</h3>
	<table>
		<?
			FormBuilder::addTInput("First Name","text","data[sFirstName]");
			FormBuilder::addTInput("Last Name","text","data[sLastName]");
				FormBuilder::addTInput("City","text","data[sCity]",array('style'=>'width:70px;'));
				FormBuilder::addTInput("State","text","data[sState]",array('style'=>'width:40px;'));
				FormBuilder::addTInput("Phone Number","text","data[sPhoneNumber]",null,null,'<b>(xxx)-xxx-xxx</b>');
			FormBuilder::addTInput("Email Address","text","data[sEmailAddress]");
		?>
	</table>
	<table style="margin-left:25px;">
		<?	
			FormBuilder::addTInput("Enter a new Password","password","data[sPassword]");
			FormBuilder::addTInput("Confirm that Password","password","data[sPasswordC]");
			FormBuilder::addField("hidden","sRegisterUser","true");
		?>
	</table>
	<table>
		<?
			FormBuilder::addTButton("Complete Registration","submit","sSubmitRegistration");
		?>
	</table>
<?
	FormBuilder::endForm();
	
$core->templateEnd('default');
ob_end_flush();
?>