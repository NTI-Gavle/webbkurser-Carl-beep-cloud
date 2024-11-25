<?php
require ('connecttyp.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="display:flex; justify-content:center;">

    <div style=" width:25%; height:25%;">
<form action="" method="post">
    <input style="background-color:orange;" placeholder="Namn" name="namn" type="text"> <br> 
    <input style="background-color:green;" placeholder="Efternamn"  name="efternamn" type="text"><br>
    <input style="background-color:blue;" placeholder="Användarnamn"  name="användarnamn" type="text">
    <br> <input style="background-color:yellow;" placeholder="Lösenord"  name="pass" type="password"><br>
    <input value="Registera dig!!!" type="submit">
</form>

    </div>

</body>

</html>


<?php

   


if(isset($_POST['namn'], $_POST['efternamn'] , $_POST['användarnamn'] ,$_POST['pass']))
{
    $sql = "INSERT INTO users (Namn, Efternamn, Användarnamn, Lösenord, Datum) VALUES (?, ?, ?, ?, ?)";
  
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$_POST['namn'], $_POST['efternamn'], $_POST['användarnamn'], $_POST['pass'],date("Y-m-d H:i:s")]);
    echo "  det fugerade tjohejsan svejnsan";

    
}


else{
    echo "ERROR TYP SÅ";
}




?>