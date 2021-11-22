<?php 
/**
* Strategy Design Pattern implementation in PHP
* Date: 2021-01-19
* Author: Hekmatullah Ehsan
* Strategy Design Pattern : to use different variants of Algorithms within an object and be 
* be able to switch from one algorithm to another during run-time.
*
*/


// Strategy Interface
interface ContactGateway {
	public function contact(): string;
}
// Concrete Strategy
class MakeConnectionByEmail implements ContactGateway{
   
   public function contact(): string 
   {
       return 'Contacted by Email';
   }
}
// Concrete Strategy
class MakeConnectionBySMS implements ContactGateway{
   
   public function contact(): string 
   {
       return 'Contacted by SMS';
   }
}
// Concrete Strategy
class MakeConnectionByMobile implements ContactGateway{
   
   public function contact(): string 
   {
       return 'Contacted by Mobile';
   }
}


// Context
class Contact{
	private $connectionGateway;

	public function __construct(ContactGateway $connectionGateway)
	{
       $this->connectionGateway= $connectionGateway;
	}

	public function contact()
	{
		return $this->connectionGateway->contact();
	}
}


// Client code
$contact = new Contact(new MakeConnectionByEmail());
echo $contact->contact();