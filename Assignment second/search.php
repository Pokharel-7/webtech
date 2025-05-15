(<?php
include 'db.php';

$email = $conn->real_escape_string($_GET['emailid']);
$result = $conn->query("SELECT * FROM contacts WHERE emailid = '$email'");

if ($result->num_rows == 0) {
    echo "<h3>No contact found with email: $email</h3>";
    exit;
}

$contact = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Contact Details</title></head>
<body>
<h2>Contact Details for <?= htmlspecialchars($email) ?></h2>
<ul>
    <li><strong>First Name:</strong> <?= htmlspecialchars($contact['firstname']) ?></li>
    <li><strong>Designation:</strong> <?= htmlspecialchars($contact['designation']) ?></li>
    <li><strong>Address 1:</strong> <?= htmlspecialchars($contact['address1']) ?></li>
    <li><strong>Address 2:</strong> <?= htmlspecialchars($contact['address2']) ?></li>
    <li><strong>City:</strong> <?= htmlspecialchars($contact['city']) ?></li>
    <li><strong>State:</strong> <?= htmlspecialchars($contact['state']) ?></li>
    <li><strong>Email:</strong> <?= htmlspecialchars($contact['emailid']) ?></li>
</ul>
<a href="index.php">Back to Address Book</a>
</body>
</html>
)