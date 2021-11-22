<?php 
/**
* NUll Design Pattern implementation in PHP
* Date: 2021-01-26
* Author: Hekmatullah Ehsan
* NUll Design Pattern: it prevents the null exception error in objects.
* 
*/
// User class
class User {

    private $id; 
	private $name; 
	private $email;
	private $age;


	public function __construct($id, $name, $email, $age)
	{
		$this->id    = $id;
		$this->name  = $name;
		$this->email = $email;
		$this->age   = $age;
	}

	public function showUserInfo()
	{
		return "Name: ". $this->name. ', Email: '. $this->email.", Age: ". $this->age . "\n";
	}
    
	// return object in string format
	public function __toString()
	{
		return (string) $this->id;
	}
}

// NullUser class
class NullUser {

	public function showUserInfo()
	{
		return "There is no record found". "\n";
	}
    
	// return object in string format
	public function __toString()
	{
		return (string) $this->id;
	}
}

// Object creation & assign the objects into Array
$users[1] = new User(1,'Ahmad', 'Kabul, Afghanistan', 30);
$users[2] = new User(2,'Khalid', 'Logar, Afghanistan', 20);
$users[3] = new User(3,'Mike', 'New-York, USA', 24);


// search user in users Array
function searchUser($userId){
    global $users;
    if(in_array((string) $userId, $users)) return  $users[(string) $userId]->showUserInfo();
	
	return	 (new NullUser())->showUserInfo();
}

echo searchUser(3); // number three is existed and it will return the Mike's info
echo searchUser(4); // number four is not existed and it will return null user info
echo searchUser(1); 


