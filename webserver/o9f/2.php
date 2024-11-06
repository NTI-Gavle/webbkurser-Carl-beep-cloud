Skriv en funktion som tar 3 heltal som argument. Funktionen skall returnera de minsta av dessa. Kalla på funktionen och spara värdet i en variabel och skriv sedan ut variabeln till sidan.





<form action="" method="post">
    <input name="tal1" type="number"> <br>
    <input name="tal2" type="number"><br>
    <input name="tal3" type="number"><br>
    <input name="dong" type="submit">
</form>



<?php 
 
if( isset( $_POST["dong"] ) )
{

minstatal();

}

$numarr =[];
function minstatal()
{
    
$numarr[0]=$_POST['tal1'];
 echo "<br>";
$numarr[1]=$_POST['tal2'];
echo "<br>";
 $numarr[2]=$_POST['tal3'];
echo "<br>";
echo "<br>";


sort($numarr);
echo $numarr[0];
}

 ?>
