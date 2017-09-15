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
		$q = "SELECT * FROM books WHERE title = '".$title."'";
		$this->query($q);
		$result = $this->resultset();
		return $result[0];
	}
	
	
}

?>