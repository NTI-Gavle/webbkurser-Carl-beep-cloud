<?php
require 'Cookies&Connect/connect.php';
session_start();

$showForm = false;
$invalid = false;

// If user arrives with a valid email
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $showForm = true;
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['new_password'])) {
    $email = $_POST['email'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $dbconn->prepare("UPDATE users SET pass = :pass WHERE epost = :email");
    $stmt->execute([
        ':pass' => $newPassword,
        ':email' => $email
    ]);

    if ($stmt->rowCount() > 0) {
        header("Location: http://localhost:8080/aLite%20viktigare%20projekt/Fransic-Chat/loggin.php");
        exit();
    } else {
        $invalid = true;
        $showForm = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fransic Chat - Change Password</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="loggin-css-js/loggin-reg.css">

    <!-- js -->
<script src="reset.js" defer></script>

    <!-- Bootstrap -->
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
                <h1 style="color:darkblue;">Change Password</h1>
            </div>

            <?php if ($invalid): ?>
                <div class="alert alert-danger">Something went wrong. Please try again.</div>
            <?php endif; ?>

            <?php if ($showForm): ?>
                <div class="form-container" id="write-loggin">
                    <form id="type-form" method="POST">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

                        <label style="color:lightblue;" for="new_password">New Password:</label>
                        <input style="border:blue 2px solid;" id="pass" name="new_password" type="password" id="new_password" placeholder="Enter new password" required> <br><br>

                        <button class="btn btn-primary" style="border:solid 2px blue; background-color:darkblue;" type="submit">Reset Password</button>
                    </form>
                </div>
                <div id="alerten" onclick="check()" class="hidden" role="alert">
                    A simple dark alert—check it out!
                </div>
            <?php else: ?>
                <div class="alert alert-warning">Invalid password reset link.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
