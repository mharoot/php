<?php

include_once("Elegant/Database.php");

class Model extends Database {

    private $query = NULL;
    private $where_clause_counter = -1;

    public $table_name = NULL;

    // function __construct() {
    //     $this->where_clause_counter = -1;
    // }
    
    public function all() {
        if ($this->table_name === NULL) {
            redirect('localhost/error404.php');
        } else {
            // check if table name exists
            $tableExists = $this->checkTableExist();
            if (!$tableExists)
                redirect('localhost/error404.php');

            $this->query('SELECT * FROM '.$this->table_name);
            return $this->resultset();
        }

    }



    public function where($col_name, $arg2, $arg3 ){
        $this->where_clause_counter++;
        if ( $this->where_clause_counter == 0 ) {
             $this->query =" WHERE ".$col_name.$arg2."'".$arg3."'";
        } else {
             $this->query .="AND ".$col_name.$arg2."'".$arg3."'";
        }
        return $this;
    }

    public function orWhere($col_name, $arg2, $arg3 ){
        $this->where_clause_counter++;
        if ( $this->where_clause_counter == 0 ) {
             $this->query =" WHERE ".$col_name.$arg2."'".$arg3."'";
        } else {
             $this->query .="OR ".$col_name.$arg2."'".$arg3."'";
        }
        return $this;
    }



    public function get(){
        $this->where_clause_counter = 0;
        $final_query = "SELECT * FROM ".$this->table_name;
        if ($this->query !== NULL) {
            $final_query .= $this->query;
            $this->query($final_query);
            return $this->resultset();
        }  else {
            return $this->all();
        }
    }

    private function checkTableExist() {
            $this->query("SHOW TABLES LIKE '".$this->table_name."'");
            $result = $this->execute();
            return $this->rowCount($result) > 0;
    }

    private function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
}

?>