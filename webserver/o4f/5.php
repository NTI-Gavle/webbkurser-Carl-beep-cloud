
<?php
$o = 0;
$h = "";
$j;
foreach ($_POST['list'] as $key => $value) {
 
$h .= $value . ", ";

    $o++;
}

if ($o > 1) {
    
    $g = "dina favorit rätter är: ";
$j = $g . $h;

}



else{

 $j = "Din favorit rätt är " . $value;
}

?>



<h4>Hej: <?php echo $_POST["name3"] . $_POST["lname"]. " "; ?> i klass <?php echo $_POST["klass"] . " ";
 ?> <?php echo $j . " "; ?> din favorit kurs är  <?php  echo $_POST["kurs"];  ?>   </h4>


 