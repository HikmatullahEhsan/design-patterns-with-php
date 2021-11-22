<?php 
/**
* Facade Design Pattern implementation in PHP
* Date: 2021-01-22
* Author: Hekmatullah Ehsan
* Facade Design Pattern : Facade means front or face, we use the facade pattern to provide a simple interface to 
* a complex system.
*/
// Example: let suppose we send a push notification to mobile devices from server. 


// Connection Class
class Connection {

   public function __construct(string $IPAddress)
   {
   	  return $IPAddress.' server is connected';
   }

   public function disconnect(): void
   {
      
   }
}

// AuthToken Class
class AuthToken {

	public function __construct(string $token, string $key)
	{
        return $token. '& with the key:'. $key.' is provided and verified';
	}

}

// Message Class
class Message {

	private $msg = null; 

	public function __construct(string $msg)
	{
	   $this->msg = $msg;
	}

}

// NotificationServer Class
class NotificationServer {

	public function Connect(string $IPAddress)
	{
      return new  Connection($IPAddress);
	}

	public function Authenticate(string $appToken, string $appKey)
	{
      return new AuthToken($appToken, $appKey);
	}

	public function SendMessage(string $authToken, Message $newMsg, string $targetDevice)
	{
        echo 'The msg to this: '. $targetDevice. ' device has been sent';
	}
}


// NotificationServices Class
class NotificationServices {

	public function send(string $msg, string $targetDevice): void
	{
        $server = new NotificationServer();
        $connection = $server->Connect('127.0.0.1'); 
        $server->Authenticate('tokenId', 'AppKey');
        $server->SendMessage('tokenId', new Message($msg), $targetDevice);

        $connection->disconnect();

	}

}



(new NotificationServices())->send('hi, Whats up everyone?','798797-3242134');