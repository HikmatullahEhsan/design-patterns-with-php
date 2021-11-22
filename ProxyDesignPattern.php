<?php 
/**
* Proxy Design Pattern implementation in PHP
* Date: 2021-01-22
* Author: Hekmatullah Ehsan
* Proxy Design Pattern : proxy means agent or representative. it provides a substitute or placeholder for another object. A proxy controls 
* access to the original object, allowing you to perform something either before or after the request gets through to the
* original object.
*/

// ebook interface
interface Ebook {
	public function countBookPage(string $bookName);
}


class Library {
	public $books = [];

	public function addBook(string $bookName):void
	{
		echo "book is adding to Library " . $bookName."\n";
		$this->books[] = $bookName;
	}

	public function showBook(string $bookName): string
	{
		echo "book is showing to Library " . $bookName ."\n";
		return $this->books[$bookName];
	}

}

// RealEbook class which implements ebook interface
class RealEbook implements Ebook {


	public function __construct()
	{
	}

	public function countBookPage(string $bookName)
	{
	    //  implementation goes here for counting the book pages, for this we only the character of the book name
	   return (int) strlen($bookName);
	}

	
}

// BookProxy class which also implements ebook interface
class BookProxy implements Ebook {

	private $bookObject = null;
	public function __construct()
	{
	}

	public function countBookPage(string $bookName)
	{
		if($this->bookObject == null) $this->bookObject = new RealEbook($bookName);

		return $this->bookObject->countBookPage($bookName);
	}

}


// client Implementation 
$library = new Library();
$library->addBook('PHP Anthology');
$library->addBook('JavaScript End to End security');
$library->addBook('Linux Server');
$library->addBook('Top Unit Testing Techniques');


$book = new BookProxy();
echo $book->countBookPage('PHP Anthology');
echo $book->countBookPage('PHP mm');

