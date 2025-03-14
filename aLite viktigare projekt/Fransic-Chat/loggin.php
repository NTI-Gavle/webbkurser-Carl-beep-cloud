<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fransic Chat</title>

    <!-- //! css  -->
    <link rel="stylesheet" href="loggin-css-js/loggin-reg.css">

    <!-- //! JS för att loggain och sådant -->
    <script src="loggin-css-js/loggin.js" defer></script>

    <!-- //! bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body>

    <div class="my-mega-container">

        <div class="my-container">
            <div class="text-container">
                <h1> Loggin to Fransic Chat</h1>
            </div>
            <div class="form-container" id="write-loggin">

                <form id="type-form" action="" method="post">
                    <label for="name">Namn:</label>
                    <input name="name" type="text" id="name" placeholder="Skriv ditt namn"> <br>


                    <label for="pass">Password:</label>
                    <input name="pass" type="password" id="pass" placeholder="Password"> <br>

                    <label for="cbox">Remeber login</label>

                    <div class="cboxfiller">
                        <input name="cbox" type="checkbox" id="cbox" class="cbox">
                    </div>

                    <button type="submit">Logga in</button>

                </form>
                <div id="alerten" onclick="check()" class="hidden" role="alert">
                    A simple dark alert—check it out!
                </div>

            </div>



            <div class="text-container">
                <a href="register.php"> <button type="button" class="btn btn-warning reg-btn">Go To Register</button>
                </a>
            </div>

            <div class="go-back-container">

                <a href="index.php">
                    <button>
                        Go back
                    </button>
                </a>

            </div>


        </div>
    </div>


</body>

</html>




<?php



if (isset($_POST['name']) && isset($_POST['pass'])) {

    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();
    foreach ($res as $row) {
        if ($row['name'] == $_POST['name'] && $row['pass'] == $_POST['pass']) {

            $_SESSION['name'] = $row['name'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['date'] = $row['date'];


            if (isset($_POST['cbox'])) {

                $expiry = time() + (30 * 24 * 60 * 60); // 30 days
                setcookie('name', $_POST['name'], $expiry, "/");
                setcookie('lastname', $row['lastname'] ?? '', $expiry, "/");

                if ($row['bool'] == 1) {
                    setcookie('name', '', time() - 3600, "/");
                    setcookie('lastname', '', time() - 3600, "/");
                    unset($_COOKIE['name']);
                    unset($_COOKIE['lastname']);
                }
            }

            $_SESSION['adminbool'] = "0";

            if ($row['bool'] == 1) {

                $_SESSION['adminbool'] = "1";
                header("Location: adminwelcome.php");
                exit;
            }

            header("Location: welcome.php");

        }



    }

    $loginFailed = true;
    ?>
    <script>
        localStorage.setItem("loginFailed", "true");
    </script>
    <?php


}

?>