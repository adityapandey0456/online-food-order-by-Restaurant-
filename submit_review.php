<?php
$host = "localhost";
$username = "root";
$password = "unilex2020";
$database = "review";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['customer_name']) && isset($_POST['review_text'])) {
    $customer_name = $_POST['customer_name'];
    $review_text = $_POST['review_text'];

    $query = "INSERT INTO customer_reviews (customer_name, review_text, review_date) VALUES ('$customer_name', '$review_text', NOW())";

    if ($mysqli->query($query) === TRUE) {
        header("Location: index.html"); // Redirect back to the main page
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
