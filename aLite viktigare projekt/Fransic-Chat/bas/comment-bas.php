<div class="mycontainer">


    <div class="leftside">
<canvas id="timecanvas"  style="margin-left: 10%; width: 80%;" ></canvas>

    </div>

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

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vote-btn'])) {
                $commentId = $_POST['comment_id'];
                $action = $_POST['vote-btn'];

                if ($action === "upvote") {
                    $dbconn->query("UPDATE comments SET score = score + 1 WHERE id = $commentId");
                } elseif ($action === "downvote") {
                    $dbconn->query("UPDATE comments SET score = GREATEST(score - 1, 0) WHERE id = $commentId");
                }
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }



            $query = $dbconn->query("
    SELECT comments.*, users.name, users.lastname, users.age 
    FROM comments
    JOIN users ON comments.userId = users.id
    WHERE comments.link IS NULL
    ORDER BY 
        CASE 
            WHEN comments.date >= NOW() - INTERVAL 5 HOUR THEN comments.score 
            ELSE 0 
        END DESC,
        comments.date DESC
");


while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    $commentname = htmlspecialchars($row['name']);
    $commentlastname = htmlspecialchars($row['lastname']);
    $commentage = htmlspecialchars($row['age']);

    $commentcomment = htmlspecialchars($row['comment']);
    $commentdate = htmlspecialchars($row['date']);

    $commentId = htmlspecialchars($row['id']);
    $commentScore = (int) $row['score'];


    $sql = "SELECT COUNT(*) AS total FROM comments WHERE link = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$commentId]); 
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalComments = $row2['total'] ?? 0;
    

    //! Detta 2 gör ingen är mäst för syns skull
    $_SESSION['lastname'];
    $_SESSION['name'];

    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    // ! kollar om bilden finns i bilder/ mappen
    $imagePath2 = checkimage($commentname, $commentlastname);




    //! Göra så att man kan radera sina egna commentarer
    if ($row['name'] != $_SESSION['name'] && $row['lastname'] != $_SESSION['lastname']) {
        echo
            "<div class='test-comentar'>
<form action='profile.php' method='get'> 
<label>
<img class='not-my-comentar-prof-image' src='$imagePath2 ?: 'bilder/no-user-image.png';'>
</label>
<input name='F-name' type='hidden' value='$commentname'>
<input name='L-name' type='hidden' value='$commentlastname'>
<button type='submit' class='name-form' >
   $commentname $commentlastname
</button>
</form>
<h5>$commentdate</h5>

   
<h4>Age: $commentage</h4>
<p>$commentcomment</p>

<h4>Score: $commentScore</h4>
<div style='display: flex; align-items: center; gap: 10px;'>
<form action='' method='post' style='display: flex; gap: 10px;'>
<input type='hidden' name='comment_id' value='$commentId;'>

<!-- Upvote button using label -->
<label for='upvote $commentId; ' style='cursor: pointer;'>
<img src='bilder/image_upward.png' class='vote' alt='Upvote'>
</label>
<input type='submit' id='upvote $commentId; ' name='vote-btn' value='upvote' style='display: none;'>";

        if ($commentScore > 0) {
            echo "

<label for='downvote $commentId; ' style='cursor: pointer;'>
   <img src='bilder/image-downward.png' class='vote' alt='Downvote'>
</label>
<input type='submit' id='downvote $commentId; ' name='vote-btn' value='downvote' style='display: none;'>";
        }
        echo "
</form>
<form action='comment-view.php' method='GET' style='display: inline-block;'>
<input type='hidden' name='comId' value='$commentId'>
<button type='submit' style='background: none; border: none; cursor: pointer;'>
<img src='bilder/view-icon.png' alt='View Comment' style='width: 25px; height: 25px;'> 
</button>
</form>
</div>
<span bold style='color:orange; font-weight:400;'>  $totalComments comments</span>
</div>";
    }

    //! Är ifall du har skrivit koemntaren ska den ha en annan border och en extra knapp
    else {
        echo "
        <div class='test-comentar my-test-comentar'>
        <a href='my-profile.php' style='text-decoration:none;'>  <h4> <img class=my-comentar-prof-image src='$imagePath2' ?: 'bilder/no-user-image.png'>  $commentname $commentlastname </h4> </a>
        <h5>$commentdate</h5>

        
        <h4>Age: $commentage</h4>
        <p>$commentcomment</p> 
        
        <form action='' method='post'>
        <button class='kill-button-class' type='submit' name='kill-btn' value='$commentId'> KILL COMMENT </button>
        </form>
        <form action='comment-view.php' method='GET' style='display: inline-block;'>
        <input type='hidden' name='comId' value='$commentId'>
        <button type='submit' style='background: none; border: none; cursor: pointer;'>
            <img src='bilder/view-icon.png' alt='View Comment' style='width: 25px; height: 25px;'> 
        </button>
    </form>
    <span bold style='color:green; font-weight:400;'>  $totalComments comments</span>
    </div>
    ";

    }

}

            ?>

        </div>

        <a href=""></a>

    </div>


    <div class="rightside"></div>
</div>