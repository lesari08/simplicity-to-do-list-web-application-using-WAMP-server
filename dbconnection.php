
<?php

//This file holds a singleton class for the db connection

class Db_Connect 
{
	//making the variable static so that 1 single connection is shared
	//throughout the application 
	private static $connection = NULL;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(!isset(self::$connection)) //self::instance(static variables) $this->instance(non-static)
		{
			
			self::$connection = new mysqli('localhost', 'root', '','todo_db');
			
			//check connection to make sure it completed successfully 
			if(self::$connection->connect_error) 
			{
				//die() prints the message then exits the current script. No value is returned
				die("Connection failed: " . $connection->connect_error);
			}
			return self::$connection;
		}
		
		
	}
	
}

?>