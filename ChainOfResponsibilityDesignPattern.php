<?php 
/**
* Chain of Responsibility Design Pattern implementation in PHP
* Date: 2021-02-15
* Author: Hekmatullah Ehsan
* Chain of Responsibility Design Pattern: As the name suggests the chain of responsibility pattern creates a chain of 
* receiver objects for  objects for a request. This pattern decouples sender and receiver of a request based on type 
* of request. This pattern comes under behavioral patterns. 
*/

class HttpRequest {

	private $name     = null; 
	private $password = null; 

	public function __construct($request){
		$this->name     = $request['name']; 
		$this->password = $request['password'];
	}

	public function getName() {
		return $this->name;
	}

	public function getPassword() {
		return $this->password;
	}
}

abstract class Handler {

	private  $next; 

	public function __construct( $next) {
		$this->next = $next;
	}

	public  function handle($request){
		if($this->doHandle($request)) return;

		if($this->next != null) {
		   $this->next->handle($request);
		}

	}

	public abstract function doHandle(HttpRequest $request);

}

class Authenticator extends Handler {

	public function __construct( $next) {
		parent::__construct($next);
	}

	public function doHandle($request) {
	   $isValid = ($request->getName() ==='Admin' && $request->getPassword() ==='12345');
	   echo "Authentication \n";
       return !$isValid ; 
	}

}

class Compressor extends Handler {

	public function __construct($next) {
		parent::__construct($next);
	}

	public function doHandle(HttpRequest $request) {
	   echo "Compressing \n";
       return false; 
	}

}

class Logger extends Handler {

	public function __construct( $next) {
		parent::__construct($next);
	}

	public function doHandle(HttpRequest $request) {
	   echo "Logging \n";
       return false; 
	}

}

class WebServer {

	private $handler; 

	public function __construct($handler) {
      $this->handler = $handler;
	}

	public function handle($request) {
		$this->handler->handle($request);
	}
}

$compressor    = new Compressor(null); 
$logger        = new Logger($compressor);
$authenticator = new Authenticator($logger);

$server        = new WebServer($authenticator);
$server->handle(new HttpRequest(['name'=>'Admin', 'password'=>'12345']));



