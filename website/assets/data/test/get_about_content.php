<?php
//About 
$file = fopen("../txts/about.txt","r");
while(! feof($file))
{
    echo fgets($file);
}
fclose($file);
?>