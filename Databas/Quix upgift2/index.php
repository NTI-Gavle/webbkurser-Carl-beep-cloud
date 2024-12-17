<?php require 'quizconnect.php';
session_start(); 


global $correctAnswer;
$questions = ['','questions\1.php','questions\2.php','questions\3.php','questions\slutet.php']; 
$RAF =[];

$_SESSION['RAD']=$RAF;

if(!isset($_SESSION['questnum']))
{
$_SESSION['questnum'] =1;
}
if (isset($_POST['ans'])) {
    correctcheck($_POST['svar'],$correctAnswer);
    $_SESSION['questnum']++;
 }
 function correctcheck($svar,$correctAnswer) {
  
    if ($svar === $correctAnswer) {
        $right="Du fick Rätt";
        $RAF[$_SESSION['questnum']-1] = $right;
    } else {
        $Fel="Du Fick fel";
        $RAF[$_SESSION['questnum']-1] = $Fel;
    }
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


</body>
</html>

