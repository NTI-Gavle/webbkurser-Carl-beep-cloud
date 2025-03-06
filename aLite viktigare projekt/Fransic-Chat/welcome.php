<?php require 'connect.php';
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


     <!--    //! headern no-headern  -->
     <link rel="stylesheet" href="yes-loggin/yes-loggin-header.css">

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

    <title>Document</title>
</head>
<body>
<?php include "yes-loggin/yes-loggin-header.html"; ?>
<h1>Hejsan <?php  echo $_SESSION['name'] ?></h1>
    
</body>
</html>