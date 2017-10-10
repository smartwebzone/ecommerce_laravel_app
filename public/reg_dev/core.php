<?

/*
# Core.php
# All frameworks and settings for the Redgem Framework
# VERSION 1.6 (c) 2013 Bennett Gibson
*/

#------------------------------------------------------

require_once'includes/config.inc.php';
require_once'includes/root/functions.php';
include_once'includes/root/routes.php';
include_once'includes/root/defines.php';

# Session Check 

//----------------
//COMBINATIONS ARE:
## FDL (False or no session, Direct Login)
## TGP (True or session started, Get Permissions)
## TDA (True or session started, Direct Account)  
//----------------


//main class Core

class Core {

	public static function CoreSL ($session_checking,$layout_name,$title){
		self::session_lock($session_checking);
		self::templateStart($layout_name,$title);
	}
	
	public static function session_lock ($check) {
		session_start();
		
		switch($check){
			
			case(1):
				if(isset($_SESSION[DEFAULT_SID_INDEX])){
					$user_id  = $_SESSION[DEFAULT_SID_INDEX];
				}
			break;
			case(2):
				if(!isset($_SESSION[DEFAULT_SID_INDEX])){
					redirect(ROOT.'/trylogin');
				}
			break;
			case(3):
				if(isset($_SESSION[DEFAULT_SID_INDEX])){
					redirect(ROOT.'/');
				}
			break;
		}
	
	}
	
	private static function __fetchLayoutStart($layout,$title) {
		$this_title=$title;
		include_once('template/layouts/'.$layout.'_start.layout.php');
	}
	
	private static function __fetchLayoutEnd($layout) {
		include_once('template/layouts/'.$layout.'_end.layout.php');
	}

	//Use templateStart to pull in a layout by name, use layout end to pull in an ending layout
	public static function templateStart ($layout_name,$title) {
		if($layout_name){
			self::__fetchLayoutStart($layout_name,$title);	
		}else{
			echo'You did not select a layout.';
		}
	}

	public static function hasPermissions($permission) {
		switch($permission){
			case("admin"):
				session_start();
				if($_SESSION['user_perms']=="admin"){
					return true;
				}else{
					return false;
				}
			break;
			case("user"):
				session_start();
				if($_SESSION['user_perms']=="user"){
					return true;
				}else{
					return false;
				}
			break;
		}
	}
	
	
	public static function include_script ($src) {
		echo'<script src="'.ROOT.'/scripts/'.$src.'" type="text/javascript"></script>';
	}
	
	public static function include_helper ($file) {
		include_once('includes/helpers/helper.'.$file.'.php');
	}
	
	public static function import ($file) {
		include_once('library/class.'.$file.'.php');
	}


	public static function templateEnd ($layout_name) {
		self::__fetchLayoutEnd($layout_name);
	}

}

function connect_db ($database) {
	$db=new mysqli("localhost",DB_USER,DB_PASSWORD,$database);
	  if (mysqli_connect_errno($db)) {
	  	echo "Failed to connect to the Database: " . mysqli_connect_error();
	  }else{
		return $db;
	  }
}
?>