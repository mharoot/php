<?php

include_once("Elegant/Model.php");

class Book extends Model {



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
		// $q = "SELECT * FROM books WHERE title = '".$title."'";
		// $this->query($q);
		// $result = $this->resultset();
		// return $result[0];

        //to
        return $this->where('title', '=', $title )->orWhere('id','=',2)->get();
	}
	
	
}

?>