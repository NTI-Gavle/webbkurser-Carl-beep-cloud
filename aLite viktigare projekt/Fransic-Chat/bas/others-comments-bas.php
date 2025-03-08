<div class="mycontainer">


    <div class="leftside"></div>

    <div class="center">

        <div class="center-container">
            <div class="my-input-container">
                <h1 style="color:orange;"><?php echo $_GET['F-name'] . " " . $_GET['L-name']; ?> </h1>
            </div>
           


            <?php

        //todo MÅste fixa errorn
            $sql = "SELECT * FROM comments WHERE name = :profileName AND lastname = :profileLastName";
            $query = $pdo->prepare($sql);
            $query->execute([
                ':profileName' => $profileName,
                ':profileLastName' => $profileLastName
            ]);


            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $commentname = htmlspecialchars($row['name']);
                $commentlastname = htmlspecialchars($row['lastname']);
                $commentage = htmlspecialchars($row['age']);

                $commentcomment = htmlspecialchars($row['comment']);
                $commentdate = htmlspecialchars($row['date']);

                $commentId = htmlspecialchars($row['id']);

               
                    echo "
       <div class='test-comentar'>
           <h4>$commentname $commentlastname</h4>
           <h5>$commentdate</h5>

           
           <h4>Age: $commentage</h4>
           <p>$commentcomment</p>
       </div>
       ";

                }

            ?>

        </div>


    </div>


    <div class="rightside"></div>
</div>