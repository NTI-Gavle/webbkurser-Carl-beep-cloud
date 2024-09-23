<?php
$b =0;
$namn = "";
$o =   $_POST['namnet'];
$f = $_POST['pas'];

if ($o == "Fransic") {
   
    $b++;
}


if ($f == "kamel123") {
    $b++;
}

if ($b ==2) {
    
   $namn =  "Hejsan Fransic ballt lösenord"; 
}

else {
    $namn = " fel!!!!!!!!!      Testa Fransic som användar namn och kamel123 som lösenord.";
}

?>

<h3> <?php echo $namn ?> </h3>

  