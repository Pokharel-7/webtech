<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? null;
unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        .field { margin-bottom: 15px; }
        label { display: inline-block; min-width: 120px;  }
        .error { color: red; font-size: 15px; margin-left: 10px; }
        .success { background: #e1ffe1; border: 1px solid green; padding: 10px; margin-bottom: 15px; }
        textarea { width: 50%; height: 50px; resize: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>

    <?php if ($success): ?>
        <div class="success">
            <strong>Form submitted successfully!</strong>
            <?php foreach ($success as $key => $value): ?>
                <p><strong><?= $key ?>:</strong> <?= nl2br(htmlspecialchars($value)) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="validation.php" method="POST">
        <div class="field">
            <label>User ID *</label>
            <input type="text" name="userid" value="<?= $old['userid'] ?? '' ?>">
            <span class="error"><?= $errors['userid'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Password *</label>
            <input type="password" name="password">
            <span class="error"><?= $errors['password'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>First Name *</label>
            <input type="text" name="firstname" value="<?= $old['firstname'] ?? '' ?>">
            <span class="error"><?= $errors['firstname'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Address *</label>
            <input type="text" name="address" value="<?= $old['address'] ?? '' ?>">
            <span class="error"><?= $errors['address'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Country *</label>
            <select name="country">
                <option value="">--Select--</option>
                <option value="Nepal" <?= ($old['country'] ?? '') === 'Nepal' ? 'selected' : '' ?>>Nepal</option>
                <option value="India" <?= ($old['country'] ?? '') === 'India' ? 'selected' : '' ?>>India</option>
                <option value="USA" <?= ($old['country'] ?? '') === 'USA' ? 'selected' : '' ?>>USA</option>
            </select>
            <span class="error"><?= $errors['country'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Zip Code *</label>
            <input type="text" name="zip" value="<?= $old['zip'] ?? '' ?>">
            <span class="error"><?= $errors['zip'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Email *</label>
            <input type="text" name="email" value="<?= $old['email'] ?? '' ?>">
            <span class="error"><?= $errors['email'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Sex *</label>
            <input type="radio" name="sex" value="Male" <?= ($old['sex'] ?? '') === 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="sex" value="Female" <?= ($old['sex'] ?? '') === 'Female' ? 'checked' : '' ?>> Female
            <span class="error"><?= $errors['sex'] ?? '' ?></span>
        </div>

        <div class="field">
            <label>Languages</label>
            <input type="checkbox" name="language[]" value="English" <?= in_array('English', $old['language'] ?? []) ? 'checked' : '' ?>> English
            <input type="checkbox" name="language[]" value="Nepali" <?= in_array('Nepali', $old['language'] ?? []) ? 'checked' : '' ?>> Nepali
        </div>

        <div class="field">
            <label>About</label><br>
            <textarea name="about"><?= $old['about'] ?? '' ?></textarea>
        </div>

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
