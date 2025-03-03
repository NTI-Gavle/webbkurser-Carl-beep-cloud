<?php
include('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link rel="stylesheet" href="css-js/login-reg.css">

    <title>Logga in</title>
</head>

<body style="display:flex; justify-content:center;">

<div class="login-container">
    <h2>Logga in</h2>
    <form action="" method="post">
        <input placeholder="Namn" name="namn" type="text" required>
        <input placeholder="Lösenord" name="pass" type="password" required>
        <input value="Logga in" type="submit">
    </form>
    <a href="register.php" class="register-link">Registrera dig</a>
</div>

</body>

</html>
<style>
    ::placeholder {
        color: red;
        opacity: 1;
        /* Firefox */
    }

    ::-ms-input-placeholder {
        /* Edge 12 -18 */
        color: red;
    }
</style>

<?php



if (isset($_POST['namn'], $_POST['pass'])) {

    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();
    foreach ($res as $row) {
        if ($row['namn'] == $_POST['namn'] && $row['passwor'] == $_POST['pass']) {

            
            $_SESSION['name'] = $row['Namn'];
            if ($row['admin'] == 0) {
             //   header("Location: adminwelcome.php");
                exit;
            }

            header("Location: inside.php");
        }
    }
}




?>
