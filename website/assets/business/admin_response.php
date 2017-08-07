<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once("../data/config.php");
require_once("../data/DBController.php");

$db_handler = new DBController();
//if a photo has been submitted through the photo submission form
if(isset($_POST["url"]) && isset($_POST["category"]) )
{

        $db_handler->query("INSERT INTO gallery ( description, url, category) VALUES ( :description, :url, :category)");
        $db_handler->bind(':url', $_POST["url"], PDO::PARAM_STR);
        $db_handler->bind(':category', $_POST["category"], PDO::PARAM_INT);

        if(isset($_POST["description"]))
        {
                $db_handler->bind(':description', $_POST["description"], PDO::PARAM_STR);  
        }
        else
        {
                $db_handler->bind(':description', NULL, PDO::PARAM_STR); 
        }
        $db_handler->execute();
}//end of if photo sumbission
//else if a delete has occured instead of a submission
else if (isset($_POST["deleted_photo_url"]))
{
        $temp = "'".$_POST["deleted_photo_url"]."'";
        $query = 'DELETE FROM gallery WHERE url ='.$temp.'LIMIT 1';
        $db_handler->query($query);
        $db_handler->execute();
}






?>