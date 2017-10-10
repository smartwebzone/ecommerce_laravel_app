<?
	
	function getConfigBits($swidList) {
		if(empty($swidList)) {
			return false;
		}
		$originalCB = "00000000000000000000000000000000000000000000000000";
		if(!is_array($swidList)) {
			$swidList = explode(',',$swidList);
		}
		
		$returnCB = $originalCB;
		
		foreach($swidList AS $swid) {
			$swidconfig = simplexml_load_file('../private/swidxref.xml');
			$bitPosition = $swidconfig->SWIDXREF->{$swid};
			
			$returnCB = substr_replace($returnCB,"1",$bitPosition,0);
		}
		return $returnCB;
	}
	
	function getConfigBits_wp ($mPage,$swidList) {
		if(empty($swidList)) {
			return false;
		}
		$originalCB = "000000000000000000000000000000000000000000";
		if(!is_array($swidList)) {
			$swidList = explode(',',$swidList);
		}
		$returnCB = $originalCB;
		$mPage = 'n'.$mPage; //We cannot start with a number for the pages MUST BE AN 8 BIT string
		
		$swidconfig = simplexml_load_file('../private/swidmap.xml');
		$thisConfigPage = $swidconfig->{$mPage};
		$itemCount = $thisConfigPage->iCOUNT;

		foreach($swidList AS $swid) {
			
			//$bitPosition = 0;
			
			for($x = 0;$x < $itemCount; $x++)
			{
				if ($thisConfigPage->{"n".$x} == $swid)
				{
					//$bitPosition = $x;			
					$returnCB = substr_replace($returnCB,"1",$x,1);
					break;
				}
			}
			
		}
		return $returnCB;
	}


?>