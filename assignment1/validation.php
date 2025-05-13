<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: form.php");
    exit;
}

function clean($data) {
    return trim(htmlspecialchars($data));
}

$userid = clean($_POST['userid'] ?? '');
$password = clean($_POST['password'] ?? '');
$firstname = clean($_POST['firstname'] ?? '');
$address = clean($_POST['address'] ?? '');
$country = clean($_POST['country'] ?? '');
$zip = clean($_POST['zip'] ?? '');
$email = clean($_POST['email'] ?? '');
$sex = clean($_POST['sex'] ?? '');
$language = $_POST['language'] ?? [];
$about = clean($_POST['about'] ?? '');

$errors = [];
$old = compact('userid', 'firstname', 'address', 'country', 'zip', 'email', 'sex', 'language', 'about');



// User ID: 5–12 characters
if ($userid === '') {
    $errors['userid'] = "User ID is required.";
} elseif (strlen($userid) < 5 || strlen($userid) > 12) {
    $errors['userid'] = "User ID should be between 5 to 12 characters.";
}

// Password: 7–12 characters
if ($password === '') {
    $errors['password'] = "Password is required.";
} elseif (strlen($password) < 7 || strlen($password) > 12) {
    $errors['password'] = "Password should be between 7 to 12 characters.";
}

// Firstname: alphabets only
if ($firstname === '') {
    $errors['firstname'] = "First name is required.";
} elseif (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
    $errors['firstname'] = "First name should only contain alphabets.";
}

// Address: alphanumeric only
if ($address === '') {
    $errors['address'] = "Address is required.";
} elseif (!preg_match("/^[a-zA-Z0-9\s]+$/", $address)) {
    $errors['address'] = "Address should contain only alphanumeric characters.";
}

// Country
if ($country === '') {
    $errors['country'] = "Country is required.";
}

// Zip Code: numeric only
if ($zip === '') {
    $errors['zip'] = "Zip Code is required.";
} elseif (!ctype_digit($zip)) {
    $errors['zip'] = "Zip Code should only be numeric.";
}

// Email: valid format
if ($email === '') {
    $errors['email'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

// Sex
if ($sex === '') {
    $errors['sex'] = "Please select your sex.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
} else {
    $_SESSION['success'] = [
        'User ID' => $userid,
        'Name' => $firstname,
        'Address' => $address,
        'Country' => $country,
        'Zip Code' => $zip,
        'Email' => $email,
        'Sex' => $sex,
        'Language(s)' => implode(', ', $language),
        'About' => $about
    ];
}
header("Location: form.php");
exit;
