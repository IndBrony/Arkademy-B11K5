<?php
	/**
	 * 
	 */
	class Database
	{
		private $host,
				$username,
				$password,
				$databaseName; 

		function __construct($host,$username,$password,$databaseName)
		{
			$this->host 		= $host;
			$this->username 	= $username;
			$this->password 	= $password;
			$this->databaseName = $databaseName;
		}

		public static function getConnection($database)
		{
			return mysqli_connect(
								  	$database->host, 
								  	$database->username, 
								  	$database->password,
								  	$database->databaseName
								 );
		}
	}

?>