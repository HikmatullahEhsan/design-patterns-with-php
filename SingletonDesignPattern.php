<?php 
/**
* Singleton Design Pattern implemenation in PHP
* Date: 2021-01-14
* Author: Hekmatullah Ehsan
* Singleton Design Pattern : the ability to create only one instiation from a class
*/

class DbConnection {

	private static $instance;
    
    // make constructor private despite create class Object by 'new keyword'
	private function __construct() {
	}
    

    // create an Object through static method rather than 'new keyword'
	public static function getInstance() {
        
        // check if the connection maybe has previous instance, if it isn't so create new one
		if (!(self::$instance instanceof DbConnection)) {

		    self::$instance = new DbConnection();

		}

		return self::$instance;
	}
}


// First object creation ( it creates an instance for the first time).
$conn1 = DBConnection::getInstance(); 

// Seocond object creation failed, because connection is already started by $conn1, instead return old instance
$conn2 = DBConnection::getInstance(); 

// Third object creation failed, because connection is already started by $conn1, instead return old instance
$conn3 = DBConnection::getInstance(); 



