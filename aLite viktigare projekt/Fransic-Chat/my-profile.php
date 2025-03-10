<?php require 'Cookies&Connect/connect.php';
session_start();
include 'Cookies&Connect/cookieholder.php';

$_SESSION['lastname'];
$_SESSION['name'];

if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['lastname'] = $_COOKIE['lastname'];
}



//! ÄR FÖR ATT FÅ ALL VANLIG INFORMATION OM DIG
$name = $_SESSION['name'];
$lastname = $_SESSION['lastname'];

$sql = "SELECT id, name, lastname, age, date, description FROM users Where name = ? And lastname = ?";
$stmt = $dbconn->prepare($sql);
$stmt->execute([$name, $lastname]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userId = $user['id'];
    $username = htmlspecialchars($user['name']);
    $userlastname = htmlspecialchars($user['lastname']);
    $userage = htmlspecialchars($user['age']);
    //! Det var en error om att den var null gjorde en @
    @$userdesc = htmlspecialchars($user['description']);
    $userdate = htmlspecialchars($user['date']);
}


//! är för att få nummret av chats meddelanden man skrvit
if (isset($userId)) {
    $sql = "SELECT COUNT(*) as comment_count FROM comments WHERE userId = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$userId]);
    $commentAmount = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $commentAmount = ['comment_count' => 0];
}



//! Är för att spara en desciption på din users databas
if (isset($_POST['save-desc'])) {

    $sql = "SELECT id FROM users Where name = ? And lastname = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$name, $lastname]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userId = $user['id'];

        $desc = $_POST['desc'];

        $sql = "UPDATE users SET description = ? WHERE id = ?";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$desc, $userId]);
    }
    header("refresh: 1");
    unset($_POST['save-desc']);
}


//! DÖDA KOMENTARER
if (isset($_POST['kill-btn'])) {

    $TheCommentsId = $_POST['kill-btn'];

    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$TheCommentsId]);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    unset($_POST['kill-btn']);
    exit();
}

//! POSTA COMMENTS
if (isset($_POST['comment']) && strlen($_POST['comment']) != 0) {

    //! Detta 2 gör ingen är mäst för syns skull
    $_SESSION['lastname'];
    $_SESSION['name'];

    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    $name = $_SESSION['name'];
    $lastname = $_SESSION['lastname'];

    $sql = "SELECT id FROM users Where name = ? And lastname = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$name, $lastname]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userId = $user['id'];

        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (comment, userId, date) VALUES (?, ?, NOW())";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$comment, $userId]);
    }


    header("refresh: 1");
    $_POST['comment'] = "";
    unset($_POST['comment']);
}


//! Profilbild IMG byte 
if (isset($_POST['upload-image']) && isset($_FILES['image'])) {
    $targetDir = "bilder/";

    // Get the file extension
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Create new filename using session variables
    if (isset($_SESSION['name']) && isset($_SESSION['lastname'])) {
        $newFileName = $_SESSION['name'] . $_SESSION['lastname'] . "." . $imageFileType;
        $targetFilePath = $targetDir . $newFileName;

        // Allow only specific image formats
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedTypes)) {
            // Check if the file is uploaded correctly
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                "File uploaded successfully.";
            } else {
                 "Error uploading file.";
            }
        } else {
                 "Invalid file type.";
        }
    }

}

//! ÄR för att bilden du laddar ska kunna ses på profilen
$extensions0 = ['jpg', 'jpeg', 'png', 'gif'];
$imagePath0 = '';
foreach ($extensions0 as $ext0) {
    if (file_exists("bilder/{$name}{$lastname}.$ext0")) {
        $imagePath0 = "bilder/{$name}{$lastname}.$ext0";
        break;
    }
}

//! Är för att din profilbild ska ses i headern
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
$imagePath = '';
foreach ($extensions as $ext) {
    if (file_exists("bilder/{$name}{$lastname}.$ext")) {
        $imagePath = "bilder/{$name}{$lastname}.$ext";
        break;
    }
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

    <!--//!  JS för Byta profilbild   -->
    <link rel="stylesheet" href="profile/my-profile.js">

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
    include 'yes-loggin/yes-loggin-header.php';
    ?>

    <div class="about-container">

        <div class="about-container-part-1">

            <div class="info-img-container">
                <div class="img-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label  for="imageUpload">
                            <img  id="profileImage" src="<?php echo $imagePath0 ?: 'bilder/no-user-image.png'; ?>"
                                alt="Click to change" style="cursor: pointer;">
                        </label>
                        <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;"
                            onchange="previewImage(event)">
                        <button type="submit" name="upload-image" class="upload-button">Upload</button>
                    </form>
                </div>


                <div class="info-container">

                    <ul>
                        <li><u>
                                <h1> Name: <?php echo $username; ?></h1>
                            </u></li>
                        <li><u>
                                <h1> Lastname: <?php echo $userlastname; ?></h1>
                            </u></li>
                        <li><u>
                                <h1> Age: <?php echo $userage; ?></h1>
                            </u></li>
                    </ul>

                </div>
            </div>
            <div class="desc-container">

                <form action="" method="post">
                    <textarea class="description" name="desc" id="" cols="30" rows="5"
                        maxlength="199"> <?php echo $userdesc; ?> </textarea>
                    <button name="save-desc" type="submit" class="btn btn-warning">Save</button>
                </form>
            </div>
        </div>

        <div class="about-container-part-2">
            <div class="stats-container">

                <div class="stats">

                    <h3>Följer</h3>
                    <div> 0 </div>
                </div>

                <div class="stats">

                    <h3>Följare</h3>
                    <div> 0 </div>
                </div>

                <div class="stats">

                    <h3>Chats</h3>
                    <div> <?php echo $commentAmount['comment_count']; ?></div>
                </div>

            </div>


        </div>
    </div>

    <?php include 'bas/my-comments-bas.php'; ?>
</body>

</html>