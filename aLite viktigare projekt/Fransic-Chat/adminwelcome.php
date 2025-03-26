<?php
require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';
include 'Cookies&Connect/check-image.php';



//! Gör så man bara kan gå in ifall man har en speciell bool på 1
    $_SESSION['lastname'];
    $_SESSION['name'];

    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    if(isset($_SESSION['name']) || isset($_SESSION['lastname'])){
         
        $thisname = $_SESSION['name'];
        $thislastname = $_SESSION['lastname'];

         $sql = "SELECT bool from users WHERE name = ? And lastname = ?";
         $stmt = $dbconn->prepare($sql);
         $stmt->execute([$thisname,$thislastname]);
         $thisresult = $stmt->fetch(PDO::FETCH_ASSOC);
         $thisbool = $thisresult['bool'];
        
         if($thisbool == '1')
         {
           
         }

         else{
            header("Location: welcome.php");
         }
    }

    else{
        header("Location: index.php");
    }


    if(isset($_POST['delete'])){

        $stmt = $dbconn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$_POST['delete']]);
    }



    //! Gör så bilden i headern finns 
$headerimagePath = checkimage($_SESSION['name'], $_SESSION['lastname']);

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

      <!--    //! basen som typ alla kommer ha  -->
      <link rel="stylesheet" href="admin.css">

          <!--    //! Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <title>Fransic Chat</title>
</head>
<body>

<?php  include'yes-loggin/yes-loggin-header.php'?>

<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center" style="padding:0;">

        <div class="center-container">
            <div class="my-input-container">
                <h1 style="color:orange;"> All Users </h1>
            </div>
          


            <?php

        $sql ="SELECT * FROM users WHERE NOT name = 'admin' ORDER BY name ";

            $stmt = $dbconn->prepare($sql);
            $stmt->execute();
            $followers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($followers as $follower) {
                $FolId = $follower['id'];
                $FolName = htmlspecialchars($follower['name']);
                $FolLastName = htmlspecialchars($follower['lastname']);
               
                $imagePathfolowers = checkimage($FolName, $FolLastName);



                echo "   
                <div class='name-box-conatiner'> 
                    <div class='name-box'>
        <img src='$imagePathfolowers' alt='Profile Picture'>
        <span >$FolName $FolLastName </span>
        <form action='' method='post'>
        <button value='$FolId'  name='delete'>Delete</button>
    </form>

        </div>
    </div>";

            }
            ?>

        </div>


    </div>


    <div class="rightside"></div>
</div>



</body>

</html>