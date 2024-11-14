
<?php
session_start();
require 'ClassDice.php';

$dice = new Dice (7);
$dice -> rollMultiple(25);
$dice2 = new Dice (2);
$dice2 -> rollMultiple(25);
$dice3 = new Dice (10);
$dice3 -> rollMultiple(25);
$dice4 = new Dice (5);
$dice4 -> rollMultiple(25);
$dice5 = new Dice (70);
$dice5 -> rollMultiple(25);
$dice6 = new Dice(4);
$dice6-> rollMultiple(1000);

echo Dice::allKast();
?>