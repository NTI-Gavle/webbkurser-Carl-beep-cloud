<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookiecheck.php';
include 'Cookies&Connect/cookieholder.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--    //! headern no-headern  -->
     <link rel="stylesheet" href="no-loggin/no-loggin-header.css">

    <!--    //! basen som typ alla kommer ha  -->
    <link rel="stylesheet" href="bas/bas.css">

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
<?php 
include "no-loggin/no-loggin-header.html";
?>



    <div class="mycontainer">


        <div class="leftside"></div>

        <div class="center">


        <div class="boxen">
            <h2>You need to loggin to get access to this material </h2>
             <a href="loggin.php"> <button class=" my-loggin-btn"> Loggin </button></a>
        </div>


        </div>


        <div class="rightside"></div>
    </div>

</body>

</html>