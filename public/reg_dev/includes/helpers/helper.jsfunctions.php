<?

	function doAjaxHandler ($type,$button_id,$form_id,$request,$response_id) {
		?>	
		<script>
		$(function(){	
			$("#<?=$button_id;?>").click(function(){
			  var data = $("form#<?=$form_id;?>").serialize();
			  $.ajax({
				 url: "modules/instant/module.<?=$request;?>.php" ,
				 type: "<?=$type;?>",
				 data: data,
				 success: function(results){
					 $("#<?=$response_id;?>").html(results);

				 }
			  });
			  return false;
		   });		
		});
		</script>
		<?
	}

?>