<?php
$servername = "127.0.0.1";
$port = 3307;
$username = "root";
$password = "123";
$dbname = "ituu2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the GET request
$searchTerm = $_GET['searchTerm'];

// Replace 'YourTableName' with the actual table name
$tableName = 'usinginfo';

// Perform the search query
$sql = "SELECT * FROM $tableName WHERE description LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Process the results into an array
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Send the results in regular JSON format if no errors occurred
header('Content-Type: application/json');
echo json_encode($data);
?>
