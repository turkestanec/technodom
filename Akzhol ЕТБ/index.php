<?php
class Person
{
    public $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    function displayInfo()
    {
        echo "Имя: $this->name<br>";
    }
}

class Employee extends Person
{
    public $company;
    function __construct($name, $company)
    {
        parent::__construct($name); 
        $this->company = $company;
    }
    function displayInfo()
    {
        echo "Имя: $this->name<br>";
        echo "Работает в $this->company<br>";
    }
}

$tom = new Employee("Tom", "Microsoft");
$tom->displayInfo();
?>
