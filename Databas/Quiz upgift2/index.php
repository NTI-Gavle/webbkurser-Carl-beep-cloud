<?php require 'quizconnect.php';
session_start();

if (!isset($_SESSION['questnum'])) {
    $_SESSION['questnum'] = 0;
}


//? array med poäng
if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}

if (!isset($_SESSION['result'])) {
    $_SESSION['result'] = array();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['rowCount'])) {
        $sql = "SELECT COUNT(*) as totalRows FROM quizbas";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['rowCount'] = $result['totalRows'] ?? 0;
    }

    if (isset($_POST['starta'])) {
        $_SESSION['koll'] = "";
    }

    if (isset($_SESSION['koll'])) {
        if ($_SESSION['questnum'] >= $_SESSION['rowCount'] || isset($_SESSION['skip'])) {
            include 'questions/slutet.php';
        } else {
            include 'questions/1.php';
        }
      } else {
       
        ?>
        <form action="" method="post">
            <input name="starta" value="Starta  Fransic Quizet" type="submit">
        </form>
        <?php
    }
        ?>
</body>

</html>