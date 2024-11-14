<?php session_start();
require 'ClassDice.php';


$dice = new Dice (7);
$dice2 = new Dice (2);
$dice3 = new Dice (10);
$dice4 = new Dice (5);
$dice5 = new Dice (70);
$dice6 = new Dice(4);










if(isset($_POST['kast']))
{
    echo $_POST['kastning'];
    Dice::Allkastantal($_POST['kastning']);


    Dice::allKast();
}



?>



<form action="" method="post">
  Antal Kast:  <input name="kastning" type="number">
  <input value="kasta" name="kast" type="submit">
</form>