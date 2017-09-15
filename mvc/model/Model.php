<?php

include_once("model/Book.php");
include_once("model/Elegant.php");

class Model extends Elegant {



	public function __construct()  
	{  
			parent::__construct();
			$this->table_name = 'books';
	}



	public function getBookList()
	{
		return $this->all();
	}
	
	public function getBook($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->getBookList();
		return $allBooks[$title];
	}
	
	
}

?>