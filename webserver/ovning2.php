<h1> Upgift 1
</h1>


<?php

function tjena()
{

echo"hejsan svejsan";

}

tjena();

?>


<br>
<h1>upgift 2 </h1>
<br>


<?php
/*Skriv en funktion som tar ett argument ($antal) och skriver sedan ut “Tjaba Tjena Hallå” så många gånger som $antal*/


function tva()
{
  $antal = 5;
    for ($i=0; $i < $antal; $i++) { 
       
    
        echo"tjaba tjena hallå  <br>";
       
    }

    

}

tva();
?>



<br>
<h1>upgift 3</h1>
<br>






<?php
/*
Skriv en funktion som tar 3 heltal som argument och returnerar det största av dessa 3 talen. Skriv sedan ut det största talet.
*/

$num1 = 10;
$num2 = 8;
$num3 = 5;

function tre($num1,$num2,$num3)
{

$max = max($num1,$num2);

$max2 = max($max,$num3);

echo$max2;



}



tre($num1,$num2,$num3);


?>
<br>
<h1>upgift 4</h1>
<br>




<?php

/*
Skapa en array med valfritt antal värden (tal) och anropa en funktion som beräknar medelvärdet och returnerar medelvärdet och skriv sedan ut det
*/
$tal1 = 1;
$tal2 = 7;
$tal3 = 123;
$tal4 = 543;
$tal5 = 12;
$tal6 = 123;
$tal7 = 6;


function fyra($tal1,$tal2,$tal3,$tal4,$tal5,$tal6,$tal7)
{

 $sum= $tal1+$tal2+$tal3+$tal4+$tal5+$tal6+$tal7;

 $res =$sum/7;

echo$res;


}

fyra($tal1,$tal2,$tal3,$tal4,$tal5,$tal6,$tal7);


?>

<br>
<h1>upgift 5 </h1>
<br>



<?php

/*
Skapa en array med valfritt antal värden (tal) och anropa sedan en funktion som skriver in värdet 0 (noll) om värdet är jämnt. Om det är udda får det stå kvar.
Skriv ut arrayen både före och efter du har anropat funktionen.
t.ex [1,2,3,4,5,6] → [1,0,3,0,5,0]
*/

//$arr = ("1 "."23 "."543 "."12 "."54 "."12 "."12 "."41 ");
$arr = array(1,24,543,13,123,5,4,2,124,543,131);

$string = implode(", ",$arr);

echo"$string";
$oj = 0;
//$yeah = count($arr);
function fem()
{

    for ($i=0; $i < 11; $i++) { 
     
        if ($arr[$i] & 1 == 0) {
        
            $arr[$i] = $oj;

        }

        
    }

  



}

fem();









?>
