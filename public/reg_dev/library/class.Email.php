<?

	class Email {
		
			public function sendEmail ($to,$subject,$content){
				$to = $to;
				$subject = $subject;
				$message = '<html><body>
								<div style="">
								'.$content.'
								</div>
							</body></html>';
				$headers = "From: " . DEFAULT_EMAIL_FROM . "\r\n";
				$headers .= "Reply-To: " .DEFAULT_EMAIL_REPLY ."\r\n";
				$headers .= "CC: m\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					if(mail($to,$subject,$message,$headers)){
						return true;
					}else{
						return false;
					}

			}

	
	}

?>