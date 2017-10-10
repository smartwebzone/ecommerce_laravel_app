
<?php
	
	function img ($url,$style=null){

		?>
		<img src="<?echo $url;?>" style="<?echo $style;?>"/>
		<?

	}

	
	function s_link ($url,$text,$r=null) {
		if($r == true){
			return '<a href="'.ROOT.'/'.$url.'">'.$text.'</a>';
		}else{
			echo '<a href="'.ROOT.'/'.$url.'">'.$text.'</a>';
		}
	}

	function a_link ($url,$text,$r=null) {
		if($r == true){
			return '<a href="'.$url.'">'.$text.'</a>';
		}else{
			echo '<a href="'.$url.'">'.$text.'</a>';
		}
		
	}

	function error ($what) {

		echo '<div class="error">'.$what.'</div>';

	}


	function warning ($what) {

		echo '<div class="warning">'.$what.'</div>';

	}


	function success ($what) {

		echo '<div class="success">'.$what.'</div>';

	}

	function redirect_view ($where) {
		header("Location:".ROOT.'/'.$where);
	}
	
	function redirect ($where) {
		header("Location:".$where);
	}
		
	function redirect_t ($where,$time){
	?>
		<meta http-equiv="refresh" content="<?echo $time;?>;url='<?echo $where;?>' "/>
	<?
	}
	
	function basic_link ($to,$title) {
		echo '<a href="'.$to.'">'.$title.'</a>';
	
	}
	


?>