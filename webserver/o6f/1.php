<?php

//? Skapa ett formulär med 3 textrutor till följande saker. Förnamn, efternamn och e-postadress. Men innan så ska du kontrollera
//? så att förnamn och efternamn börjar med versaler. Samt kolla så att e-postadressen innehåller ett @-tecken. Informera användaren 
//? om allt är okej eller om det är fel.



?>


<form action="" method="post">
  Förnamn:  <input name="Fnamn" type="text">
  <br>
  Efternamn: <input name="Enamn" type="text">
  <br>
  E-post: <input name="epost" type="text">
  <br>
  <input  name="la"value="skicka" type="submit">
</form>



<?php

@$F = $_POST['Fnamn'];
@$E = $_POST['Enamn'];
@$Ep = $_POST['epost'];

$g=0;

if(isset($_POST['la'])) {

if (ctype_upper(substr($F, 0, 1))) {
  
$g++;

 }

 else {
    echo "First name needs to have first letter Uppercase:  ";
 }

 if (ctype_upper(substr($E, 0, 1))) {
$g++;
    
 }

 else {
    echo "Last name needs to have first letter Uppercase: "; 
 }


 if (str_contains($Ep,'@')){
    
    $g++;

 }

 else
 {

    echo "E-Post needs to have a @: ";
 }

if ($g == 3) {
    echo $F . " " . $E . " " . $Ep . "  Allting ser ballt ut!!!" ;
}

}

?>