<?php
include('connecttyp.php');
session_start();
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
        <div><b>Loggain</b></div>
        <form action="" method="post">
            <input style="background-color:orange;" placeholder="Namn" name="namn" type="text"> <br>
            <input style="background-color:green; " placeholder="Efternamn" name="efternamn" type="text"><br>
            <input style="background-color:blue;" placeholder="Användarnamn" name="användarnamn" type="text">
            <br> <input style="background-color:yellow;" placeholder="Lösenord" name="pass" type="password"><br>
            <input value="Loggain!!!" type="submit">
        </form>

        <a href="register.php">Registrera dig </a>

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



if (isset($_POST['namn'], $_POST['efternamn'], $_POST['användarnamn'], $_POST['pass'])) {

    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();
    foreach ($res as $row) {
        if ($row['Namn'] == $_POST['namn'] && $row['Efternamn'] == $_POST['efternamn'] && $row['Användarnamn'] == $_POST['användarnamn'] && $row['Lösenord'] == $_POST['pass']) {

            $_SESSION['name'] = $row['Namn'];
            if ($row['admin'] == 1) {
                header("Location: adminwelcome.php");
                exit;
            }

            header("Location: welcome.php");
        }
    }
}




?>