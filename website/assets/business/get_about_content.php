<?php

//About 
//how cool is this... because i am requiring this at the index the file extension must be data not ../data wow!  this is prolly the same with js thing earlier i was confused with...
$file = fopen("data/txts/about.txt","r");

while(! feof($file))

{

    echo fgets($file);

}

fclose($file);

?>