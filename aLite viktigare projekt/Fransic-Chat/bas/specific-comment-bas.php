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

echo $SpecificAge . $SpecificComment . $SpecificLastName . $SpecificLastName;

?>

<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center">

        <div class="center-container">

            <div class="special-container">
                <div class="specific-change">
                    <img class='not-my-comentar-prof-image'
                        src='<?php echo $SpecificCommentImagePath ?: "bilder/no-user-image.png"; ?>'>
                    <div class="comment-details">
                        <h3><?php echo $SpecificName . " " . $SpecificLastName; ?></h3>
                        <h2><?php echo $SpecificAge; ?></h2>
                        <p><?php echo $SpecificComment; ?></p>
                    </div>
                </div>
            </div>

        </div>

        <a href=""></a>

    </div>


    <div class="rightside"></div>
</div>