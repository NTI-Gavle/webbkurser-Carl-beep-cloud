<?php require 'Cookies&Connect/connect.php';
session_start();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fransic Chat</title>

    <!-- //! css  -->
    <link rel="stylesheet" href="loggin-css-js/loggin-reg.css">


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
        <h1 style="color:darkblue;" > Change password</h1>
    </div>
    <div class="form-container" id="write-loggin">

        <form id="type-form" action="" method="post">
            <label style="color:lightblue;" for="name">Namn:</label>
            <input style="border:blue 2px solid;" name="name" type="text" id="name" placeholder="Skriv ditt namn"> <br>

            
            <label style="color:lightblue;" for="lastname">Last Name:</label>
            <input style="border:blue 2px solid;" name="lastname" type="text" id="lastname" placeholder="Skriv ditt efternamn"> <br>

            

            <label style="color:lightblue;" for="mail">Email:</label>
            <input style="border:blue 2px solid;" name="mail" type="mailword" id="mail" placeholder="e-post"> <br>


            <button  style="border:solid 2px blue; background-color:darkblue;" type="submit">Send</button>

        </form>
        <div id="alerten" onclick="check()" class="hidden" role="alert">
            A simple dark alert—check it out!
        </div>

    </div>

    <div class="go-back-container">

        <a href="loggin.php">
            <button style="background-color:darkblue ;" >
                Go back
            </button>
        </a>
        
<?php

if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['mail']))
{
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];

    
    $sql = "SELECT * FROM users WHERE name = :name AND lastname = :lastname AND epost = :mail";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':lastname' => $lastname,
        ':mail' => $mail
    ]);

    $themail = htmlspecialchars($_POST['mail']);
    $headers = "From: support@idontknowmydomain.com\r\n";

    if ($stmt->rowCount() > 0) {
        mail($themail,'Renew-password','this is about chicken' ,$headers);
        echo "<h1 style='color:yellow;'>skibidi ohio</h1>";
    } else {
        echo "<p style='color:red;'>No matching user found.</p>";
    }
}


?>

    </div>


</div>
</div>


</body>
</html>

