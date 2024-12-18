<?php

require 'quizconnect.php';

if (!isset($_SESSION['questnum'])) {
    $_SESSION['questnum'] = 1;
}

if (!isset($_POST['svar'])) {
    $_POST['svar'] = "";
}

if (!isset($_SESSION['lastsvartext'])) {
    $_SESSION['lastsvartext'] = "";
}

if (!isset($_SESSION['lastfragatext'])) {
    $_SESSION['lastfragatext'] = "";
}
//? varning

if (!isset($_SESSION['lastcorrecttext'])) {
    $_SESSION['lastcorrecttext'] = "";
}

if (isset($_POST['ans'])) {
    // $_SESSION['questnum']++;

    // Store the user's answer or a default message if no answer was selected
    $_SESSION['lastsvar'] = $_POST['svar'] ?? "No answer selected";

    // Increment question number
    $_SESSION['questnum']++;

    // Save result for the current question
    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . ($_SESSION['questnum'] - 1) . " var [" . $_SESSION['lastfragatext'] .
        "] rätt svar är [" . $_SESSION['lastcorrecttext'] .
        "] ditt svar var |" . $_SESSION['lastsvartext'];
}

//! risk
if (!isset($_POST['lastcorrect'])) {
    $_POST['lastcorrect'] = "";
}

if (!isset($_SESSION['lasttexten'])) {
    $_SESSION['lasttexten'] = "";
}

if (!isset($_SESSION['lastsvar'])) {
    $_SESSION['lastsvar'] = "";
}



//! finns bar så att en error inte ska komma när man unsetallting
if (isset($_SESSION['lastcorrect'])) {
    //? daniel försklag
    if ($_SESSION["lastcorrect"] === $_POST["svar"]) {
        $_SESSION["points"]++;
        // echo "rätt";
    } else {
        if ($_POST['svar'] != "a") {
            //echo "fel";
        }
    }
}




// Fetch the text and alternatives with ID 1
$sql = "SELECT text, alt1, alt2, alt3, alt4, correct FROM quizbas WHERE id = :id";
$stmt = $dbconn->prepare($sql);
//! istället för att ha en fil per fråga.
$id = $_SESSION['questnum']; // ID to fetch
//$id = 3;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Initialize variables
$ttexten = $row['text'] ?? "No text found.";
$_SESSION['lasttexten'] = $ttexten;
$aalt1 = $row['alt1'] ?? "No alt1.";
$aalt2 = $row['alt2'] ?? "No alt2.";
$aalt3 = $row['alt3'] ?? "No alt3.";  // kanske funkar['alt.correct']; 
$aalt4 = $row['alt4'] ?? "No alt4.";
$correctAnswer = 'alt' . $row['correct'];
$_SESSION["lastcorrect"] = $correctAnswer;

$_SESSION['lastsvar'] = $_POST['svar'];

//! kollar frågan
if (!empty($_POST['svar'])) {
    $_SESSION['lastfragatext'] = $row['text'];
}
//? varning

//! kollar korrekta svaret
$_SESSION['lastcorrecttext'] = $row['alt' . $row['correct']];

//! kollar ditt svar
$_SESSION['lastsvartext'] = $row[$_POST['svar']];

// Debugging

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Fråga <?php echo $_SESSION['questnum'] . " av " . $_SESSION['rowCount']; ?></h3>
    <div> <?php echo $ttexten ?> </div>
    <form style="margin-top:20px;" action="" method="post">
        <input type="radio" name="svar" value="alt1"> <?php echo $row['alt1'];
        echo '<br>'; ?>
        <input type="radio" name="svar" value="alt2"><?php echo $row['alt2'];
        echo '<br>'; ?>
        <input type="radio" name="svar" value="alt3"><?php echo $row['alt3'];
        echo '<br>'; ?>
        <input type="radio" name="svar" value="alt4"><?php echo $row['alt4'];
        echo '<br>'; ?>
        <?php   //? borde använda så här istlläet för många filer. ?>
        <!-- <input type="hidden" name="q" value="nästafråga">-->

        <input value="Lås" name="ans" type="submit">
    </form>


</body>



</html>