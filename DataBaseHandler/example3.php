<?php
//    //todo add to databse

    require_once("../config.php");
    require_once("../DBController.php");

    $db_handler = new DBController();



if (isset($_POST["points"])) {
    // Decode our JSON into PHP objects we can use
    $points = json_decode($_POST["points"]);
    $temp_string = "";
    //$array = array();///todo insert into db instead of array
    $i = 0;
    while($i<strlen($points))
    {
        //foreach space found we stop building the string
        if($points[$i]==' ')
        {
            //$array[]=$temp_string;//todo insert into db

            //query insert into gallery 
            $query = "INSERT INTO gallery ( url, category) VALUES ( '".$temp_string."', '1'); ";
            //db_query
            $db_handler->query($query);
            //execute
            $db_handler->execute();

            $temp_string = "";
        }
        else
        $temp_string.=$points[$i];
        $i++;
    }
    //print_r($array);



}


?>
