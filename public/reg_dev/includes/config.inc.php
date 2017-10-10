<?
/*
#Includes - Config.php 
#Settings for Powerhouse (RedGem)
*/

# Settings

define ('DEVELOPMENT_MODE',true);

	if(DEVELOPMENT_MODE){
		define ('ROOT','https://www.graceframe.com/site/reg_dev');
		define ('IMG_DIR',ROOT.'/template/img');
		define ('CURRENT_ENVIRONMENT','dev');
	}else{
		define ('ROOT','https://www.graceframe.com/site/reg_dev');
		define ('IMG_DIR',ROOT.'/template/img');
		define ('CURRENT_ENVIRONMENT','live');
	}

define ('DB_HOST','localhost');
/* OLD DB setup
/* define ('DB_USER','c2mag');
 * define ('DB_DEFAULT','c2magento');
 */
define ('DB_USER','root');
define ('DB_DEFAULT','swreg');
define ('DB_PASSWORD','GfGr@ce1*');
define ('SITE_TITLE','Software Registration');
define ('DEFAULT_EMAIL_FROM', 'register@cabinlogic.com');
define ('DEFAULT_EMAIL_REPLY', 'support@graceframe.com');

#SESSION

define ('DEFAULT_SID_INDEX','user_id');

?>