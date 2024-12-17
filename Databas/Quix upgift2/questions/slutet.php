<?php  echo "du är klar";

if(isset($_POST['unsetbtn'])){
    session_unset();
    header("Refresh:0");
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" metod="post">
        <input type="submit">
    </form>

<form action="" method="post">
    <input value="unset" name="unsetbtn" type="submit">
</form>

</body>
</html>