<?php
include ('connecttyp.php');

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
    <div><b>Registrera dig</b></div>
<form action="" method="post">
    <input style="background-color:orange;" placeholder="Namn" name="namn" type="text"> <br> 
    <input style="background-color:green;" placeholder="Efternamn"  name="efternamn" type="text"><br>
    <input style="background-color:blue;" placeholder="Användarnamn"  name="användarnamn" type="text">
    <br> <input style="background-color:yellow;" placeholder="Lösenord"  name="pass" type="password"><br>
    <input value="Registera dig!!!" type="submit">
</form>
<a href="index.php">Logga in </a>
    </div>

</body>

</html>

<style>

::placeholder {
  color: red;
  opacity: 1;
}

::-ms-input-placeholder { 
  color: red;
}
</style>

<?php

   
$taken = false;

if(isset($_POST['namn'], $_POST['efternamn'] , $_POST['användarnamn'] ,$_POST['pass']))
{

    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();

    if (strlen($_POST['namn'])>1 && strlen($_POST['efternamn'])>1 && strlen($_POST['användarnamn'])>1 && strlen($_POST['pass'])>1) {
         
    foreach ($res as $row) {
         
        
    if ($row['Användarnamn'] == $_POST['användarnamn']) {
        echo "Testa ett annat användarnamn någon har redan det här";
        $taken = true;
        break;
    }

    }

    if ($taken == false) {
        
    
    $sql = "INSERT INTO users (Namn, Efternamn, Användarnamn, Lösenord, Datum) VALUES (?, ?, ?, ?, ?)";
  
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$_POST['namn'], $_POST['efternamn'], $_POST['användarnamn'], $_POST['pass'],date("Y-m-d H:i:s")]);
    header("Location: index.php");

    }
    }

    else{ echo "namn,efternamn,användarnamn och lösenord måste alla vara längre än 1 bokstav";}
}





?>