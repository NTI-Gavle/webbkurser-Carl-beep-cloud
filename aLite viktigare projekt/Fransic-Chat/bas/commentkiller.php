<?php
require '../Cookies&Connect/connect.php';

//! Dett körs ifall du dödade en kommentar
if (isset($_POST['kill-btn'])) {

    $TheCommentsId = $_POST['kill-btn'];

    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$TheCommentsId]);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    unset($_POST['kill-btn']);
    exit();
}

?>