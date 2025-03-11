<?php require 'Cookies&Connect/connect.php';
session_start();
require 'Cookies&Connect/cookieholder.php';
include 'Cookies&Connect/check-image.php';

$name = $_GET['F-name'];
$lastname = $_GET['L-name'];

$profileLastName = $_GET['L-name'];
$profileName = $_GET['F-name'];




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


$theirProfile = checkimage($_GET['F-name'], $_GET['L-name']);
$headerimagePath = checkimage($_SESSION['name'], $_SESSION['lastname']);



//! På Welcome sidan kan den här vara i comment-bas.php men här fungerade det visst inte
//! läggertill och tar bort score på kommentarerna
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vote-btn'])) {
    $commentId = $_POST['comment_id'];
    $action = $_POST['vote-btn'];

    if ($action === "upvote") {
        $dbconn->query("UPDATE comments SET score = score + 1 WHERE id = $commentId");
    } elseif ($action === "downvote") {
        $dbconn->query("UPDATE comments SET score = GREATEST(score - 1, 0) WHERE id = $commentId");
    }
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


//! För Följa och unfollow knappen
$follower_name = $_SESSION['name'];
$follower_lastname = $_SESSION['lastname'];

$query = "SELECT u.id 
FROM users u 
WHERE u.name = ? AND u.lastname = ?";
$stmt = $dbconn->prepare($query);
$stmt->execute([$follower_name, $follower_lastname]);
$follower = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$follower) {
    die("User not found.");
}

$follower_id = $follower['id'];

$userId = $user['id'];

// Check if already following
$query = "SELECT * FROM follows WHERE follower_id = ? AND following_id = ?";
$stmt = $dbconn->prepare($query);
$stmt->execute([$follower_id, $userId]);
$isFollowing = $stmt->fetch(PDO::FETCH_ASSOC) !== false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $userId;

    if ($isFollowing) {
        $deleteQuery = "DELETE FROM follows WHERE follower_id = ? AND following_id = ?";
        $stmt = $dbconn->prepare($deleteQuery);
        $stmt->execute([$follower_id, $userId]);
    } else {
        $insertQuery = "INSERT INTO follows(follower_id, following_id) VALUES (?, ?)";
        $stmt = $dbconn->prepare($insertQuery);
        $stmt->execute([$follower_id, $userId]);
    }

    header("refresh: 0");
}



//! Kollar nummret på konton som följer konton som du är inne på
$sql = "SELECT COUNT(*) as follow_count FROM follows WHERE following_id = ?";
$stmt = $dbconn->prepare($sql);
$stmt->execute([$userId]);
$followCount = $stmt->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT COUNT(*) as following_count FROM follows WHERE follower_id = ?";
$stmt = $dbconn ->prepare($sql);
$stmt->execute([$userId]);
$followingCount = $stmt->fetch(PDO::FETCH_ASSOC);

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
    if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {

        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['lastname'] = $_COOKIE['lastname'];
    }

    if ($_SESSION['name'] == "" && $_SESSION['lastname'] == "") {
        include 'no-loggin/no-loggin-header.html';
    } else {
        include 'yes-loggin/yes-loggin-header.php';
    }
    ?>

    <div class="about-container">

        <div class="about-container-part-1">

            <div class="info-img-container">
                <div class="img-container">
                    <img src="<?php echo $theirProfile ?: 'bilder/no-user-image.png'; ?>" alt="Porfile">
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
                    <textarea class="description" name="desc" id="" cols="30" readonly
                        rows="5"> <?php echo $userdesc; ?> </textarea>
                </form>
            </div>
        </div>

        <div class="about-container-part-2">
            <div class="stats-container">
                <form class="follow-form" method="POST" action="">
                    <button class="follow-button" type="submit"><?php echo $isFollowing ? "Unfollow" : "Follow"; ?></button>
                </form>
                <div class="stats">

                    <h3>Följer</h3>
                    <div> <?php echo $followingCount['following_count']?> </div>
                </div>

                <div class="stats">

                    <h3>Följare</h3>
                    <div> <?php echo $followCount['follow_count']; ?> </div>
                </div>

                <div class="stats">

                    <h3>Chats</h3>
                    <div><?php echo $commentAmount['comment_count']; ?> </div>
                </div>

            </div>


        </div>
    </div>

    <?php include 'bas/others-comments-bas.php'; ?>
</body>

</html>