<?

	
	class FormBuilder {
		
		static function startForm ($id,$action,$method) {
			echo '
				<form id="'.$id.'" action="'.$action.'" method="'.$method.'">
			';	
		}
		
		static function endForm () {
			echo '</form>';
		}
		
		static function addTInput ($label_name,$field_type,$field_nid,$field_styling=null,$field_value=null,$side_td=null) {
			echo '
				<tr>
					<td><label>'.$label_name.'</label></td>
					<td>
						<input type="'.$field_type.'"'.(isset($field_styling['class']) ? 'class="'.$field_styling['class'].'"':'').''.(isset($field_styling['style']) ? 'style="'.$field_styling['style'].'"':'').' id="'.$field_nid.'" name="'.$field_nid.'" '.(!empty($field_value) ? 'value="'.$field_value.'"':'').'/>
					</td>
					'.(!empty($side_td) ? '<td>'.$side_td.'</td>':'').'
				</tr>
			';	
		}
		
		static function addField ($field_type,$field_nid,$field_value) {
			echo '
				<input type="'.$field_type.'" id="'.$field_nid.'" name="'.$field_nid.'" value="'.$field_value.'">		
			';
			
		}
		
		static function addTButton ($label_name,$button_type,$submit_nid,$submit_styling) {
			echo '
				<tr>
					<td><button type="'.$button_type.'" id="'.$submit_nid.'" name="'.$submit_nid.'">'.$label_name.'</button></td>
				</tr>			
			';
			
		}
		
		static function addSpace () {
			echo '<tr><td><br/></td></tr>';
		}

		static function addLine () {
			echo '<tr><td><hr/></td></tr>';
		}
	}

?>