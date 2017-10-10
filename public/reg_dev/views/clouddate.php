<?
	function getDateToToday ($date=null) {
		$startDate = strtotime(date("1/1/2014"));
		if(!empty($date)) {
			$todayDate = strtotime($date);
		}else{
			$todayDate = time();
		}
		
		$endResult = (($todayDate - $startDate)/86400);

		return floor($endResult);
	}



	echo "<DATE>".getDateToToday($_GET['date'])."</DATE>";

?>