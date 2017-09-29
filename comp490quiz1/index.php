<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comp 490 Quiz 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="container">
        <table id='test' class="table table-striped">
<?php

include_once('Database.php');
$db_handler = new Database();
$query = "SELECT * FROM questions";
$db_handler->query($query);
$test = $db_handler->resultset();


for ($i = 0; $i < sizeof($test); $i++) {?>
            <tr>
                <td><?php echo $i + 1; ?> </td>
                <td><?php echo $test[$i]['question']; ?></td>
                <td>
                    T <input type="radio" name="answer" value="1">
                    F <input type="radio" name="answer" value="0">
                </td>
            </tr>
<?php


}?>
        </table>
        <button class="btn btn-primary" id = "submit_test">Submit</button>
        <script>
            var submit_test = document.getElementById('submit_test');
            var test = document.getElementById('test');
            submit_test.onclick = function() {
                var rows  = test.getElementsByTagName('tr');
                for ( var i = 0; i < rows.length; i++) {
                    var r = rows[i];
                    console.log(r.getElementsByTagName('input'));
                };
            };
        </script>
    </body>
</html>
