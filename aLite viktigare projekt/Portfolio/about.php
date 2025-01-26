<?php session_start();
require "databas-connect.php";

if (isset($_POST['nam']) && isset($_POST['age']) && isset($_POST['comment'])) {
    
  
        $stmt = $dbconn->prepare("INSERT INTO komen (namn, age, texten) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['nam'], $_POST['age'], $_POST['comment']]);
        session_unset();
        header("Location: about.php#comment-section");
        exit;
 

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Script länkar -->

    <script src="about.js" defer></script>

    <!--Favicon -->
    <link rel="icon" type="Bilder/glad3arigslav.png" href="Bilder/glad3arigslav.png">

    <!-- Vanlig css -->
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="header&fotter/header.css">
    <link rel="stylesheet" href="header&fotter/fotter.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Protfolio</title>
</head>

<body>
    <?php include "header&fotter/header.html" ?>
    <div class="about-container">

        <div class="about-container-part-1">

            <div class="under-rubrik">

                Vital information om mig
            </div>

            <div class="social-media-container">
                <div class="social-media-rubrik">
                    Sociala media platformar
                </div>

                <div class="social-media-atag-container">
                    <a href="" class="social-media"> <img class="social-media-image" target="blank"
                            src="Social-media-logo-folder\insta-logo.png" alt=""> </a>

                    <a href="" class="social-media"> <img class="social-media-image" target="blank"
                            src="Social-media-logo-folder\qq-logo.png" alt=""> </a>

                    <a href="" class="social-media"> <img class="social-media-image" target="blank"
                            src="Social-media-logo-folder\telegram-logo.png" alt=""> </a>

                    <a href="" class="social-media"> <img class="social-media-image" target="blank"
                            src="Social-media-logo-folder\we-chat-logo.png" alt=""> </a>

                    <a href="" class="social-media"> <img class="social-media-image" target="blank"
                            src="Social-media-logo-folder\x-logo.png" alt=""> </a>
                </div>
                <h2>E-Post: Tjingtjong@gmail.com</h2>

                <p>Jag är antagligen historiens bästa när det gäller att göra riktigt coola saker med en dator. En gång
                    drömmde jag att jag missade att gå till tandläkaren. Det låter
                    kanske inte så hemskt men när jag vakande så var det som om jag vaknade från en mardröm, men jag
                    blev välldigt glad när jag märkte att det bara var en drömm. </p>
            </div>

        </div>

        <div class="about-container-part-2">
            <div>
                <img class="profile-img" src="Bilder/smart3arigslav.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="commentarer-rubrik">
        <h3> Komentarer </h3>
    </div>

    <div class="commentarer" id="comment-section">
        <?php
        $query = $dbconn->query("SELECT * FROM komen");

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $name = htmlspecialchars($row['namn']);
            $age = htmlspecialchars($row['age']);
            $text = htmlspecialchars($row['texten']);

            echo "
        <div class='test-comentar'>
            <h4>$name</h4>
            
            <h4>Age: $age</h4>
            <p>$text</p>
        </div>
        ";
        }
        ?>
    </div>

    <div class="commentarer-rubrik">
        <h3> Skriv egen komentar </h3>
    </div>

    <div class="form-container">

        <form action="" method="post">
            <label for="name">Namn:</label>
            <input name="nam" type="text" id="name" placeholder="Skriv ditt namn"> <br>

            <label for="age">Ålder:</label>
            <input name="age" type="number" id="age" placeholder="Skriv din ålder"> <br>

            <label for="comment">Kommentar:</label>
            <input name="comment" type="text" id="comment" placeholder="Skriv en kommentar"> <br>

            <button type="submit">Skicka</button>
        </form>
    </div>

    <?php include "header&fotter/fotter.html" ?>
</body>



</html>