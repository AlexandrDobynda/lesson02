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

class Student extends Human
{
	private static $count = 0;

	// const TYPE_OCHN = 1;
	// const TYPE_ZAOCHN = 2;

	private $course;
	private $type;
	private $marks = [];
	// private $type = self:: TYPE_OCHN;

	public function setCourse($course)
	{
		$this->course = $course;
	}

	public function getCourse()
	{
		return $this->course;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getType()
	{
		return $this->type;
	}

	public function giveMark($value)
	{
		array_push($this->marks, $value);
	}

	public function getMarks()
	{
		print_r( $this->marks);
	}
}

// ------------------------------------------
		// TESTING

//-------------------------------------------

$human1 = new Human('Alexandr', 'Dobynda', 26);

$student1 = new Student('Tolik', 'Ivanov', 20);

$student1->setCourse(3);
$student1->setType('ZAOCHN');
$student1->giveMark(5);
$student1->giveMark(2);
$student1->giveMark(3);
$student1->giveMark(4);

echo $student1->getFullName() . '<br>';
echo $student1->getType() . '<br>';
echo $student1->getCourse(). '<br>';
$student1->getMarks(). '<br>';




 ?>