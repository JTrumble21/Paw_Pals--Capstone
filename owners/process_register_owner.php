<?php

session_start();
require '../config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $city  = trim($_POST['city'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $photoPath = '';

    if (!$name || !$city || !$email || !$phone) {
        die("Please fill in all required fields.");
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/owners/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmp  = $_FILES['photo']['tmp_name'];
        $fileName = uniqid() . '_' . basename($_FILES['photo']['name']);
        $targetFile = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['photo']['type'], $allowedTypes)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                $photoPath = 'uploads/owners/' . $fileName; // relative path for DB
            } else {
                die("Error uploading profile photo.");
            }
        } else {
            die("Only JPG, PNG, and GIF files are allowed.");
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO owners (name, city, email, phone, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $city, $email, $phone, $photoPath]);

        $ownerId = $pdo->lastInsertId();

        $_SESSION['owner_id'] = $ownerId;

        header("Location: ../pets/register_pets.php");
        exit;

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die("Invalid request.");
}
