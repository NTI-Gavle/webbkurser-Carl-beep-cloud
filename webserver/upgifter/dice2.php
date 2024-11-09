<?php
require 'ClassDice.php';
$r = $_GET["r"];

$tim = $_GET["t"];

$dice = new Dice ($r);

 implode(", ",$dice -> rollMultiple($tim));
$dice-> getHistogram();
echo $dice ->getSarr();
?>