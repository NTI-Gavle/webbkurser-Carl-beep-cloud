<?php


// Start the session
session_start();

?>


<?php
// Set session variables





?>

<?php

if( isset($_SESSION["Hej"]) && (intval($_SESSION["Hej"])+10)<time() ){
echo " du misslyckades tjing tjong ";
session_unset();

}

else {
    $_SESSION["Hej"] =time();
    echo "Du lyckades";
}

?>

