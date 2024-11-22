<?php
include('episktförsök.php');

try {
    
    // Insert data into kompisar
    $sql = "INSERT INTO kompisar (förnamn, efternamn, mobil, epost) VALUES (?, ?, ?, ?)";
  
    $stmt = $dbconn->prepare($sql);
    $stmt->execute(['Fransic', 'Bacon', 0701237574, 'FransicBacon@gmail.com']);
    echo "New record created successfully in kompisar.<br>";

    // Retrieve data from kompisar
    $sql = "SELECT * FROM kompisar";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute();

    $res = $stmt->fetchAll();

    // Display the data in an HTML table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Förnamn</th><th>Efternamn</th><th>Mobil</th><th>E-post</th></tr>";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['förnamn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['efternamn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobil']) . "</td>";
        echo "<td>" . htmlspecialchars($row['epost']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$dbconn = null;
?>
