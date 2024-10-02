<?php
session_start();
?>

<?php

if(isset($_POST['namn'])) {
@$_SESSION["anv"] = $_POST['namn'];

@$_SESSION["pas"] = $_POST['lös'];

}
if(isset($_POST['reg1'])) {
$_SESSION["reg-anv"] = $_POST['reg1'];
$_SESSION["reg-pas"] = $_POST['reg2'];
}


?>



<?php



if (isset($_SESSION["anv"]) && isset($_SESSION["pas"]) && $_SESSION["anv"] == $_SESSION["reg-anv"] && $_SESSION["pas"] == $_SESSION["reg-pas"] ) {
   
   /* echo " du är inloggad tjohej vad episkt";*/ 

    
}

else {
    
   //! session_unset();
    header("Location: test1.php");

}

?>

<h1> Hejsan svejsan på digsan <?php echo $_SESSION["reg-anv"]; ?></h1>

<br>

<br>

<form method="post">
    <button type="submit" name="ding">Rader kontot</button>
</form>

<?php

function myFunction() {

    session_unset();
    header("Location: test1,2.php");

}

if (isset($_POST['ding'])) {
    myFunction();
}
?>