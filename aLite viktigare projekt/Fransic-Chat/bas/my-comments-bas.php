<div class="mycontainer">


    <div class="leftside"></div>

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
            $query = $dbconn->query("
       SELECT comments.*,  users.name, users.lastname, users.age 
       FROM comments
       JOIN users ON comments.userId = users.id
       ORDER BY comments.date DESC
   ");



           

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $commentname = htmlspecialchars($row['name']);
                $commentlastname = htmlspecialchars($row['lastname']);
                $commentage = htmlspecialchars($row['age']);

                $commentcomment = htmlspecialchars($row['comment']);
                $commentdate = htmlspecialchars($row['date']);

                //todo  TA med den här
                $commentId = htmlspecialchars($row['id']);

                //! Detta 2 gör ingen är mäst för syns skull
                $_SESSION['lastname'];
                $_SESSION['name'];

                if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

                    $_SESSION['name'] = $_COOKIE['name'];
                    $_SESSION['lastname'] = $_COOKIE['lastname'];
                }

                $extensions2 = ['jpg', 'jpeg', 'png', 'gif'];
                $imagePath2 = '';
                foreach ($extensions2 as $ext2) {
                    if (file_exists("bilder/{$commentname}{$commentlastname}.$ext2")) {
                        $imagePath2 = "bilder/{$commentname}{$commentlastname}.$ext2";
                        break;
                    }
                }

                $imagePath2 = $imagePath2 ?: "bilder/no-user-image.png";


                //! Göra så att man kan radera sina egna commentarer
                if ($row['name'] != $_SESSION['name'] && $row['lastname'] != $_SESSION['lastname']) {

                }

                //todo  TA med den här
            
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
                </div>
                ";

                }


            }




            ?>

        </div>

    </div>


    <div class="rightside"></div>
</div>