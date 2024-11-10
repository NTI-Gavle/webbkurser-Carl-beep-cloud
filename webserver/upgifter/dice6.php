<?php session_start();
require 'ClassDice.php';
$_SESSION['o'] =1;
$_SESSION['p'] =1;


if (isset($_SESSION['o'])!=0) {
  $obj = new Dice(6);
  $_SESSION['o'] = 0;  

}


if (isset($_SESSION['p'])!=0) {
    $obj2 = new Dice(6);
    $_SESSION['p'] = 0;  
   
  }

if (isset($_POST['kast'])) {

    echo "<br>";
  echo  $obj->roll();
  echo $obj->getHistogram();
  echo "<br>";
  echo $obj2->roll();
  echo $obj2->getHistogram();

 }

 if (!isset($_POST['un'])) {
    session_unset();
 }
 

?>


<form action="" method="post">
    Rulla tärningen : <input name="kast" type="submit">
</form>

<br><br>

<form action="" method="post">
    <input name="un" value="unset" type="submit">
</form>