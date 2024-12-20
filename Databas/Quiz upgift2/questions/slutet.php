<?php

if(isset($_POST['unsetbtn'])){
    session_unset();
    header("Refresh:0");

 }
// ! så att sista poänget ska räknas
if (isset($_SESSION['lastcorrect'])) {
    //? daniel försklag
    if ($_SESSION["lastcorrect"] === @$_POST["svar"]) {
        $_SESSION["points"]++;
        // echo "rätt";
           } else {
        if (@$_POST['svar'] != "") {
            //echo "fel";
        } 
    }
  
}
//! gör så att den sista frågan läggs in
if (empty($_SESSION['result'][$_SESSION['questnum']])) {
    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . ($_SESSION['questnum']) . " var [" . $_SESSION['lastfragatext'] .
        "] rätt svar är [" . $_SESSION['lastcorrecttext'] . "] ditt svar var |" . $_SESSION['lastsvartext'];
}


echo '<div style="margin: 20px auto; text-align: center; border: 2px solid #4CAF50; border-radius: 10px; padding: 20px; background-color: #f0f9f0; width: fit-content;">';
echo '<h2 style="margin: 0; color: #4CAF50; font-family: Arial, sans-serif; font-size: 24px;">Du fick ' . $_SESSION['points'] . ' av ' . $_SESSION['rowCount'] . '</h2>';
echo '</div>';

//! TACK GPT för en vacker utskrivning

if (!empty($_SESSION['result'])) {
    echo '<div style="display: flex; flex-direction: column; gap: 10px;">';
    foreach ($_SESSION['result'] as $key => $result) {
        echo '<div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">';
        echo "<strong>Question $key:</strong><br>$result";
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No results available yet.</p>';
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
    

<form style="margin-top:20px;" action="" method="post">
    <input  value="unset" name="unsetbtn" type="submit">
</form>

</body>
</html>