<?php
require_once("../config.php");
require_once("../DBController.php");
$db_handler = new DBController();


    //db_query
    $db_handler->query("Truncate table gallery");
    //execute
    $db_handler->execute();

//DOORS 1
$file = fopen("../txts/doors.txt","r");
while(! feof($file))
{
    //query insert into gallery 
    $query = "INSERT INTO gallery ( url, category) VALUES ( '".fgets($file)."', '1'); ";
    //db_query
    $db_handler->query($query);
    //execute
    $db_handler->execute();
}

fclose($file);

//GATES 2
$file = fopen("../txts/gates.txt","r");
while(! feof($file))
{
    //query insert into gallery 
    $query = "INSERT INTO gallery ( url, category) VALUES ( '".fgets($file)."', '2'); ";
    //db_query
    $db_handler->query($query);
    //execute
    $db_handler->execute();
}

fclose($file);

//STAIRS 3
$file = fopen("../txts/stairs.txt","r");
while(! feof($file))
{
    //query insert into gallery 
    $query = "INSERT INTO gallery ( url, category) VALUES ( '".fgets($file)."', '3'); ";
    //db_query
    $db_handler->query($query);
    //execute
    $db_handler->execute();
}

fclose($file);



//OTHER 4
$file = fopen("../txts/others.txt","r");
while(! feof($file))
{
    //query insert into gallery 
    $query = "INSERT INTO gallery ( url, category) VALUES ( '".fgets($file)."', '4'); ";
    //db_query
    $db_handler->query($query);
    //execute
    $db_handler->execute();
}

fclose($file);



?>
