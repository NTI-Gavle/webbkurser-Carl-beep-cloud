<?php

session_start();

?>


<?php

$_SESSION["reg-anv"] = "";
$_SESSION["reg-pas"] = "";

?>

<h1> Registrering</h1>
<br>
<form action="test1,1.php" method="post">
 Användarnamn:    <input name="reg1" type="text">
 <br>
  Lösenord:  <input name="reg2" type="text">
  <br>
  <br>
  <input type="submit">
</form>