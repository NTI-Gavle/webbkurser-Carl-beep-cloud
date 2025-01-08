<?php
require 'quizconnect.php';



 
if (isset($_POST['ans'])) {

   // echo $_SESSION['lastcorrect'] . "  " . $_POST['svar'];
    if ($_SESSION['lastcorrect'] == @$_POST['svar']) {
        $_SESSION['points']++;
    }
    

//echo $_SESSION['points'];

    // Save result for the current question
    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . ($_SESSION['questnum']) . " var [" . $_SESSION['lastfragatext'] .
        "] rätt svar är [" . $_SESSION['lastcorrecttext'] .
        "] ditt svar var |" . 
        @$_SESSION['quiz'][$_SESSION['questnum']][@$_POST['svar']];
        $_SESSION['questnum']++;
    
        
}

if(isset($_SESSION['koll'])){
$sql = "SELECT text, alt1, alt2, alt3, alt4, correct FROM quizbas WHERE id = :id";
}

if(isset($_SESSION['koll2'])){
$sql = "SELECT text, alt1, alt2, alt3, alt4, correct FROM quizbas2 WHERE id = :id";
}

$stmt = $dbconn->prepare($sql);
//! istället för att ha en fil per fråga.
$id = $_SESSION['questnum'];
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Initialize variables
$ttexten = $row['text'] ?? "No text found.";
$_SESSION['lasttexten'] = $ttexten;
$aalt1 = $row['alt1'] ?? "No alt1.";
$aalt2 = $row['alt2'] ?? "No alt2.";
$aalt3 = $row['alt3'] ?? "No alt3.";
$aalt4 = $row['alt4'] ?? "No alt4.";
$correctAnswer = 'alt' . $row['correct'];
$_SESSION["lastcorrect"] = $correctAnswer;

$_SESSION["quiz"][$id]=$row;

//! kollar frågan
$_SESSION['lastfragatext'] = $row['text'];

//! kollar korrekta svaret
$_SESSION['lastcorrecttext'] = $row['alt' . $row['correct']];

//? måste lösa den här
//! kollar ditt svar
$_SESSION['lastsvartext'] = @$row[$_POST['svar']];

//! Gör så att man inte måste trycka på knappen när raderna tagit slut
if (!$row) {
    $_SESSION['questnum']++;
    $_SESSION['skip'] = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- //! Tack GPT för att det blev fint -->

<body>
   
    <h3 style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Fråga <?php echo $_SESSION['questnum'] . " av ";  
        if(isset($_SESSION['koll'])){ echo $_SESSION['rowCount'];}
            if(isset($_SESSION['koll2'])){ echo $_SESSION['rowCount2']; } ?>
    </h3>

    <div
        style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; background-color: #f9f9f9; margin-bottom: 20px;">
        <?php echo $ttexten ?>
    </div>

    <form id="autosubmit"
        style="margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;"
        action="" method="post">
        <div style="margin-bottom: 15px;">
            <input type="radio" name="svar" value="alt1" id="alt1">
            <label for="alt1" style="margin-left: 5px;"><?php echo $row['alt1']; ?></label>
        </div>
        <div style="margin-bottom: 15px;">
            <input type="radio" name="svar" value="alt2" id="alt2">
            <label for="alt2" style="margin-left: 5px;"><?php echo $row['alt2']; ?></label>
        </div>
        <div style="margin-bottom: 15px;">
            <input type="radio" name="svar" value="alt3" id="alt3">
            <label for="alt3" style="margin-left: 5px;"><?php echo $row['alt3']; ?></label>
        </div>
        <div style="margin-bottom: 15px;">
            <input type="radio" name="svar" value="alt4" id="alt4">
            <label for="alt4" style="margin-left: 5px;"><?php echo $row['alt4']; ?></label>
        </div>
        <div style="text-align: center;">
            <input value="Börja/Nästa" name="ans" type="submit"
                style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; font-size: 16px; cursor: pointer;">
        </div>
    </form>
</body>

</html>
