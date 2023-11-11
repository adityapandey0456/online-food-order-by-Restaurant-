<?php
$host = "localhost";
$username = "root";
$password = "Unilex@2020";
$database = "review";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT customer_name, review_text, review_date FROM customer_reviews ORDER BY review_date DESC";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>" . $row["customer_name"] . ":</strong></p>";
        echo "<p>" . $row["review_text"] . "</p>";
        echo "<p><em>Posted on " . $row["review_date"] . "</em></p>";
        echo "</div>";
    }
} else {
    echo "<p>No reviews available.</p>";
}

$mysqli->close();
?>
