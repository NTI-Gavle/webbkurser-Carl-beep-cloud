<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center">

        <div class="center-container">
            <div class="my-input-container">
                <h1 style="color:orange;"><?php  echo htmlspecialchars( $_SESSION['name'] . " " . $_SESSION['lastname']); ?>s Followers </h1>
            </div>
          


            <?php

            $sql = "SELECT DISTINCT u.name, u.lastname, u.age  
        FROM follows f
        JOIN users u ON f.follower_id = u.id
        LEFT JOIN comments c ON c.userId = u.id
        WHERE f.following_id = ?";

            $stmt = $dbconn->prepare($sql);
            $stmt->execute([$userId]);

            $followers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($followers as $follower) {
                $FolName = htmlspecialchars($follower['name']);
                $FolLastName = htmlspecialchars($follower['lastname']);

                $imagePathfolowers = checkimage($FolName, $FolLastName);



                echo "   
                <div class='name-box-conatiner'> 
                    <div class='name-box'>
        <img src='$imagePathfolowers' alt='Profile Picture'>
        <span >$FolName $FolLastName</span>
    </div>
    </div>
                    ";

            }


            ?>

        </div>

        <a href=""></a>

    </div>


    <div class="rightside"></div>
</div>