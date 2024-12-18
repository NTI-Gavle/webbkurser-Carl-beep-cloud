<?php
// ! så att sista poänget ska räknas

if (isset($_SESSION['lastcorrect'])) {
    //? daniel försklag
    if ($_SESSION["lastcorrect"] === $_POST["svar"]) {
        $_SESSION["points"]++;
        // echo "rätt";
           } else {
        if ($_POST['svar'] != "") {
            //echo "fel";
        } 
    }
    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . $_SESSION['questnum'] . " " . $_SESSION['lasttexten'] . " rätt svar är " . $_SESSION['lastcorrect'] . " ditt svar var " . $_SESSION['lastsvar'];

}

 
 echo "du fick " . $_SESSION['points'] . "av" . $_SESSION['rowCount'];

 echo '<pre>';
 var_dump($_SESSION['result']);
 echo '</pre>';

 

if(isset($_POST['unsetbtn'])){
    session_unset();
    header("Refresh:0");

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
    <form action="" metod="post">
        <input type="submit">
    </form>

<form action="" method="post">
    <input value="unset" name="unsetbtn" type="submit">
</form>

</body>
</html>