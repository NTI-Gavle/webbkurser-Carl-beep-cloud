<h1> upgift 1</h1>

<?php

$fahreinhei = 30;



 echo $celcius =5/9 *($fahreinhei - 32);




?>

<hr>
<h1> upgift 2 </h1>


<?php
/*
Starta med följande variabler:
	$fnamn = “Kalle”;
	$enamn = “Anka”;
	$tal = 16;
	$road = “Ankvägen”;

Gör så att följande text skrivs ut på webbsidan:
Kalle Anka bor på Ankvägen 16
genom att använda dig utav variablerna.
Testa att använda 3 olika sätt för att skriva ut.
Dubbelfnuttar (citat-tecken “), “abc $variabel1 def $variabel2 ghi”
Enkelfnuttar (apostrof ‘), ‘abc $variabel1 def $variabel2 ghi’
Konkatenering (punkt .) “abc” . $variabel1 .  “def” . $variabel2 . “ghi” 
Vilket sätt fungerar inte och varför?

*/


$fnamn = "Kalle";
$enamn = "Anka";
$tal = 16;
$road = "Ankvägen";

echo ("$fnamn " . "$enamn " . "bor på " . "$tal " . "$road");



echo('$fnamn' . '$enamn' . '$stal' . '$road');


echo ( $fnamn. $enamn.$tal.$road);
?>


<hr>

<h1>upgift 3 </h1>
Summera de första 100 heltalen (1,2,...,100) genom att använda en
for-loop
while-loop
<br><br>


<?php



$fan = 0;
for ($i=0; $i < 100; $i++) { 

	$fan += ($i + 1);

 


}

echo($fan);

?>
<br><br><br>
<?php
$tjohej = 0;
$tjonej = 0;

while ($tjonej <= 100) {

$tjohej += $tjonej;
$tjonej++;


}


	
echo($tjohej);
?>


<h1>upgift 4</h1>

<br><br>

Skriv ut varje tiotal grader Celsius, från -20 till 40 samt motsvarande Fahrenheit värde. Kör en loop och skriv <br>
Testa även att spara värdena i två arrayer. När loopen är klar skriver du ut arrayerna. Testa 3 sätt att skriva ut en array <br>
Använd en egen loop <br>
var_dump <br>
print_r <br>



<?php

/*
$Fransic = array();

for ($i=-20; $i < 40; $i+ 10) { 
	


}
*/
?>