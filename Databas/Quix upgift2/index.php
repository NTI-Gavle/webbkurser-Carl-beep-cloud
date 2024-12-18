<?php require 'quizconnect.php';
session_start();
//! super riks  ta bort ifall skit krashar 
//! tror inte den här är kopplade till den andra i 1.php
//! enda andeldning att den finns är att en error inte ska visasa men ingen vikt för själva programmet
if (!isset($_SESSION['questnum'])) {
    $_SESSION['questnum'] = 1;
  }

   //! bra att ha när man gör saker i programmet ifall det krashar
if (isset($_POST['unsetbtn'])) {
    session_unset();
    header("Refresh:0");
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

if ($_SESSION['questnum'] >= $_SESSION['rowCount']) {
    include 'questions/slutet.php'; 
} else {
    include 'questions/1.php'; 
}
?>
    <br><br><br>
      //! bra att ha ifall skiten krashar
    <form action="" method="post">
        <input value="unset" name="unsetbtn" type="submit">
    </form>


</body>

</html>