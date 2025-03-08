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

            //! $query = $dbconn->query("SELECT * FROM comments ORDER BY DATE DESC");
            
            $query = $dbconn->query("
       SELECT comments.*, users.name, users.lastname, users.age 
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

                $commentId = htmlspecialchars($row['id']);

                //! Detta 2 gör ingen är mäst för syns skull
                $_SESSION['lastname'];
                $_SESSION['name'];

                if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

                    $_SESSION['name'] = $_COOKIE['name'];
                    $_SESSION['lastname'] = $_COOKIE['lastname'];
                }


                //! Göra så att man kan radera sina egna commentarer
                if ($row['name'] != $_SESSION['name'] && $row['lastname'] != $_SESSION['lastname']) {
                    echo "
       <div class='test-comentar'>
           <h4>$commentname $commentlastname</h4>
           <h5>$commentdate</h5>

           
           <h4>Age: $commentage</h4>
           <p>$commentcomment</p>
       </div>
       ";

                }

                //! Är ifall du har skrivit koemntaren ska den ha en annan border och en extra knapp
                else {
                    echo "
                <div class='test-comentar my-test-comentar'>
                <h4>$commentname $commentlastname </h4>
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

        <form action="profile.php" method="get">
            <input  name="F-name" type="text" value="Fransic">
            <input name="L-name" type="text" value="Bacon">
                <input type="submit" value="skicka">
        </form>

    </div>


    <div class="rightside"></div>
</div>