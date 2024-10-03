<?php

//? Utöka kontrollen på e-postadressen i uppgift 1. Den ska vara minst 6 tecken. Det ska vara minst 4 tecken efter @-tecknet varav en ska vara punkt(.).
//? Punkten får inte vara en av de 2 sista tecken (t.ex. kalleanka@ankeborg.se eller k@a.se). Informera användaren om allt är okej eller om det är fel.

?>


<form action="" method="post">
  Förnamn:  <input name="Fnamn" type="text">
  <br>
  Efternamn: <input name="Enamn" type="text">
  <br>
  E-post: <input name="epost" type="text">
  <br>
  <input  name="la"value="skicka" type="submit">
</form>



<?php

@$F = $_POST['Fnamn'];
@$E = $_POST['Enamn'];
@$Ep = $_POST['epost'];

$g=0;



?>