<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comp 490 Quiz 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once('navbar.php'); ?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="container">

    <form method="post" action="insertQuestion.php">
        Question:<br> <textarea rows="30" cols="80" name="question" id="question"></textarea><br><br>
        Answer:<br>
        T <input type="radio" name="answer" value="1"><br>
        F <input type="radio" name="answer" value="0"><br>
        <input class= "btn btn-success" type="submit">
    </form>

<?php
    if (isset($_POST['question']) && isset($_POST['answer']))
    {
        $q = filter_var($_POST['question'], FILTER_SANITIZE_MAGIC_QUOTES);
        $a = $_POST['answer'];
        include_once('Database.php');
        $db_handler = new Database();
        $query = "INSERT INTO questions (question, answer) VALUES ('".$q."',".$a.")";
        $db_handler->query($query);
        $db_handler->execute();
        echo "Inserted <br>Question: ".$q."<br>Answer: ".$a;


    }
?>

</body>
</html>