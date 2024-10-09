
<form action="" method="post">
  Skriv :  <input name="Fnamn" type="text">
  <br>
 
  <input  name="la"value="skicka" type="submit">
</form>



<?php

@$F = $_POST['Fnamn'];

$F = strtolower($F);
$ny = "";

$num = strlen($F);


for ($i=0; $i < $num; $i++) { 
    
if(str_contains($F[$i],'a')||str_contains($F[$i],'e')||str_contains($F[$i],'i')||str_contains($F[$i],'o')||str_contains($F[$i],'u')||str_contains($F[$i],'y')) {
 
$ny .=$F[$i];
    
}


else {
    
    $ny.=$F[$i] . "o" . $F[$i];

}

}

echo $F;
echo "<br>";
echo "<br>";
echo "Rövar språket: " .$ny;
?>