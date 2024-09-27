<?php 
session_start();
$_SESSION["num"] = 0;
@$_SESSION["sum"];
@$_SESSION["div"];

?>

<h2>
    skriv ett nummer
</h2>

<br>
<form action="" method="post">
<input name="numnum" type="number">
<br>
<button  type="submit" name="button1"> Räkna </button>

</form>



<?php



 if(isset($_POST['button1'])) {
  @  $_SESSION["div"]++;
    slav();
 
    
}


function slav()
{
    
@$_SESSION["num"] = $_POST["numnum"];

@$_SESSION["tal"][]=$_POST["numnum"];


@$_SESSION["sum"] += $_SESSION["num"];


//! print_r($_SESSION["tal"]);
var_dump($_SESSION["tal"]);
echo $_SESSION["sum"]/$_SESSION["div"];

unset($_SESSION["num"]);
}

?>


<form method="post">
    <button type="submit" name="ding">Starta om</button>
</form>

<?php


if (isset($_POST['ding'])) {
    myFunction();
}

function myFunction() {

    session_unset();
    header("Location: 4.php");
    session_start();
}



?>
