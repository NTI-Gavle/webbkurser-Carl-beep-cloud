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

<h2> Hejsan du är inloggad som en admin:  <?php echo $namn ?></h2>

<br>
<form action="" method="post">
    <input name="koll" value="Kolla personer som är registerarde" type="submit">
</form>
<br>

<form method="post">
    <button type="submit" name="ding">Logga ut</button>
</form>

</body>
</html>


<?php 

if(isset($_POST['koll']))
{
    kolla();
}

function kolla()
{
    global $dbconn; 
    $sql = "SELECT * FROM users";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();

    // Display the data in an HTML table
    echo "<table border='1'>";
    echo "<tr><th>Namn</th><th>Efternamn</th><th>Användarnamn</th><th>Lösenord</th><th>Datum</th></tr>";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Namn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Efternamn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Användarnamn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Lösenord']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Datum']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";


}

function myFunction() {

session_unset();
header("Location: index.php");

}

if (isset($_POST['ding'])) {
myFunction();
}?>




