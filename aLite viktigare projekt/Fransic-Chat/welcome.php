<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';






//todo GLÖMM INTE DETTA NU AJABAJA 
//? borde fixa en separat fil för det
//! KOMMR BRHÖVA ANÄVDAS BÅDE HÄR OCH I my-profile.php

//? Man skriver en kommentar
if (isset($_POST['comment']) && strlen($_POST['comment']) != 0) {

    //! Detta 2 gör ingen är mäst för syns skull
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

//? Man dödar en kommentar 


if (isset($_POST['kill-btn'])) {

    $TheCommentsId = $_POST['kill-btn'];

    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$TheCommentsId]);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    unset($_POST['kill-btn']);
    exit();
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
    <link rel="stylesheet" href="bas/bas.css">



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

    <?php include "bas/comment-bas.php"; ?>



</body>

</html>