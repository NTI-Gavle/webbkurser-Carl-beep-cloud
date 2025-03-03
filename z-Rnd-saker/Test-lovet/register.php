<?php
include ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link rel="stylesheet" href="css-js/login-reg.css">

    <title>Document</title>
</head>

<body style="display:flex; justify-content:center;">

<div class="login-container">
    <h2>Registrera dig</h2>
    <form action="" method="post">
        <input placeholder="Namn" name="namn" type="text" required>
        <input placeholder="Lösenord" name="pass" type="password" required>
        <input value="Registrera dig" type="submit">
    </form>
    <a href="login.php" class="register-link">Loga in</a>
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

if(isset($_POST['namn'] ,$_POST['pass']))
{

    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();

    if (strlen($_POST['namn'])>1 && strlen($_POST['pass'])>1) {
         
    foreach ($res as $row) {
         
        
    if ($row['namn'] == $_POST['namn']) {
        echo "Testa ett annat namn någon har redan det här";
        $taken = true;
        break;
    }

    }

    if ($taken == false) {
        
    
    $sql = "INSERT INTO users (namn, passwor) VALUES (?, ?)";
  
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$_POST['namn'], $_POST['pass']]);
    header("Location: login.php");

    }
    }

    else{ echo "namn och lösenord måste alla vara längre än 1 bokstav";}
}

?>