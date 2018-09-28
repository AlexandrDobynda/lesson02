<?php 

class Human
{
	private static $count = 0;
	private $firstName;
	private $lastName;
	private $age; 

	public function __construct ($firstName, $lastName, $age)
	{

		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->age = $age;
	}

	public function __get($name)
	{	
		return $this->$name;
	}


	public function getFullName()
	{
		return $this->firstName . ' ' . $this->lastName;
	}
}





 ?>