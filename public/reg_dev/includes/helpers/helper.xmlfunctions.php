
<?

	function xstrbetween($string,$delim1,$delim2){
	    // "foo a foo" becomes: array(""," a ","")
	 
	 	// data,<1>blahblahba</1>
	 	$string = strstr ($string , $delim1);
	    $string = split($delim2, $string, 2);
	    
		$string = $rstring[0];
	    // we check whether the 2nd is set and return it, otherwise we return an empty string
	    return isset($string) ? $string : '';
	}

?>