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

if(isset($_POST['la'])) {

  if (ctype_upper(substr($F, 0, 1))) {
    
  $g++;
  
   }
  
   else {
      echo "First name needs to have first letter Uppercase:  ";
   }
  
   if (ctype_upper(substr($E, 0, 1))) {
  $g++;
      
   }
  
  
   else {
      echo "Last name needs to have first letter Uppercase: "; 
   }
  

  



$position = strpos($Ep, '@');


$result = substr($Ep, $position, strlen($Ep));

  
   $result2 = substr($result,strlen($result)-2,strlen($result));

   


   if (str_contains($Ep,'@') && strlen($Ep) > 6 && strlen($result) > 4 &&  /* // todo  här är problemet */  preg_match('/./', $result2) <= 0) {
      
      $g++;


   }
  
   else
   {
  
      echo "E-Post needs to have a @ and be more then 6 letters!!! And 4 needs to be after the @ och sista 2 får inte innehålla .  ";
   }
  
  if ($g == 3) {
      echo $F . " " . $E . " med E-Posten " . $Ep . "  Allting ser ballt ut!!!" ;
  }
  
  }
   
  


?>