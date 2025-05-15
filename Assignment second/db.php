<?php
$conn = new mysqli("localhost", "root", "", "address_book");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
