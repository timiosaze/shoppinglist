<?php 

class User {
	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'email', 'password');
	public $id;
	public $username;
	public $email;
	public $password;

	public static function password_encrypt($the_password){
		return password_hash($the_password, PASSWORD_BCRYPT, array('cost'=>12));
	}
	
	
}

