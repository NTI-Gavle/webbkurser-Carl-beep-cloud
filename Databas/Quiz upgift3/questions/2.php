<?php
require 'quizconnect.php';

if (isset($_POST['ans'])) {
    $selectedAnswer = $_POST['svar'] ?? null;

    if (isset($_SESSION['quiz'][$_SESSION['questnum']])) {
        foreach ($_SESSION['quiz'][$_SESSION['questnum']] as $alternative) {
            if ($alternative['id'] == $selectedAnswer && $alternative['correct'] == 0) {
                $_SESSION['points']++;
                break;
            }
        }
    }

    $_SESSION['result'][$_SESSION['questnum']] = "Fråga " . ($_SESSION['questnum']) . " var [" . $_SESSION['lastfragatext'] .
        "] rätt svar är [" . $_SESSION['lastcorrecttext'] .
        "] ditt svar var |" . 
        @$_SESSION['quiz'][$_SESSION['questnum']][@$_POST['svar']];
    $_SESSION['questnum']++;       
}

// SQL query to fetch question and alternatives
$sql = "SELECT id, alt, questions_id, correct 
        FROM alternativ 
        WHERE questions_id = :id";

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

    // Assuming all rows share the same question text
    $ttexten = $rows[0]['questions_id'] ?? "No question text found.";

    foreach ($rows as $row) {
        $alternatives[$row['id']] = $row['alt'];
        if ($row['correct']) {
            $correctAnswer = $row['id'];
        }
    }

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
