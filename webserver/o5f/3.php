<h1>skriv in någonting</h1>
<br>
<h3>lösenordet är  F******</h3>
<br>

<?php
session_start();
?>

<?php



$_SESSION["ost"] = "";
?>


<form action="3,1.php" method="post">
<input type="text" name="namn" size="36" value="<?php echo $_SESSION['ost'];?>" >
    <input type="submit">
</form>

