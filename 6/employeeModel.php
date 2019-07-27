<?php
	include 'databaseConfig.php';

	class Employee
	{
		private $id,
				$name, 
				$work, 
				$salary;

		function __construct($id, $name, $work, $salary)
		{
			$this->id     = $id;
			$this->name   = $name;
			$this->work   = $work;
			$this->salary = $salary;
		}

		public static function insertToDatabase($employee)
		{
			$database = new Database("localhost", "root", "", "b11k5");
			return Database::getConnection($database)
							 ->query(
							 		"INSERT INTO Name 
							 		 VALUES('',
							 		    	'$employee->name', 
							 		    	$employee->work, 
							 		    	$employee->salary)"
							 		);
		}

		public static function selectEmployee($id)
		{
			$database = new Database("localhost", "root", "", "b11k5");
			return Database::getConnection($database)
							 ->query("SELECT * FROM employees WHERE Name.id = $id");
		}

		public static function selectAllEmployees()
		{
			$database = new Database("localhost", "root", "", "b11k5");
			return Database::getConnection($database)
							 ->query("SELECT * FROM employees");
		}

		public static function editEmployee($employee)
		{
			$database = new Database("localhost", "root", "", "b11k5");
			return Database::getConnection($database)
							 ->query(
							 		"UPDATE Name 
							 		 SET
							 		 name = '$employee->name', 
							 		 id_work = '$employee->work', 
							 		 id_salary = '$employee->salary'
							 		 WHERE 
							 		 id = $employee->id"
							 		);
		}
		public static function deleteEmployee($id)
		{
			$database = new Database("localhost", "root", "", "b11k5");
			return Database::getConnection($database)
							 ->query("DELETE FROM Name WHERE id = $id");
		}
	}
?>