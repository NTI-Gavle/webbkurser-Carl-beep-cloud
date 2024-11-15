<?php
session_start();
require 'ClassDice2.php';


Dice::loadFromSession();

if (isset($_POST['oj'])) {
    Dice::addNewDice(10);  
}

if(isset($_POST['o']))
{
    Dice::rollAllDices(15);
}


if(isset($_POST['og']))
{
    Dice::allKast();
}


if(isset($_POST['oga']))
{
    session_unset();
}

?>



<form action=""method="post">
    <input value="gör en tärning till" name="oj" type="submit">
</form>

<form action=""method="post">
    <input value="tryck = bestäm att du kastar 15 gånger" name="o" type="submit">
</form>

<form action=""method="post">
    <input value="kastar tänringarna" name="og" type="submit">
</form>

<form action=""method="post">
    <input value="förinta allting" name="oga" type="submit">
</form>

