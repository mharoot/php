<?php

include_once("Elegant/Database.php");

class Model extends Database {

    public $table_name = NULL;

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

    public function getWhere($arg1, $arg2, $arg3 ) {
        $q = "SELECT * FROM ".$this->table_name." WHERE ".$arg1.$arg2."'".$arg3."'";
		$this->query($q);
		$result = $this->resultset();
		return $result[0];
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