
<h1>övning 1</h1>
<br>
<?php/*
//? Skapa ett enkelt formulär som frågar efter ett namn och en knapp “Skicka”.
//? En ny sida skall anropas i action-fältet och värdet i textrutan skall skrivas ut.
//? “Välkommen XXXXXX!” på den nya sidan (använd dig utav method=”POST” i FORM-taggen).
*/
?>

<form action="o4f/1.php" method="post">
Name: <input type="text" name="name"><br>
<input type="submit">
</form>

<br>
<h1>övning 2</h1>
<br>

<?php

//?Gör samma sak som uppgift 1 fast använd dig utav method=”GET”.
//? Skriv i text vad skillnaden är mellan GET och POST är.

?>

<form action="o4f/2.php" method="get">
Name: <input type="text" name="namee"><br>
<input type="submit">
</form>

<p>$_GET it displayed the data in the url and $_POST does not</p>

<br>
<h1>övning 3</h1>
<br>


<?php
//? Skapa ett formulär med tre textrutor som frågar efter förnamn, efternamn och klass.
//?Skapa även en dropdown-lista (select-tagg) med sju maträtter.
//? När du skickar formuläret skall en ny sida anropas och skriva ut texten.
//? “Hej <förnamn> <efternamn> i <klass>! Du tycker om <maträtt>!”
//? Använd dig utav POST.
?>



<form action="o4f/3.php" method="post">
Name: <input type="text" name="name3"><br>
Last Name: <input type="text" name="lname"><br>
Klass: <input type="text" name="klass"><br>
<select name="list" id="">
    <option value="kaka">kaka</option>
    <option value="korv">korv</option>
    <option value="ost">ost</option>
    <option value="mat">mat</option>
    <option value="pankaka">pankaka</option>
    <option value="sylt">sylt</option>
    <option value="vatten">vatten</option>
</select>
<input type="submit">
</form>


<br>
<h1>övning 4 </h1>
<br>


<?php

//? Bygg ut formuläret i uppgift 3 med en fråga “Vilken är den roligaste kursen?”.
//? Lägg till lite alternativ exempelvis “Kemi”, “Religionskunskap” och “Webbserverprogrammering”.
//? Se till att alla dina alternativ har var sin radioknapp. Utöka även utskriften med “Din favoritkurs är XXXXXXX.”.

?>




<form action="o4f/4.php" method="post">
Name: <input type="text" name="name3"><br>
Last Name: <input type="text" name="lname"><br>
Klass: <input type="text" name="klass"><br>
<select name="list" id="">
    <option value="kaka">kaka</option>
    <option value="korv">korv</option>
    <option value="ost">ost</option>
    <option value="mat">mat</option>
    <option value="pankaka">pankaka</option>
    <option value="sylt">sylt</option>
    <option value="vatten">vatten</option>
</select>

<select  name="kurs" id="">

<option type="radio" name="oj" value="Daniel">Daniel</option>
<option type="radio" name="oj" value="Thomas">Thomas</option>
<option type="radio" name="oj" value="Toa">Tova</option>
<option type="radio" name="oj"  value="Erik">Erik</option>

</select>
<input type="submit">
</form>


<br>
<h1>övning 5</h1>
<br>

<?php



//? Bygg ut uppgift 3.
//? Ändra “maträtter” så att det är möjligt att välja flera maträtter. Ändra så att OM flera maträtter är valda så skrivs det ut
//?  “Dina faboritmaträtter är XXXXXX.”. Annars skriver ut som vanligt “Din faboritmaträtt är XXXXXX.”. 
//? Förutsatt att någon har valts. Bygg upp detta med egna lämpliga funktioner.

?>


<form action="o4f/5.php" method="post">
Name: <input type="text" name="name3"><br>
Last Name: <input type="text" name="lname"><br>
Klass: <input type="text" name="klass"><br>
<multiselect name="list" id="">
    <option value="kaka">kaka</option>
    <option value="korv">korv</option>
    <option value="ost">ost</option>
    <option value="mat">mat</option>
    <option value="pankaka">pankaka</option>
    <option value="sylt">sylt</option>
    <option value="vatten">vatten</option>
</multiselect>

<select  name="kurs" id="">

<option type="radio" name="oj" value="Daniel">Daniel</option>
<option type="radio" name="oj" value="Thomas">Thomas</option>
<option type="radio" name="oj" value="Toa">Tova</option>
<option type="radio" name="oj"  value="Erik">Erik</option>

</select>
<input type="submit">
</form>