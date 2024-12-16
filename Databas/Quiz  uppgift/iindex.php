<?php
require 'quizconnect.php';





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<!-- As a heading -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Fransic Quiz dags</span>
  </div>
</nav>

<?php

$questions = ['questions2\1.php','questions2\2.php']; 
if (!isset($_SESSION['intesett'])) {
    $questionsnumber=0;
 $_SESSION['intesett'] = true;   

include $questions[$questionsnumber]; 
}

if (isset($_POST['Next'])) {
    $questionsnumber++;
    include $questions[$questionsnumber];
}

?>
<br>
<form action="" method="post">
    <input name="Next" value="Next" type="submit">
</form>



</body>
</html>
