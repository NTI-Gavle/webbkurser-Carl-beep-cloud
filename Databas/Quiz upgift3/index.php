<link rel="stylesheet" href="style.css">
<?php require 'quizconnect.php';
session_start();

if (!isset($_SESSION['questnum'])) {
    $_SESSION['rownum'] =100;
    $_SESSION['questnum'] = 1;
   
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
    //! fixar ett nummer för quiz 1 Det om Fransic. Nummret är antal frågor.
    if (!isset($_SESSION['rowCount'])) {
        $sql = "SELECT COUNT(*) as totalRows FROM quizbas";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['rowCount'] = $result['totalRows'] ?? 0;
    }

    //!  Quiz 2 antal frågor nummer
    if (!isset($_SESSION['rowCount2'])) {
        $sql = "SELECT COUNT(*) as totalRows FROM quizbas2";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
        $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['rowCount2'] = $result2['totalRows'] ?? 0;
    }

    //! kollar quiz 1 knapp
    if (isset($_POST['starta'])) {
        $_SESSION['rownum'] = $_SESSION['rowCount'];
        $_SESSION['koll'] = "";
    }

    //! kollar quiz 2 knapp
    if (isset($_POST['starta2'])) {
        $_SESSION['rownum'] = $_SESSION['rowCount2'];
        $_SESSION['koll2'] = ""; 
    }

    if (isset($_SESSION['koll'])|| isset($_SESSION['koll2'])) {
        if ($_SESSION['questnum'] >=  $_SESSION['rownum']  || isset($_SESSION['skip'])) {
            include 'questions/slutet.php';
        } else {
            include 'questions/1.php';
        }
      } else {
               
        ?>
       <div class="quiz-container">
        <h1>Quiz</h1>
        <form action="" method="post">
            <input name="starta" value="Start Fransic Quizet" type="submit">
        </form>
    </div>
        <br>
        <div class="quiz-container">
        <h1>Quiz 2</h1>
        <form action="" method="post">
            <input name="starta2" value="Det andra quizet" type="submit">
        </form>
    </div>
       
        <?php
    }?>

</body>

</html>