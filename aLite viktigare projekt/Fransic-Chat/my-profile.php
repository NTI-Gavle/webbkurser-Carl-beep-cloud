<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';

$_SESSION['lastname'];
$_SESSION['name'];

if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['lastname'] = $_COOKIE['lastname'];
}

$name = $_SESSION['name'];
$lastname = $_SESSION['lastname'];

$sql = "SELECT id, name, lastname, age, date FROM users Where name = ? And lastname = ?";
$stmt = $dbconn->prepare($sql);
$stmt->execute([$name, $lastname]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userId = $user['id'];
    $username = htmlspecialchars($user['name']);
    $userlastname = htmlspecialchars($user['lastname']);
    $userage = htmlspecialchars($user['age']);
    //!    $usercomment = htmlspecialchars($user['comment']);
    $userdate = htmlspecialchars($user['date']);

}

?>

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
    <link rel="stylesheet" href="bas/bas.css">

    <!--    //! Specefik för profile   -->
    <link rel="stylesheet" href="profile/profile.css">


    <!--    //! Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title>Fransic Chat</title>
</head>

<body>
    <?php
    include 'yes-loggin/yes-loggin-header.html';
    ?>

    <div class="about-container">

        <div class="about-container-part-1">

            <div class="info-img-container">
                <div class="img-container">
                    <img src="bilder/pierre4.png" alt="oj">
                </div>

                <div class="info-container">

                    <ul>
                        <li><u><h1> Name: <?php echo $username; ?></h1></u></li>
                        <li><u><h1> Lastname: <?php echo $userlastname; ?></h1></u></li>
                        <li><u><h1> Age: <?php echo $userage; ?></h1></u></li>
                    </ul>

                </div>
            </div>
            <div class="desc-container">
                <textarea class="description" name="" id="" cols="30" rows="5"> tjoehoehsan</textarea>
            </div>
        </div>

        <div class="about-container-part-2">

        </div>
    </div>


    <div class="mycontainer">


        <div class="leftside"></div>

        <div class="center">

        </div>


        <div class="rightside"></div>
    </div>

</body>

</html>