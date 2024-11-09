<?php
session_start();
require 'ClassDice.php';


$r = $_GET["r"];

$r2 = $_GET["r2"];

$tim = $_GET["t"];

$dice = new Dice ($r);
implode(", ",$dice -> rollMultiple($tim));

$dice2 = new Dice ($r2);
implode(", ",$dice2 -> rollMultiple($tim));

Dice::allKast();