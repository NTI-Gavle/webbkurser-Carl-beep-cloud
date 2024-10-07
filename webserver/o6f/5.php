

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

if (str_contains($A,'php') && (preg_match("/[A-Z]/", $A)!=0) ) {
 $g++;   
}

else
{
echo " Användarnamn behöver innehålla php!!!:    ";

}


if (strlen($P) >5 && str_contains($A,'1'|| '2'||'3'||'4'||'5'||'6'||'7'||'8'||'9'||'0')) {
    $g++;
}

else {
    echo " Password måste inheålla minst 6 tecken!!!!   och minst en siffra";
}


if ($g ==2) {
    echo "du lyckades och ditt användarnamn är " . $A . " Ditt lösenord är " . $P;
}

}

?>