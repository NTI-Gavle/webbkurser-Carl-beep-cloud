<?php
session_start();
?>



<?php


$_SESSION["ost"] = $_POST['namn']; 


if (isset($_SESSION["ost"]) && $_SESSION["ost"] != "mat") {
   
     session_unset();
   header("Location: 3.php");


}

else {


    echo "detta är en välldigt hemlig hemlighet och fan vad coolt!!!!";
}

?>


<form method="post">
    <button type="submit" name="ding">Logga ut</button>
</form>

<?php

function myFunction() {

    session_unset();
    header("Location: 3.php");

}

if (isset($_POST['ding'])) {
    myFunction();
}
?>