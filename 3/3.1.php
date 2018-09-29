<?php

class Human
{
	protected static $count = 0;
	private $firstName;
	private $lastName;
	private $age; 

	public function __construct ($firstName = '', $lastName = '', $age = '')
	{
		self::$count++;

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

	public function count()
	{
		echo 'Human count: ' . self::$count . '<br>';
	}}
/**
 * STUDENT
 */
class Student extends Human
{
	protected static $count = 0;

	const TYPE_OCHN = 1;
	const TYPE_ZAOCHN = 2;

	private $type = self::TYPE_OCHN;
	private $course = 1;
	private $marks = [];
// ______________________________________

	public function __construct ($firstName = '', $lastName = '', $age = '')
	{
		self::$count++;

		parent::__construct($firstName, $lastName, $age);
	}

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

		echo '<br><br>';
	}

	public function count()
	{
		echo 'Student count: ' . self::$count . '<br>';
		echo 'Student count/all human: ' . self::$count . '/' . parent::$count  .  '<br>';
	}
}
/**
 * EMPLOYEE
 */
class Employee extends Human
{	
	protected static $count = 0;
	protected static $onlyEmployeeCount = 0;

	private $salary;
	private $wageList = [];
	
	public function __construct($lastName, $salary = false)
	{
		self::$count++;
		static::$onlyEmployeeCount++;

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
		echo '<br>';
	}

	public function __toString()
	{
		return $this->getFullName() . '. Salary: ' . $this->salary;
	}

	public function count()
	{
		echo 'Employee count: ' . self::$onlyEmployeeCount . '<br>';
		echo 'Employee count/all human: ' . self::$onlyEmployeeCount . '/' . parent::$count  .  '<br>';
		echo 'Employee count/all employee: ' . self::$onlyEmployeeCount . '/' . self::$count  .  '<br>';
	}
}
/**
 * Manager
 */
class Manager extends Employee
{
	protected static $count = 0;
	protected static $onlyEmployeeCount = 0;

	private $listOfEmloyees = [];
	
	public function __construct( $lastName)
	{
		static::$onlyEmployeeCount++;
		self::$count++;

		parent::__construct($lastName);
	}

	public function addEmployee($employeeId)
	{

		$this->listOfEmloyees[$employeeId->lastName] = $employeeId;
	}

	public function removeEmployee($lastName)
	{
		unset($this->listOfEmloyees[$lastName]);
	}


	public function checkEmployeesList()
	{
		echo "Employees list of  " . $this->getFullName() . ': <br>';

		foreach ($this->listOfEmloyees as $key => $value) 
		{
			echo  $value . '<br>';
		}

		echo  '<br>';
	}

	public function count()
	{
		echo 'Manager count: ' . self::$count . '<br>';
		echo 'Manager count/all employee: ' . self::$count . '/' . parent::$count  .  '<br>';
	}


}
// ------------------------------------------
		// TESTING

//-------------------------------------------

$human1 = new Human('Petr', 'Borovskiy', 50);
echo 'Human: ' . $human1->getFullName() . '<br>';

$student1 = new Student('Alexandr', 'Dobynda', 26);
$student1->setZaochnoe(2);
$student1->giveMark(5);
$student1->giveMark(2);
$student1->giveMark(3);
$student1->giveMark(4);

echo 'Student: ' . $student1->getFullName() . '<br>';
echo 'age: ' . $student1->age . '<br>';
echo $student1->getType() . '<br>';
echo 'course: ' . $student1->getCourse(). '<br>';
$student1->getMarks();



$employee1 = new Employee('Sidorov', 2500);
$employee2 = new Employee('Petrov', 10000);
$employee3 = new Employee('Elkin', 4444);

$employee1->setFirstName('Egor');
$employee1->giveSalary('25-april-1992', 2000);
$employee1->giveSalary('25-april-1993', 2200);
$employee1->giveSalary('25-april-1994');

$employee2->giveSalary('25-april-1992', 3000);
$employee2->giveSalary('25-april-1993', 9999);
$employee2->giveSalary('25-april-1994');

$employee1->checkWageList();
$employee2->checkWageList();



$manager1 = new Manager('Nikolenko');
echo $manager1->getFullName()  . '<br>';
$manager1->addEmployee($employee1);
$manager1->addEmployee($employee2);
$manager1->addEmployee($employee3);


$manager1->checkEmployeesList();
$manager1->removeEmployee('Petrov');
$manager1->checkEmployeesList();


echo "Counters: <br>";
$human1->count();
$student1->count();
$employee1->count();
$manager1->count();


?>