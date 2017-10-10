<?
	
	//get the sent data and send a simple response
	if(isset($_GET)) {
		
		$count = 1;
		foreach($_GET AS $key=>$gdata) {
			echo "<".$key.">".$_GET[$key]."</".$key.">";
			$count++;
		}
	}
	echo 'Success! You sent: '.count($_GET);

?>