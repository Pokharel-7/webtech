<!-- HTML Form -->
<form action="file_upload.php" method="post" enctype="multipart/form-data">
Resume (PDF/DOC, ≤500KB): <input type="file" name="resume"><br><br>
Photo (JPG/JPEG, ≤1MB): <input type="file" name="photo"><br><br>
<input type="submit" name="submit" value="Upload">
</form>

<?php
if (isset($_POST['submit'])) {
$uploadDir = "uploads/";

// Create directory if not exists
if (!file_exists($uploadDir)) {
mkdir($uploadDir);
}

// Resume Validation
$resume = $_FILES['resume'];
$resumeName = basename($resume['name']);
$resumePath = $uploadDir . $resumeName;

$resumeType = strtolower(pathinfo($resumePath, PATHINFO_EXTENSION));
$resumeSize = $resume['size'];

if (file_exists($resumePath)) {
echo "Resume file already exists.<br>";
} elseif (!in_array($resumeType, ['pdf', 'doc'])) {
echo "Resume must be PDF or DOC.<br>";
} elseif ($resumeSize > 512000) {
echo "Resume must be less than 500KB.<br>";
} elseif (!is_uploaded_file($resume['tmp_name'])) {
echo "Invalid resume upload.<br>";
} else {
move_uploaded_file($resume['tmp_name'], $resumePath);
echo "Resume uploaded successfully.<br>";
}

// Photo Validation
$photo = $_FILES['photo'];
$photoName = basename($photo['name']);
$photoPath = $uploadDir . $photoName;

$photoType = strtolower(pathinfo($photoPath, PATHINFO_EXTENSION));
$photoSize = $photo['size'];

if (!in_array($photoType, ['jpg', 'jpeg'])) {
echo "Photo must be JPG or JPEG.<br>";
} elseif ($photoSize > 1048576) {
echo "Photo must be less than 1MB.<br>";
} elseif (!is_uploaded_file($photo['tmp_name'])) {
echo "Invalid photo upload.<br>";
} else {
move_uploaded_file($photo['tmp_name'], $photoPath);
echo "Photo uploaded successfully.";
}
}
?>