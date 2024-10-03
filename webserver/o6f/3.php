<form action="" method="post">
Tal1: <input  name="T1" type="text"><br>
Tal2: <input name="T2" type="text"><br>
<input type="submit">
</form>


<?php


$T1 = $_POST['T1'];
$T2 = $_POST['T2'];




echo "Tal 1: " .  $T1;        
echo "<br>";
echo "Tal 2: " .  $T2;     
echo "<br>";
intval($T1);
intval($T2);

echo "Tal 1 / Tal 2 = " . round($T1 / $T2,2);

?>