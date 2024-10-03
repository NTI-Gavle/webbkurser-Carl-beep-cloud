<?php


//? Skapa ett formulär med 2 textrutor för inläsning av användarnamn och lösenord. Användarnamnet måste innehålla delsträngen “php”.
//?  Lösenordet måste vara minst 6 tecken långt. Informera användaren om allt är okej eller om det är fel.


?>


<form action="" method="post">
    Användarnamn: <input name="Anv" type="text"> <br>
    Lösenord:     <input name="Pas" type="text"> <br>
    <input  name="oj"value="Logga in yaow" type="submit">
</form>




<?php

@$A = $_POST['Anv'];
@$P = $_POST['Pas'];

$g =0;



if(isset($_POST['oj']))
{

if (str_contains($A,'php')) {
 $g++;   
}

else
{
echo " Användarnamn behöver innehålla php!!!:    ";

}


if (strlen($P) >5) {
    $g++;
}

else {
    echo " Password måste inheålla minst 6 tecken!!!!";
}


if ($g ==2) {
    echo "du lyckades och ditt användarnamn är " . $A . " Ditt lösenord är " . $P;
}

}

?>