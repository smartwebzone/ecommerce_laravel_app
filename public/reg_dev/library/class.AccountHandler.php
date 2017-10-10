<?php

	include_once('class.Database.php');
	include_once('class.Session.php');
	
	class AccountHandler {
		
		private $database = null;
		private $user = array();
		
		public function AccountHandler () {
			$database = new DatabaseCon();
			$this->database = $database->connect();
		}
		
		public function setUser ($value) {
			$this->user['email'] = $value;
		}
		
		public function setPassword ($value) {
			$this->user['password'] = $value;	
		}
		
		public function verify () {
			//try to get the email and pull it down first
			$find_email = $this->database->query("SELECT entity_id FROM customer_entity WHERE email='".$this->user['email']."'");
			if($find_email->num_rows == 1){
				$temp = $find_email->fetch_array();
					$this->user['entity_id'] = $temp['entity_id'];
				unset($temp);
				$valid = true;
			}else{
				$valid = false;
			}
			
			if($valid) {
				//get the users password hash and check it against the entered one
				$user_password = DatabaseCon::get_result($this->database->query("SELECT value AS value FROM customer_entity_varchar WHERE attribute_id='12' AND entity_id='".$this->user['entity_id']."'"));
					$user_p_hash = explode(':',$user_password);
					$database_hash = $user_p_hash[0];
					
						$newhash = md5($user_p_hash[1] . $this->user['password']);
						
				if($newhash == $database_hash){
					
					$session = new Session();
					$data = array(
						'user_id' => $this->user['entity_id'],
						'user_email' => $this->user['email'],
						'user_fullname'=> $this->getFullNameUser(),
						'step' => 'deck_screen',
					);
					
					//DO 10-digit adder here for the entity id
					$session->start($data);
					
					die(redirect_t(ROOT.'/',.5));
				}else{
					throw new Exception('Password invalid. Please try another password or a different account. If you need to reset your password you can do so here: 
					'.a_link('https://store.graceframe.com/cart/customer/account/forgotpassword/','Reset Password',true).'');
				}
						
			}else{
				throw new Exception('The account could not be found in our records, you can try the "forgot password" option below or try making a new account '.s_link('register_mage?re_from=login_need_account','Here',true).'.');
			}
		}

		public function getFullNameUser () {
			$first_name = DatabaseCon::get_result($this->database->query("SELECT value AS value FROM customer_entity_varchar WHERE entity_id='".$this->user['entity_id']."' AND attribute_id='5'"));
			$last_name = DatabaseCon::get_result($this->database->query("SELECT value AS value FROM customer_entity_varchar WHERE entity_id='".$this->user['entity_id']."' AND attribute_id='7'"));
			
			return $first_name.' '.$last_name;			
		}
		
		
		//For testing purposes (see view: test) so that we can reset any user password in Magento
		public function getSetPassword() {
			$find_email = $this->database->query("SELECT entity_id FROM customer_entity WHERE email='".$this->user['email']."'");
			if($find_email->num_rows == 1){
				$temp = $find_email->fetch_array();
					$this->user['entity_id'] = $temp['entity_id'];
				unset($temp);
				$valid = true;
			}else{
				$valid = false;
			}
			
			if($valid) {
				$up_hash[0]='123456';
				$up_hash[1]='RH';
					
				$newhash = md5($up_hash[1] . $up_hash[0]);
				return $newhash.':'.$up_hash[1];
			}else{
				throw new Exception('The account could not be found in our records, you can try the "forgot password" option below or try making a new account.');
			}
					
		}

		/*public function hash($data) {
		    return md5($data);
		}
		 
		public function validateHash($password, $hash) {
		    $hashArr = explode(':', $hash);
		    ....
		    return $this->hash($hashArr[1] . $password) === $hashArr[0];
		    ....
		}*/
		
	}


?>