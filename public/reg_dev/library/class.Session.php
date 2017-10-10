<?

	class Session {
	
		public $data;
		
		function Session ($session_data=null) {
			$this->data = $session_data;
		}
		
		public static function restrict ($checkfor) {
			require_once('library/class.Router.php');
			$router=new Router();
			session_start();
			
			if(isset($checkfor)){
				switch($check){
					
					case(1):
						if($_SESSION[DEFAULT_SID_INDEX]){
							$user_id  = $_SESSION[DEFAULT_SID_INDEX];
						}
					break;
					case(2):
						if(!$_SESSION[DEFAULT_SID_INDEX]){
							redirect_t($route['forcelogin']);
						}
					break;
					case(3):
						if($_SESSION[DEFAULT_SID_INDEX]){
							redirect_t($route['loggedin']);
						}
					break;
				}
			}

		}	
	
		public function start ($session_data=null) {
			session_start();
			if(!empty($session_data)){ $this->data = $session_data; }
				foreach($this->data AS $key=>$value) {
					$_SESSION[$key] = $value;
				}
		}
		
		public function stop () {
			session_start();
				unset($_SESSION);
			session_destroy();
		}
	
	}

?>