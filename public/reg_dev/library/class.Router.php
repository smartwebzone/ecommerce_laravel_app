<?
	class Router {
		
		private $routes;
		
		function __construct (){
		
			require_once (dirname(__FILE__).'/../includes/root/routes.php');
			$this->routes=$rou;
		
		}
		

		function sdirect ($key){
			header("Location:".ROOT."/". $this->routes[$key]['path'] ."");
		}
	
	
	}

?>