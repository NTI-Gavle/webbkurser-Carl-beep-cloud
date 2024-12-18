<?php
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

 
 echo " <h2>du fick " . $_SESSION['points'] . " av " . $_SESSION['rowCount']. "</h2>";
/*
 echo '<pre>';
 var_dump($_SESSION['result']);
 echo '</pre>';
*/

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
    

<form style="margin-top:20px;" action="" method="post">
    <input  value="unset" name="unsetbtn" type="submit">
</form>

</body>
</html>