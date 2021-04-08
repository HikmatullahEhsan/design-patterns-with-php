<?php 
/**
* Adaptor Design Pattern implemenation in PHP
* Date: 2021-01-18
* Author: Hekmatullah Ehsan
* Adaptor Design Pattern : allows objects with incompatible interfaces to collaborate,
* adaptor class serves as the bridge between some existing service code & our app code.
*/

// Target/client
interface Charging {
	public function charging();
}


// Adaptee/Service
class LaptopCharger {
	public function laptopCharging(String $laptoopModel) {
		echo "The charger used to charge the laptop: ' $laptoopModel'\n";
	}
}

// Adapter
class LaptopChargerAdapter implements Charging {

	private $charger;
	private $laptopModel;

	public function __construct(LaptopCharger $laptopCharger, String $laptopModel) {

		$this->charger = $laptopCharger;
		$this->laptopModel = $laptopModel;
	}


	public function Charging() {
		$this->charger->laptopCharging($this->laptopModel);
	}
}


function clientCode(Charging $Charging) {
	$Charging->charging();
}

$laptopCharger= new LaptopCharger();
$laptopChargerAdapter = new LaptopChargerAdapter($laptopCharger, "Lenovo Y520");

clientCode($laptopChargerAdapter);