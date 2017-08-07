<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once("../data/config.php");
require_once("../data/DBController.php");

$db_handler = new DBController();
session_start();

if(!isset($_SESSION["max_offset"]))
{
        $q = 'SELECT id FROM gallery WHERE category = '.$_SESSION["category"].' ORDER BY id DESC';
        $db_handler->query($q);
        $db_handler->execute();
        $_SESSION["max_offset"] = $db_handler->rowCount();
}

if(!isset($_SESSION["offset"])){
        $_SESSION["offset"] = 0;
}

if(isset($_POST["prev"]) && $_SESSION["offset"] != 0)
{


        if($_SESSION["offset"]>9){
                $_SESSION["offset"] -=10;
        }
        else{
            return;
        }

        //SELECT url FROM gallery WHERE category = 1 ORDER BY id DESC OFFSET 
        $q = 'SELECT url FROM gallery WHERE category = '.$_SESSION["category"].' ORDER BY id DESC LIMIT 10 OFFSET '.$_SESSION["offset"];
        $db_handler->query($q);
        $db_handler->execute();
}

if(isset($_POST["next"]) && $_SESSION["max_offset"]>10)
{
        if(!isset($_SESSION["offset"]))
        {
                $_SESSION["offset"] = 10;
                
        }
        else if($_SESSION["offset"] < $_SESSION["max_offset"] - 10)
        $_SESSION["offset"] +=10;
        else
            return;
        //SELECT url FROM gallery WHERE category = 1 ORDER BY id DESC OFFSET 
        $q = 'SELECT url FROM gallery WHERE category = '.$_SESSION["category"].' ORDER BY id DESC LIMIT 10 OFFSET '.$_SESSION["offset"];
        $db_handler->query($q);
        $db_handler->execute();
}

session_write_close(); 

?>