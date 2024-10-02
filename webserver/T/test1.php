<?php
session_start();
?>
<h1> Logga in </h1> <br>
<?php
$_SESSION["anv"] = "";
$_SESSION["pas"] = "";

?>

<form action="test1,1.php" method="post">
   Namn:  <input name="namn" type="text" value="<?php echo $_SESSION['anv'];?>"> <br>
   Lösenord: <input name="lös" type="password" value="<?php echo $_SESSION['pas'];?>">

   <br>
 <button type="submit" > Logga in</button>
</form>