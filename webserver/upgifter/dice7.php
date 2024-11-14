<?php session_start();
require 'ClassDice.php';


if (isset($_POST['skick'])&& isset($_POST['num'])) {
echo "tjo";
    $dice = new Dice($_POST['num']);
 
}

if(isset($_POST['kast']))
{
    echo $_POST['kastning'];
    Dice::Allkastantal($_POST['kastning']);
}


if(isset($_POST['koll']))
{
    echo"tjoho";
Dice::Allkast();
}

if(isset($_POST['unset']))
{
session_abort();
}

?>

<?php //! Sja ta ett nummer och göra en tärning med det antalet sidor ?>
<form action="" method="post">
   Antal Sidor <input name="num" type="number">
   <input name="skick"  value="send"type="submit">
</form>
<br><h2>

<?php //! Ska bestämma antalet kast man ska göra med tänringarna du skapat ?>
    hur många kast vill du kasta med dina tärningar?
</h2>
<form action="" method="post">
  Antal Kast:  <input name="kastning" type="number">
  <input value="kasta" name="kast" type="submit">
</form>

<br><br>

<?php //! ska skriva ut allting?>
<form action="" method="post">
    <input name="koll" value="kolla" type="submit">
</form>
<br><br>

<form action="" method="post">
    <input value="unset" name="unset" type="submit">
</form>