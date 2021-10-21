<?php 

class List {
	//database connection and table name
	private $connection;
	private $table_name = 'lists';

	//object properties
	public $id;
	public $list;
	public $user_id;

	public function __construct($database){
		$this->connection = $database;
	}

	public function find_all($user_id){
		$this->user_id = $user_id;
		
	}


}
