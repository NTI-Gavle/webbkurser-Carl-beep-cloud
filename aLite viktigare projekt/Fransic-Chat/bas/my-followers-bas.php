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


            $sql = "SELECT u.name, u.lastname, u.age,  
            FROM follows f
        JOIN users u ON f.follower_id = u.id
        LEFT JOIN comments c ON c.user_id = u.id
        WHERE f.following_id = ?";

            $stmt = $dbconn->prepare($sql);
            $stmt->execute([$userId]);

            $followers = $stmt->fetchAll(PDO::FETCH_ASSOC);



            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $commentname = htmlspecialchars($followers['name']);
                $commentlastname = htmlspecialchars($row['lastname']);
                $commentage = htmlspecialchars($row['age']);

                $commentcomment = htmlspecialchars($row['comment']);
                $commentdate = htmlspecialchars($row['date']);

                $commentId = htmlspecialchars($row['id']);
                $commentScore = (int) $row['score'];

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


                }

            }

            ?>

        </div>

        <a href=""></a>

    </div>


    <div class="rightside"></div>
</div>