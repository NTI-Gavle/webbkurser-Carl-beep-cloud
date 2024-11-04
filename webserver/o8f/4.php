Skapa en funktion som skapar textsträngen i övning 3 och som returnerar textsträngen. Anropa funktionen och skriv ut texten.
<br><br>
<form action="" method="post">
    <input name="ding" value="tryck" type="submit">
</form>


<?php


if (isset($_POST['ding'])) {

   show();
 
    }


function show()
{

    
    echo "hej och välkommna dagens datum är " . date("l") . " den " . date("d F Y");
 
} 


?>