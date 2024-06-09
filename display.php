<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM houses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="card-container">';
    while($row = $result->fetch_assoc()) {
        $images = json_decode($row['images']);
        foreach ($images as $image) {
            echo '<div class="card">';
            echo '<img src="' . $image . '" alt="House Image">';
            echo '<div class="card-content">';
            echo '<p>Location: ' . $row['city'] . '</p>';
            echo '<p>Type: ' . $row['category'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</div>';
} else {
    echo "0 results";
}

$conn->close();
?>
