<?php

$thisUserId = $_GET['comId'];

$stmt = $dbconn->prepare("
    SELECT comment, score, users.lastname, users.name, users.age
     FROM users JOIN comments ON users.id = comments.userId
     WHERE comments.id = ?");
$stmt->execute([$thisUserId]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$SpecificName = htmlspecialchars($result['name']);
$SpecificLastName = htmlspecialchars($result['lastname']);
$SpecificAge = htmlspecialchars($result['age']);
$SpecificComment = htmlspecialchars($result['comment']);
$SpecificScore = htmlspecialchars($result['score']);

$SpecificCommentImagePath = checkimage($SpecificName, $SpecificLastName);

?>

<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center">

        <div class="center-container">

        <?php  


        ?>




        </div>

        <a href=""></a>

    </div>


    <div class="rightside"></div>
</div>