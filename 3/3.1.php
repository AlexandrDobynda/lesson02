<?php

class Human
{
	private static $count = 0;
	private $firstName;
	private $lastName;
	private $age; 

	public function __construct ($firstName = '', $lastName = '', $age = '')
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->age = $age;
	}
//===========================
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
	public function setAge($age)
	{
		$this->age = $age;
	}
// ===========================
	public function __get($name)
	{	
		return $this->$name;
	}

	public function getFullName()
	{
		return $this->firstName . ' ' . $this->lastName;
	}
}
/**
 * STUDENT
 */
class Student extends Human
{
	private static $count = 0;

	const TYPE_OCHN = 1;
	const TYPE_ZAOCHN = 2;

	private $type = self::TYPE_OCHN;
	private $course = 1;
	private $marks = [];
// ______________________________________

	public function setOchnoe($course = false) 
	{
		$course ? $this->course = $course : $this->course;
		$this->type = self::TYPE_OCHN;
	}
	public function setZaochnoe($course = false) 
	{
		$course ? $this->course = $course : $this->course;
		$this->type = self::TYPE_ZAOCHN;
	}

	public function getType()
	{
		return $this->type == 1 ? 'Ochnoe' : 'Zaochnoe';
	}

	public function getCourse()
	{
		return $this->course;
	}

	public function giveMark($value)
	{
		array_push($this->marks, $value);
	}

	public function getMarks()
	{
		echo "Marks of " . $this->getFullName() . ': <br>';
		
		foreach ($this->marks as $value) 
		{
			echo  $value . ', ';
		}
	}
}
/**
 * EMPLOYEE
 */
class Employee extends Human
{	
	private $salary;
	private $wageList = [];
	
	public function __construct($lastName, $salary)
	{
		parent::__construct('', $lastName);
		$this->salary = $salary;
	}

	public function setSalary($salary)
	{
		$this->salary = $salary;
	}

	public function giveSalary($date, $value = false)
	{
		if ($value) 
		{
			$this->wageList[$date] = $value;
		} else 
		{
			$this->wageList[$date] = $this->salary;
		}
		
	}

	public function checkWageList()
	{
		echo "Wage list of " . $this->getFullName() . ': <br>';

		foreach ($this->wageList as $key => $value) 
		{
			echo $key . ': ' . $value . ' money<br>';
		}
	}
}


// ------------------------------------------
		// TESTING

//-------------------------------------------

$employee1 = new Employee('Sidorov', 2500);
$employee1->setFirstName('Egor');
$employee1->giveSalary('25-april-1992', 2000);
$employee1->giveSalary('25-april-1993', 2200);
$employee1->giveSalary('25-april-1994');

$employee1->checkWageList();



$student1 = new Student('Alexandr', 'Dobynda', 26);
$student1->setZaochnoe(3);
$student1->giveMark(5);
$student1->giveMark(2);
$student1->giveMark(3);
$student1->giveMark(4);

echo $student1->getFullName() . '<br>';
echo 'age: ' . $student1->age . '<br>';
echo $student1->getType() . '<br>';
echo 'course: ' . $student1->getCourse(). '<br>';
$student1->getMarks(). '<br>';



?>