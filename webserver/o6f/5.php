

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


if (strlen($P) >5 && str_contains($P,'1')|| str_contains($P,'2')|| str_contains($P,'3')||str_contains($P,'4')||str_contains($P,'5')||str_contains($P,'6')||str_contains($P,'7')||str_contains($P,'8')||str_contains($P,'9')||str_contains($P,'0')) {
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