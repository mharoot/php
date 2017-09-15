<?php

include_once("model/Book.php");
include_once("model/DBController.php");

class Elegant extends DBController {

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