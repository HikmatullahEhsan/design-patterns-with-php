<?php
 
/**
* Factory Design Pattern implementation in PHP
* Date: 2021-01-14
* Author: Hekmatullah Ehsan
* Factory Design Pattern : Provides interface for creating objects in superclasses, but 
* allows subclass to alter the type of objects that will be created,
* and separates the object creation code from code which uses the product
*/

// The Product interface declares the operations for all concrete product
interface Call{
	public function connect(): void;
	public function dial(): void;
	public function endConnect(): void;
}


// ViberCalling class implements Call interface
// Concrete product providing implementations of Product interface
class ViberCalling  implements Call {

	public function connect():void {
		echo "it is going to start and connect with Viber Server \n";
	}

	public function dial():void {
		echo "it is going to dial  with Viber Server \n";
	}

	public function endConnect():void {
		echo "it is going to end the connection with Viber Server \n";
	}
}

// WhatsAppCalling class implements Call interface
// Concrete product providing implementations of Product interface
class WhatsAppCalling implements Call{
	public function connect():void {
		echo "it is going to start and connect with WhatsApp Server \n";
	}

	public function dial():void {
		echo "it is going to dial  with WhatsApp Server \n";
	}

	public function endConnect():void {
		echo "it is going to end the connection with WhatsApp Server \n";
	}
}

// TelegramCalling class implements Call interface
// Concrete product providing implementations of Product interface
class TelegramCalling implements Call{
	public function connect():void {
		echo "it is going to start and connect with Telegram Server \n";
	}

	public function dial():void {
		echo "it is going to dial  with Telegram Server \n";
	}

	public function endConnect():void {
		echo "it is going to end the connection with Telegram Server \n";
	}
}


// The Creator class or Superclass declares the factory method
abstract class Caller {
    // Factory method
	abstract function getCallerAgency(): Call;

	public function makeCalling()
	{
		$transport = $this->getCallerAgency();
		$transport->connect();
		$transport->dial();
		$transport->endConnect();
	}

}


/**
* Clients Area
* The objects are created in client area. 
*/


// The Concrete Creator or SubClass override the factory method & change the type of object created
class ViberCaller extends Caller {

	public function getCallerAgency(): Call
	{
		return new ViberCalling(); // altering the object type into Viber
	}

}

// The Concrete Creator or SubClass override the factory method & change the type of object created
class WhatsAppCaller extends Caller{


	public function getCallerAgency(): Call
	{
		return new WhatsAppCalling(); // altering the object type into WhatsApp
	}

}

// The Concrete Creator or SubClass override the factory method & change the type of object created
class TelegramCaller extends Caller{

	public function getCallerAgency(): Call
	{
		return new TelegramCalling(); // altering the object type into Telegram
	}
}


// The client code works with an instance of concrete creator or subclass
function startCalling(Caller $caller)
{
	$caller->makeCalling();
}


startCalling(new ViberCaller());    // calling the function individually 
startCalling(new WhatsAppCaller()); // calling the function individually 
startCalling(new TelegramCaller()); // calling the function individually 
