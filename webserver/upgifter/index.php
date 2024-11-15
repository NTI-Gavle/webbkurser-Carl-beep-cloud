<?php

session_start()




?>
<h1>KOlla längst ned</h1>
<br><br>

<h1>Test tärning 2</h1><br>
<p>Skriver ut en tärning med antal rull och antal kast</p>
<form action="dice2.php" method="get">
  Rolls: <input name="r" type="number"><br>
  Times: <input name="t" type="number"><br>
  <input value="kolla" type="submit">
</form>

<h1>Test Tärning 3</h1><br>
<p>Typ samma som 2an</p>
<form action="dice3.php" method="get">
  Rolls: <input name="r" type="number"><br>
  Times: <input name="t" type="number"><br>
  <input value="Tärning 3" type="submit">
</form>

<h3>tärning 4</h3><br>
<p>har gjort 6 tärningar och skriver ut dem med olika antal kast</p>
<form action="dice4.php" >
  <input value="Tärning 4" type="submit">
</form>

<h3>tärning 5</h3><br>
<p>du väljer sidor på 2 tänringar och sen hur många kast du ska kasta med dem.</p>
<form action="dice5.php" method="get">
  Sides Dice 1 <input name="r" type="number"><br>
  Sides Dice 2 <input name="r2" type="number"><br>
  Times: <input name="t" type="number">
  <input value="Tärning 5" type="submit">
</form><br><br>
<h3>tärning 6</h3><br>
<p>Du kastar 2 tärningar en gång</p>

<form action="dice6.php" method="get">
  <input type="submit">
</form>
<br>


<h2> tärning 8 </h2><br>
<p>skriv antalet kast du vill göra då hände det på 6 tärningar med olika mängd sifor</p>
<form action="dice8.php">
  <input value=" ska kolla en sak!!!!!!" type="submit">
</form><br><br>


<h1>EFter Denna rad så är allting gjorde med ClassDice2 inte ClassDice som tidigare använts</h1>
<br><br>

<h1>Den bästa varianten typ.</h1>
<form action="dice9.php" >
  <input value="hoppa iväg" type="submit">
</form>

<br><br>
<h1>gjorde en till sak</h1>
<form action="dice10.php">
  <input value="hoppa iväg" type="submit">
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