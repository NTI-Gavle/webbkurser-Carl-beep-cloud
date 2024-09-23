
<form action="7,1.php" method="post">

 tal 1: <input name="ett" type="number">
<br>
tal 2: <input name="två" type="number">
<br>
tal 3: <input name="tre" type="number">
<br>
<input name="button1"  type="submit">

<?php

if(array_key_exists('button1', $_POST)) {
    slav();
}
function slav()
{
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
}
?>