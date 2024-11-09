<?php

session_start()


?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tärningsexempel</title>
</head>
<body>
<h1>En tärning</h1>

<?php


$_SESSION["rolls"]= $_GET['rolls'];
if (isset($_SESSION["rolls"])) {
$times = $_SESSION["rolls"];
}
?>
<p>Tärningen kastas <?php echo $_SESSION['rolls']; ?> gånger, här är resultatet.</p>

<?php

// To save the outcome of each dice roll
$rolls = array();
// Roll the dice
for($i = 0; $i < $times; $i++) {
$rolls[$i] = rand(1, 6);
}
// Print out the results
$html = "<ul>";
foreach($rolls as $val) {
$html .= "<li>{$val}</li>";
}
$html .= "</ul>";
?>
<?=$html?>
</body>
</html>