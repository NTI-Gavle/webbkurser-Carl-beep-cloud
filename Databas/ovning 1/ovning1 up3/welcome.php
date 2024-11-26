<?php
include ('connecttyp.php');
session_start();

$namn = $_SESSION['name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2> Hejsan <?php echo $namn ?></h2>

<br><br>

<form method="post">
    <button type="submit" name="ding">Logga ut</button>
</form>

</body>
</html>


<?php function myFunction() {

session_unset();
header("Location: index.php");

}

if (isset($_POST['ding'])) {
myFunction();
} ?>




