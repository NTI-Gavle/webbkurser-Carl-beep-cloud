<?php
require 'quizconnect.php';

global $ttexten;
global $aalt1;
global $aalt2;
global $aalt3;
global $aalt4;
global $correctAnswer;
$questions = ['','questions2\1.php','questions2\2.php']; 



if (!isset($_SESSION['intesett'])) {  
$questionsnumber=1;
 $_SESSION['intesett'] = true;   
read();
}

// Fetch the text and alternatives with ID 1
function read(){

global $dbconn, $questionsnumber, $ttexten, $aalt1, $aalt2, $aalt3, $aalt4, $correctAnswer;

$sql = "SELECT text, alt1, alt2, alt3, alt4, correct FROM quizbas WHERE id = :id";
$stmt = $dbconn->prepare($sql);
$id = $questionsnumber; // ID to fetch
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Initialize variables
$ttexten = $row['text'] ?? "No text found.";
$aalt1 = $row['alt1'] ?? "No alt1.";
$aalt2 = $row['alt2'] ?? "No alt2.";
$aalt3 = $row['alt3'] ?? "No alt3.";  // kanske funkar['alt.correct']; 
$aalt4 = $row['alt4'] ?? "No alt4.";
 $correctAnswer = 'alt' . $row['correct'];
//echo $correctAnswer;

}

function correctcheck($correctAnswer) {
    if ($_POST['svar'] == $correctAnswer) {
    echo "rätt";
    } else {
       echo "Fel";
      
    }
    unset($_POST['svar']);
    unset($_POST['ans']);
    unset($correctAnswer);
}


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



include_once $questions[$questionsnumber];



if (isset($_POST['ans'])) {
  correctcheck($correctAnswer);
}

if (isset($_POST['Next'])) {
  $questionsnumber++;
read();

  include_once $questions[$questionsnumber];

}

//include $questions[$questionsnumber];
?>
<br>
<form action="" method="post">
    <input name="Next" value="Next" type="submit">
</form>



</body>
</html>
