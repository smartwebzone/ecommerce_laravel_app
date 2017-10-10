<?php

class DatabaseHelper {
    
    private $connection = null;
    
    public function __construct ($db){
        
		$this->connection = $db;
    }
   
    //This should not be used to get a list of records in order to loop through them (this is only to get one record of columns)
	public function getArrayResult ($fields, $table, $where) {
		if(is_array($fields)) {
			$fields = implode(',',$fields);
		}
		
		$query = $this->connection->query("SELECT {$fields} FROM {$table} WHERE {$where}");
		
		if($query->num_rows > 0) {
			$result = $query->fetch_array(MYSQLI_ASSOC);
			return $result;
		}else{
			return false;
		}
	}
	
	public function getSingleResult ($field, $table, $where) {
		$query = $this->connection->query("SELECT {$field} FROM {$table} WHERE {$where}");
		
		if($query->num_rows > 0) {
			$result = $query->fetch_array(MYSQLI_ASSOC);
			return $result[$field];
		}else{
			return false;
		}
	}
	
	public function insertInto ($table,$values,$returnID=false) {
		$columnsString = array();
		$valuesString = array();
		foreach($values AS $key=>$value) {
			$columnsString[] = $key;
			$valuesString[] = "'".$value."'"; //wrap the 'x' around the value for insertion
		}
		
		$query = "INSERT INTO {$table} (".implode(',',$columnsString).") VALUES (".implode(',',$valuesString).")";
		
		$this->connection->query($query);
		if($this->connection->affected_rows) {
			if($returnID) {
				return $this->connection->insert_id;
			}
			return true;
		}else{
			return false;
		}
	}
	
	public function update ($table,$values) {
		$setString = array();
		$whereString = array();
		
		foreach($values['set'] AS $column=>$value) {
			$setString[] = $column."='".$value."'";
		}
		
		foreach($values['where'] AS $param=>$value) {
			switch($param) {
				case("AND"):
					$whereString[] = "AND";
				break;
				case("OR"):
					$whereString[] = "OR";
				break;
				default:
					$whereString[] = $param.$value[0]."'".$value[1]."'"; //that's the column- modifier(<,>,=) -value
				break;
			}
		}
		
		
		$query = "UPDATE {$table} SET ".implode(',',$setString)." WHERE (".implode(' ',$whereString).")";
		echo $query."<br/>";
		$this->connection->query($query);
		if($this->connection->affected_rows) {
			return true;
		}else{
			return false;
		}
	}
	
	public function exists ($table,$column,$value) {
		
		$query = "SELECT {$column} FROM {$table} WHERE {$column}='{$value}'";
		
		$query = $this->connection->query($query);
		if($query->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}
    
}

?>