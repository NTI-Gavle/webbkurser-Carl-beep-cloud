<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';
include 'Cookies&Connect/check-image.php';


//! Så att bilde i headern ska visas
$headerimagePath = checkimage(@$_SESSION['name'], @$_SESSION['lastname']);
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

    <!-- //! FÖr specifica komentaren -->
    <link rel="stylesheet" href="bas/bas-specific-comment.css">

    <!--    //! Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title>Fransic Chat</title>
</head>
<body>

<?php
    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    if ($_SESSION['name'] == "" && $_SESSION['lastname'] == "") {
        include 'no-loggin/no-loggin-header.html';
    } else {
        include 'yes-loggin/yes-loggin-header.php';
    }

    include 'bas/specific-comment-bas.php';
    ?>
    
</body>
</html>