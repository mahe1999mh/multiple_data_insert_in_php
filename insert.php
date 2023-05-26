<?php
// Establish the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ddatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO main_table (data) VALUES (?)");
$stmt_related = $conn->prepare("INSERT INTO related_table (main_id, related_data) VALUES (?, ?)");

// Bind parameters and execute the statements for each data
$dataArray = $_POST['data'];
foreach ($dataArray as $data) {
    // Insert into the main table
    $stmt->bind_param("s", $data);
    $stmt->execute();

    // Get the auto-generated ID from the main table
    $mainId = $stmt->insert_id;

    // Insert into the related table using the main table's ID as foreign key
    $stmt_related->bind_param("is", $mainId, $relatedData);
    $relatedData = "Related data";
    $stmt_related->execute();
}

// Close the statements and the database connection
$stmt->close();
$stmt_related->close();
$conn->close();
?>