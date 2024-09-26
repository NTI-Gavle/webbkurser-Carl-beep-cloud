<?php

//? Skapa en webbsida som hälsar dig välkommen tillbaka om du uppdaterar sidan inom en timme från första anropet. Använd cookies.


$cookie_name = "Carl";
$cookie_value = "John Doe";
setcookie($cookie_name,  $cookie_value, time() + (10), "/");
?>


<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "DU är  inte välkommen";
} else {
    echo $cookie_name . " du är välkommen";
}
?>