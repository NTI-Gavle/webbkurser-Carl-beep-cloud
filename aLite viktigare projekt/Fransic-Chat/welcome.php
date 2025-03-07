<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php'; ?>

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
    <link rel="stylesheet" href="css-js/bas.css">

    <!-- //! är inuti själva bas men css separat för den här filen -->
    <link rel="stylesheet" href="no-loggin/no-loggin-bas.css">


    <!--    //! Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title>Fransic Chat</title>
</head>

<body>
    <?php include "yes-loggin/yes-loggin-header.html"; ?>


    <div class="mycontainer">


        <div class="leftside"></div>

        <div class="center">

            <div class="center-container">
            <h1 style="color:orange; text-decoration:underline blue solid;">Hejsan <?php echo $_SESSION['name'] ?></h1>
            
            <div class="my-input-container">
            <form action="" metod="post">
                <input type="text" id="comment" placeholder="Write a comment" name="comment">
                <input type="submit">
            </form>
            </div>

            </div>
        </div>


        <div class="rightside"></div>
    </div>



</body>

</html>

<?php  

if(isset($_POST['comment'])){

    $_SESSION['lastname'];
    $_SESSION['name'];
/*
    if(!isset($_SESSION['name']) || !isset($_SESSION['lastname']) )
    {
    
        $_SESSION['lastname'];
        $_SESSION['name'];

    }
*/
    $sql = "SELECT id FROM users WHERE name = ? AND lastname = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$name, $lastname]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['id'];

        // Insert the comment along with the user ID
        $sql = "INSERT INTO comments (user_id, comment, date) VALUES (?, ?, NOW())";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$user_id, $_POST['comment']]);
    }
    unset($_POST['comment']);
}

?>