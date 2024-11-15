<?php
session_start();
require 'ClassDice2.php';

//! laddar massa roliga saker
Dice::loadFromSession();

//! skapelsens 
if (isset($_POST['skick']) && isset($_POST['num'])) {
    Dice::addNewDice($_POST['num']);
}

if (isset($_POST['kast'])) {
   
    Dice::addNewDice(6);
    Dice::rollAllDices($_POST['kastning']);
}

if (isset($_POST['koll'])) {
    Dice::allKast();
}

if (isset($_POST['unset'])) {
    session_unset();
 
}
?>

<h3>du har en tärning vill du göra en till?</h3><br><br>
<form action="" method="post">
    Antal Sidor: <input name="num" type="number">
    <input name="skick" value="Skapa Tärning" type="submit">
</form>
<br>

<h2>Hur många kast vill du kasta med dina tärningar?</h2>
<form action="" method="post">
    Antal Kast: <input name="kastning" type="number">
    <input value="Kasta" name="kast" type="submit">
</form>
<br><br>

<form action="" method="post">
    <input name="koll" value="Visa Resultat" type="submit">
</form>
<br><br>


<form action="" method="post">
    <input value="Återställ" name="unset" type="submit">
</form>
