<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Address Book</h2>

<!-- Search -->
<form method="GET" action="search.php" class="search-form">
    <input type="email" name="emailid" placeholder="Search by Email" required>
    <button type="submit">Search</button>
</form>

<!-- Add New Contact Form (Vertical Layout) -->
<h3>Add New Contact</h3>
<form method="POST" action="add.php" class="contact-form">
    <label>First Name</label>
    <input type="text" name="firstname" placeholder="" required>

    <label>Designation</label>
    <input type="text" name="designation" placeholder="">

    <label>Address 1</label>
    <input type="text" name="address1" placeholder="">

    <label>Address 2</label>
    <input type="text" name="address2" placeholder="">

    <label>City</label>
    <input type="text" name="city" placeholder="">

    <label>State</label>
    <input type="text" name="state" placeholder="">

    <label>Email</label>
    <input type="email" name="emailid" placeholder="" required>

    <button type="submit">Add Contact</button>
</form>

<!-- Contact List -->
<h3>All Contacts</h3>
<table>
    <tr>
        <th>Name</th><th>Email</th><th>City</th><th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM contacts");
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= htmlspecialchars($row['firstname']) ?></td>
        <td><?= htmlspecialchars($row['emailid']) ?></td>
        <td><?= htmlspecialchars($row['city']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this contact?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
