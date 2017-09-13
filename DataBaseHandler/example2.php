<?php
ini_set('display_errors',1);
error_reporting(E_ALL);


if(isset($_POST["category"]))
{

        session_start();
        $_SESSION["category"] = $_POST["category"];
        require_once("../data/config.php");
        require_once("../data/DBController.php");
        $db_handler = new DBController();
        $q = 'SELECT id FROM gallery WHERE category = '.$_SESSION["category"].' ORDER BY id DESC';
        $db_handler->query($q);
        $db_handler->execute();
        $_SESSION["max_offset"] = $db_handler->rowCount();



        $_SESSION["offset"] = 0;
        $_SESSION["category"] = $_POST["category"];
        $q = 'SELECT url FROM gallery WHERE category = '.$_SESSION["category"].' ORDER BY id DESC LIMIT 10 OFFSET '.$_SESSION["offset"];
        $db_handler->query($q);
        $db_handler->execute();
        session_write_close();
}


?>
