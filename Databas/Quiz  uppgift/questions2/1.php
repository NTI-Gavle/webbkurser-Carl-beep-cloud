<?php
require 'quizconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div> <?php echo $ttexten ?> </div>
    <form action=""   method="post">
       <input type="radio" name="svar" value="alt1"> <?php echo $aalt1; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt2"><?php echo $aalt2; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt3"><?php echo $aalt3; echo'<br>'; ?> 
        <input type="radio" name="svar" value="alt4"><?php echo $aalt4; echo'<br>'; ?> 

        <input value="Lås" name="ans" type="submit">
    </form>


</body>

</html>