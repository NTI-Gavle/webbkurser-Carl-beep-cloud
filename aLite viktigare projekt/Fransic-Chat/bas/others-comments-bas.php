<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center">

        <div class="center-container">
            <div class="my-input-container">
                <h1 style="color:orange;"><?php echo $_GET['F-name'] . " " . $_GET['L-name']; ?> </h1>
            </div>





            <?php

            $sql = "SELECT comments.*, users.name, users.lastname, users.age 
        FROM comments
        JOIN users ON comments.userId = users.id
        WHERE users.name = ? AND users.lastname = ?
        ORDER BY 
            CASE 
                WHEN comments.date >= NOW() - INTERVAL 5 HOUR THEN comments.score 
                ELSE 0 
            END DESC,
            comments.date DESC";

            // Prepare and execute query
            $query = $dbconn->prepare($sql);
            $query->execute([$profileName, $profileLastName]);



            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $commentname = htmlspecialchars($row['name']);
                $commentlastname = htmlspecialchars($row['lastname']);
                $commentage = htmlspecialchars($row['age']);

                $commentcomment = htmlspecialchars($row['comment']);
                $commentdate = htmlspecialchars($row['date']);

                $commentId = htmlspecialchars($row['id']);
                $commentScore = (int) $row['score'];


                $extensions2 = ['jpg', 'jpeg', 'png', 'gif'];
                $imagePath2 = '';
                foreach ($extensions2 as $ext2) {
                    if (file_exists("bilder/{$commentname}{$commentlastname}.$ext2")) {
                        $imagePath2 = "bilder/{$commentname}{$commentlastname}.$ext2";
                        break;
                    }
                }

                $imagePath2 = $imagePath2 ?: "bilder/no-user-image.png";

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
</form> </div>";
            }



            ?>

        </div>


    </div>


    <div class="rightside"></div>
</div>