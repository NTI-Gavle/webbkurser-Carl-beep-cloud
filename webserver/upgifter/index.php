<?php

session_start()




?>


<h1>Test tärnign 1</h1>


<form action="dice.php" method="get">
   Antal Rullningar: <input name="rolls" type="number">
   <br>
   <input value="skicka" type="submit">
</form>


<h1>Test tärning 2</h1>
<form action="dice2.php" method="get">
  Rolls: <input name="r" type="number"><br>
  Times: <input name="t" type="number"><br>
  <input value="kolla" type="submit">
</form>

<h1>Test Tärning 3</h1>

<form action="dice3.php" method="get">
  Rolls: <input name="r" type="number"><br>
  Times: <input name="t" type="number"><br>
  <input value="Tärning 3" type="submit">
</form>

<form action="dice4.php" >
  <input value="Tärning 4" type="submit">
</form>

<form action="dice5.php" method="get">
  Sides Dice 1 <input name="r" type="number"><br>
  Sides Dice 2 <input name="r2" type="number"><br>
  Times: <input name="t" type="number">
  <input value="Tärning 5" type="submit">
</form>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tärningsexempel</title>
</head>
<body>


</body>
</html>