<?php
session_start();
require '../config.php';

if (!isset($_SESSION['owner_id'])) {
    die("You must be logged in as an owner to register pets.");
}

$owner_id = $_SESSION['owner_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $breed = trim($_POST['breed'] ?? '');
    $age   = intval($_POST['age'] ?? 0);
    $requirements = trim($_POST['requirements'] ?? '');
    $photoPath = '';


    if (!$name || !$breed || !$age) {
        die("Please fill in all required fields (name, breed, age).");
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/pets/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmp  = $_FILES['photo']['tmp_name'];
        $fileName = uniqid() . '_' . basename($_FILES['photo']['name']);
        $targetFile = $uploadDir . $fileName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['photo']['type'], $allowedTypes)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                $photoPath = 'uploads/pets/' . $fileName; // save relative path in DB
            } else {
                die("Error uploading pet photo.");
            }
        } else {
            die("Only JPG, PNG, and GIF files are allowed.");
        }
    } else {
        die("Pet photo is required.");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO pets (owner_id, name, breed, age, requirements, photo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$owner_id, $name, $breed, $age, $requirements, $photoPath]);

        if ($_POST['action'] === 'add') {
            echo "<p>✅ Pet '$name' registered successfully! Redirecting so you can add another...</p>";
            echo "<meta http-equiv='refresh' content='2;url=register_pets.php'>";
        } else {
            echo "<p>✅ Pet '$name' registered successfully!</p>";
            echo "<p><a href='../welcome.php'>Back to Home</a></p>";
        }

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die("Invalid request.");
}
