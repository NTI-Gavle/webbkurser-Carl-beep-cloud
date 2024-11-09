<?php
session_start();
require 'ClassDice.php';



@$_SESSION['arr'];



if([null !== $_GET['r']])
{

$_SESSION['r']= $_GET["r"];

$_SESSION['t'] = $_GET["t"];

}
$dice = new Dice ($_SESSION['r']);

echo implode(", ",$dice -> rollMultiple($_SESSION['t']));
$dice-> getHistogram();


?>