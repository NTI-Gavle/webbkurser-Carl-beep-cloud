<?php require 'connect.php';

$sql = "SELECT * FROM users";
$stmt = $dbconn->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll();
foreach ($res as $row) {

    if (@$_COOKIE['name'] == $row['name'] && @$_COOKIE['lastname'] == $row['lastname']) {
        echo "Det fungerade";
        header("Location: welcome.php");
        exit;
    }

}



?>