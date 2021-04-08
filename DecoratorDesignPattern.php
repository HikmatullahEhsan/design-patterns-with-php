<?php 
/**
* Decorator Design Pattern implemenation in PHP
* Date: 2021-01-19
* Author: Hekmatullah Ehsan
* Decorator Design Pattern : add new behaviors to existing objects by placing these objects inside 
* special wrapper object that contain the behaviors.
*/


// Base Component
interface Pizza {
	public function getDesc(): string;
}

// Concrete Compenent
class Vagiterian implements Pizza {
	public function getDesc(): string
	{
		return "Vagiterian";
	}
}

class Chicken implements Pizza {
	public function getDesc(): string{
		return "Chicken";
	}
}

// Base Decorator
class PizzaTopping implements Pizza {
	protected $pizza;

	public function __construct(Pizza $pizza)
	{
		$this->pizza = $pizza;
	}


	public function getDesc(): string 
	{
		return $this->pizza->getDesc();
	}
}


// Concrete Decorator
class ExtraCheese extends PizzaTopping {
	public function getDesc(): string
	{
		return parent::getDesc(). ' Cheese';
	}
}

// Concrete Decorator
class Jalapeno extends PizzaTopping {
	public function getDesc(): string
	{
		return parent::getDesc(). ' Jalapeno';
	}
}


function makingPizza(Pizza $pizza) 
{
	echo $pizza->getDesc();
}

$pizza = new Vagiterian(); // create pizza object
$pizza = new ExtraCheese($pizza); // create a decorator object by passing the pizza object
$pizza = new Jalapeno($pizza); // create a decorator object by passing the pizza object


makingPizza($pizza);