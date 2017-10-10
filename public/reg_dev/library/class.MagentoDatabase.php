<?php

	class MagentoDatabase {
		
		private static $db = null;
		
		public static function MagentoDatabase () {
			$host = "localhost";
			$user = "c2mag";
			$password = "GfGr@ce1*";
			$database = "c2magento";
			
			self::$db = new mysqli($host,$user,$password,$database);
			
			if(mysqli_connect_errno($db)){
				echo "Failure";	
			}else{
				echo "Success!";	
			}
		}
		
		public static function addNewUser ($email) {
			self::$db->query("INSERT INTO customer_entity (entity_type_id,attribute_set_id,website_id,email,group_id,store_id,is_active) VALUES ('1','0','1','{$email}','1','1','1') ");
			$return_id = $db->mysql_insert_id();
			if(self::$db->affected_rows){
				return $return_id;
			}else{
				return false;
			}
		}
	}


?>