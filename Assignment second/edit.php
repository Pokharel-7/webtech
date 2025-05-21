(<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE contacts SET firstname=?, designation=?, address1=?, address2=?, city=?, state=?, emailid=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['firstname'], $_POST['designation'], $_POST['address1'], $_POST['address2'],
        $_POST['city'], $_POST['state'], $_POST['emailid'], $_POST['id']);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contacts WHERE id = $id");
$contact = $result->fetch_assoc();
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
    <input type="text" name="firstname" value="<?= $contact['firstname'] ?>" required>
    <input type="text" name="designation" value="<?= $contact['designation'] ?>">
    <input type="text" name="address1" value="<?= $contact['address1'] ?>">
    <input type="text" name="address2" value="<?= $contact['address2'] ?>">
    <input type="text" name="city" value="<?= $contact['city'] ?>">
    <input type="text" name="state" value="<?= $contact['state'] ?>">
    <input type="email" name="emailid" value="<?= $contact['emailid'] ?>" required>
    <button type="submit">Update Contact</button>
</form>
)