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

      <!--    //! basen som typ alla kommer ha  -->
      <link rel="stylesheet" href="admin.css">



    <title>Fransic Chat</title>
</head>
<body>

<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center" style="padding:0;">

        <div class="center-container">
            <div class="my-input-container">
                <h1 style="color:orange;"> All Users </h1>
            </div>
          


            <?php

        $sql ="SELECT * ,id FROM users WHERE NOT name = 'admin'";

            $stmt = $dbconn->prepare($sql);
            $stmt->execute();
            $followers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($followers as $follower) {
                $FolName = htmlspecialchars($follower['name']);
                $FolLastName = htmlspecialchars($follower['lastname']);
                $FolId = htmlspecialchars($followers['id']);

                $imagePathfolowers = checkimage($FolName, $FolLastName);



                echo "   
                <div class='name-box-conatiner'> 
                    <div class='name-box'>
        <img src='$imagePathfolowers' alt='Profile Picture'>
        <span >$FolName $FolLastName </span>
        <form action='' method='post'>
        <button name='delete'>Delete </button>
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