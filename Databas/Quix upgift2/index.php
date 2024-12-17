<?php require 'quizconnect.php';
session_start(); 

global $correctAnswer;
$questions = ['','questions\1.php','questions\2.php','questions\3.php','questions\slutet.php']; 

if(!isset($_SESSION['questnum']))
{
$_SESSION['questnum'] =1;
}
if (isset($_POST['ans'])) {
    correctcheck($_POST['svar'],$correctAnswer);
    $_SESSION['questnum']++;
 }
 function correctcheck($svar,$correctAnswer) {
    echo "Svar: " . htmlspecialchars($svar) . "<br>";
    echo "Correct Answer: " . htmlspecialchars($correctAnswer) . "<br>";
    
    if ($svar === $correctAnswer) {
        echo "rätt";
    } else {
        echo "fel";
    }
}




 if(isset($_POST['unsetbtn'])){
    session_unset();
 }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include $questions[$_SESSION['questnum']]; ?>
    

<br><br><br>

<form action="" method="post">
    <input value="unset" name="unsetbtn" type="submit">
</form>
</body>
</html>

