<?php
include 'db_connect.php';

// Gather POST data
$name   = $_POST['name'];
$city   = $_POST['city'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$times  = $_POST['times'];

// File uploads
$profilePhotoPath = '';
$uploadsDir = "uploads/";

if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0777, true);
}

// Profile photo
if (!empty($_FILES['profile_photo']['name'])) {
    $profilePhotoPath = $uploadsDir . basename($_FILES['profile_photo']['name']);
    move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profilePhotoPath);
}

// Security docs
$securityDocs = [];
if (!empty($_FILES['security_docs']['name'][0])) {
    foreach ($_FILES['security_docs']['name'] as $key => $filename) {
        $path = $uploadsDir . basename($filename);
        move_uploaded_file($_FILES['security_docs']['tmp_name'][$key], $path);
        $securityDocs[] = $path;
    }
}
$securityDocsStr = implode(",", $securityDocs);

// Insert into walkers
$stmt = $pdo->prepare("INSERT INTO walkers (name, city, email, phone, profile_photo, security_docs) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$name, $city, $email, $phone, $profilePhotoPath, $securityDocsStr]);
$walkerId = $pdo->lastInsertId();

// Availability
if (!empty($_POST['days'])) {
    foreach ($_POST['days'] as $day) {
        $stmt = $pdo->prepare("INSERT INTO walker_availability (walker_id, day, times) VALUES (?, ?, ?)");
        $stmt->execute([$walkerId, $day, $times]);
    }
}

// Questionnaire
$stmt = $pdo->prepare("INSERT INTO walker_questionnaire (walker_id, sliding_scale, multiple_dogs, long_walks, travel, contact_preference) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $walkerId,
    $_POST['sliding_scale'],
    $_POST['multiple_dogs'],
    $_POST['long_walks'],
    $_POST['travel'],
    $_POST['contact_preference']
]);

echo "Walker account successfully created!";
?>
