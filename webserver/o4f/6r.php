<?php
$h;
$ett = $_POST['ett'];
$två = $_POST['två'];
$tre = $_POST['tre'];

$ett = (int)$ett;
$ett = (int)$två;
$ett = (int)$tre;

$h = $ett + $två + $tre;

$h = $h/3;

echo $h;
?>