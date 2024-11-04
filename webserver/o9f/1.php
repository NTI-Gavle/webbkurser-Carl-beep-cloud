Skapa en array med 10 platser, använd en lämplig loop som gör så att första talet i arrayen är 1 och sedan dubblas värdet för varje plats. 
Beräkna sedan på ett smart sätt medelvärdet av dessa och skriv ut på sidan.
<br><br>

<?php

$arr=[];
$arr[0] = 1;
$num = 1;
for ($i=1; $i < 10; $i++) { 
    $num *= 2;
    $arr[$i] = $num;
}
$medel =$num/sizeof($arr);
echo "<br>";
echo "<br>";
echo $medel;

?>



<br>

jag checkade och det är rätt