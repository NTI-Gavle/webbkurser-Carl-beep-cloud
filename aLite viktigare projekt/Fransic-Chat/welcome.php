<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';

if (isset($_POST['comment']) && strlen($_POST['comment']) != 0) {

    $_SESSION['lastname'];
    $_SESSION['name'];

    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    $name = $_SESSION['name'];
    $lastname = $_SESSION['lastname'];

    $sql = "SELECT id FROM users Where name = ? And lastname = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$name, $lastname]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userId = $user['id'];

        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (comment, userId, date) VALUES (?, ?, NOW())";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$comment, $userId]);
    }
    header("refresh: 1");
    $_POST['comment'] = "";
    unset($_POST['comment']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--    //! headern no-headern  -->
    <link rel="stylesheet" href="yes-loggin/yes-loggin-header.css">

    <!--  //! Basen för när man är inloggad -->
    <link rel="stylesheet" href="yes-loggin/yes-loggin-bas.css">
    <!--    //! basen som typ alla kommer ha  -->
    <link rel="stylesheet" href="css-js/bas.css">

    <!-- //! är inuti själva bas men css separat för den här filen -->
    <link rel="stylesheet" href="no-loggin/no-loggin-bas.css">


    <!--    //! Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title>Fransic Chat</title>
</head>

<body>
    <?php include "yes-loggin/yes-loggin-header.html"; ?>


    <div class="mycontainer">


        <div class="leftside"></div>

        <div class="center">

            <div class="center-container">
                <div class="my-input-container">
                    <h1 style="color:orange;"><?php echo $_SESSION['name'] . " " . $_SESSION['lastname']; ?> </h1>
                </div>
                <div class="my-input-container">

                    <form action="" method="post">
                        <input type="text" id="comment" placeholder="Write a comment" name="comment">
                        <input type="submit">
                    </form>
                </div>


                <?php

                $query = $dbconn->query("SELECT * FROM comments ORDER BY DATE DESC");

                $query = $dbconn->query("
               SELECT comments.*, users.name, users.lastname, users.age 
               FROM comments
               JOIN users ON comments.userId = users.id
               ORDER BY comments.date DESC
           ");


                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                    $commentname = htmlspecialchars($row['name']);
                    $commentlastname = htmlspecialchars($row['lastname']);
                    $commentage = htmlspecialchars($row['age']);

                    $commentcomment = htmlspecialchars($row['comment']);
                    $commentdate = htmlspecialchars($row['date']);

                    echo "
               <div class='test-comentar'>
                   <h4>$commentname  $commentage $commentlastname</h4>
                   <h5>$commentdate</h5>

                   
                   <h4>Age:</h4>
                   <p>$commentcomment</p>
               </div>
               ";

                }

                ?>

            </div>

        </div>


        <div class="rightside"></div>
    </div>



</body>

</html>

<?php

//! ifall jag ctrl f5 så skickas den senaste kommentaren igen!!