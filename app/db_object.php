<?php 

class Db_object {

	private function has_the_key_attribute($the_key_attribute){
		$class_properties_array = get_class_vars(get_class($this));
		//returns true or false depending on the existence of the property in the class
		return array_key_exists($the_key_attribute, $class_properties_array);
	}

	public static function instantiation($the_result_row){
		//Get the name of the class the static method is called in
		$class_object = new get_called_class();

		//check whether the properties of the class exist in the database rows
		foreach ($the_result_row as $the_key_attribute => $value) {
		 	if($class_object->has_the_key_attribute($the_key_attribute)){
		 		//store the values of the row using the_key_attribute as the key
		 		$class_object->$the_key_attribute = $value;
		 	}
		 } 

		 return $class_object;
	}

	public static function find_by_query($sql){
		global $database;
		$query = $database->query($sql);
		$object_array = array();

		while($row = mysqli_fetch_assoc($query)){
			$object_array[] = static::instantiation($row);
		} 

		return $object_array;
	}

	public static function find_all_by_user($user_id){
		return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id = $user_id ");
	}

	public static function find_by_id($id, $user_id){
		$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id AND user_id = $user_id LIMIT 1 ");

		return !empty($the_result_array) ? array_shift($the_result_array) : false; 
	}

	public static function find_user_id($id){
		$the_result_array = static::find_by_query("SELECT user_id FROM " . static::$db_table . " WHERE id = $id");
		return !empty($the_result_array) ? array_shift($the_result_array) : false; 

	}
}

