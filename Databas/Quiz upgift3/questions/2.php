<?php
require 'quizconnect.php';

if (isset($_POST['ans'])) {


    if (isset($_POST['svar'])) {
      
        // Get the selected answer ID
        $selectedAnswerID = $_POST['svar'];
    
        if ($selectedAnswerID == $_SESSION['lastcorrect']) {
            $_SESSION['correctcheck'] = 1; // Correct answer
        } else {
            $_SESSION['correctcheck'] = 0; // Incorrect answer
        }


        // Fetch the text of the selected answer
        $selectedAnswerText = null;
        foreach ($_SESSION['quiz'][$_SESSION['questnum']] as $alternative) {
            if ($alternative['id'] == $selectedAnswerID) {
                $selectedAnswerText = $alternative['alt'];
                break;
            }
        }
    
        // Store the text of the selected answer in the session
        $_SESSION['selectedanswertext'] = $selectedAnswerText;

        if($_SESSION['correctcheck'] == 1){
        
            $_SESSION['points']++;
        }      
       
    }

   


    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . ($_SESSION['questnum']) . " var [" . $_SESSION['lastfragatext'] .
        "] rätt svar är [" . $_SESSION['lastcorrecttext'] .
        "] ditt svar var |" . 
        @$_SESSION['selectedanswertext'];
    $_SESSION['questnum']++;       
}

$sql = "SELECT q.text AS question_text, a.id, a.alt, a.correct 
        FROM questions q
        JOIN alternativ a ON q.id = a.questions_id
        WHERE q.id = :id";

try {
    $stmt = $dbconn->prepare($sql);

    // Assume question number is stored in the session
    $id = $_SESSION['questnum'];

    // Bind the parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$rows) {
        $_SESSION['questnum']++;
        $_SESSION['skip'] = true;
        exit("No more questions available."); // Handle no questions case
    }

    // Initialize variables
    $ttexten = "Question not found.";
    $alternatives = [];
    $correctAnswer = null;

   
    $ttexten = $rows[0]['question_text'] ?? "No question text found.";

    foreach ($rows as $row) {
        $alternatives[$row['id']] = $row['alt'];
        if ($row['correct']) {
            $correctAnswer = $row['id'];

            //ny
            $_SESSION['correctcheck'] = $row['correct'];
        }
    }

    //! ny
 @$_SESSION['selectedanswertext'];

    $_SESSION['lasttexten'] = $ttexten;
    $_SESSION['lastcorrect'] = $correctAnswer;
    $_SESSION["quiz"][$id] = $rows;

    //! Save question and correct answer details
    $_SESSION['lastfragatext'] = $ttexten;
    $_SESSION['lastcorrecttext'] = $rows[array_search(1, array_column($rows, 'correct'))]['alt'] ?? "No correct answer.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h3 style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
        Fråga <?php echo $_SESSION['questnum'] . " av " . $_SESSION['rowCount3']; ?>
    </h3>
    <div style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; background-color: #f9f9f9; margin-bottom: 20px;">
        <?php echo $ttexten; ?>
    </div>
    <form id="autosubmit"
          style="margin-top: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;"
          action="" method="post">
        <?php foreach ($alternatives as $key => $alt): ?>
            <div style="margin-bottom: 15px;">
                <input type="radio" name="svar" value="<?php echo $key; ?>" id="<?php echo $key; ?>">
                <label for="<?php echo $key; ?>" style="margin-left: 5px;"><?php echo $alt; ?></label>
            </div>
        <?php endforeach; ?>

        <div style="text-align: center;">
            <input value="Nästa" name="ans" type="submit"
                   style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; font-size: 16px; cursor: pointer;">
        </div>
    </form>
</body>
</html>
