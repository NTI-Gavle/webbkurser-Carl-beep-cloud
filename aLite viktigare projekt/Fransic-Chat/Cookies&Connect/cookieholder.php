<?php require 'connect.php';



if (!isset($_COOKIE['name'])) {
    $_COOKIE['name'] = null;
}

if (!isset($_COOKIE['lastname'])) {
    $_COOKIE['lastname'] = null;
}




if(isset($_POST['loggout-btn']))
{
    cookiedestoryer();
}

function cookiedestoryer()
{

    session_unset();
    session_destroy();


    setcookie('name', '', time() - 3600, "/");
    setcookie('lastname', '', time() - 3600, "/");
  
    
    unset($_COOKIE['adminbool']);
    unset($_COOKIE['name']);
    unset($_COOKIE['lastname']);

    header("Location: index.php");
    exit;
}

?>

