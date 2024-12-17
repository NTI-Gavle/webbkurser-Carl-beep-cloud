<?php

require 'quizconnect.php';


// Fetch the text and alternatives with ID 1
$sql = "SELECT text, alt1, alt2, alt3, alt4, correct FROM quizbas WHERE id = :id";
$stmt = $dbconn->prepare($sql);
$id = 1; // ID to fetch
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Initialize variables
$ttexten = $row['text'] ?? "No text found.";
$aalt1 = $row['alt1'] ?? "No alt1.";
$aalt2 = $row['alt2'] ?? "No alt2.";
$aalt3 = $row['alt3'] ?? "No alt3.";  // kanske funkar['alt.correct']; 
$aalt4 = $row['alt4'] ?? "No alt4.";
$correctAnswer = 'alt' . $row['correct'];

if (isset($_POST['ans'])) {
 //   correctcheck($correctAnswer);
}

function correctcheck($correctAnswer) {
    if ($_POST['svar'] == $correctAnswer) {
        echo "rätt"; // Correct
    } else {
        echo "fel"; // Incorrect
    }
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

    <div> <?php echo $ttexten ?> </div>
    <form action=""   method="post">
       <input type="radio" name="svar" value="alt1"> <?php echo $row['alt1']; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt2"><?php echo $row['alt2']; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt3"><?php echo $row['alt3']; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt4"><?php echo $row['alt4']; echo'<br>'; ?> 

        <input value="Lås" name="ans" type="submit">
    </form>


</body>

</html>
