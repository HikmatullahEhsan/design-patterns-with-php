<?php 
/**
* Observer Design Pattern implemenation in PHP
* Date: 2021-01-23
* Author: Hekmatullah Ehsan
* Observer Design Pattern : define a subscription mechanism to notify the changes in one 
* object to all its observer dependent objects.
*/


// Subscriber Interface
interface Subscriber {
	public function update($magazineEdition);
}


// Publisher
class MonthlyMagazine {

	private $subscribers =[];
	private $magazine;

	public function registerSubscriber(Subscriber $sub) {

		$this->subscribers[] = $sub;
		echo "Subscriber Added \n";
	}

	public function notifySubscribers() {

		foreach($this->subscribers as $subscriber) {
			$subscriber->update($this->magazine);
		}

	}

	public function publishmagazine($magazine) {
		$this->magazine = $magazine; 
		$this->notifySubscribers();
	}
}

// Concrete Subscriber
class ProgrammingTipsAndTricksMagazine implements Subscriber {

	private $subscriberName = null; 
	public function __construct(string $subscriberName) {
		$this->subscriberName = $subscriberName;
	}

	public function update($magazineEdition) {
		echo "Dear $this->subscriberName New magazine with name: $magazineEdition has been published \n";
	}
}

// Concrete Subscriber
class UnitTestingMagazine implements Subscriber {

	private $subscriberName = null; 
	public function __construct(string $subscriberName) {
		$this->subscriberName = $subscriberName;
	}

	public function update($magazineEdition) {
		echo "Dear $this->subscriberName New magazine with name: $magazineEdition has been published \n";
	}
}



// Client Code 
$publisher = new MonthlyMagazine();
$subscriber1 = new ProgrammingTipsAndTricksMagazine("Ahmad");
$subscriber2 = new UnitTestingMagazine("Khalid");

// Add subscribers to Observers
$publisher->registerSubscriber($subscriber1);
$publisher->registerSubscriber($subscriber2);

// Publish two magazine
$publisher->publishmagazine("How to Debug Code in PHP?");
$publisher->publishmagazine("CSS Anthology");
