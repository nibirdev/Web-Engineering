<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "myshop");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get and sanitize data
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$name = htmlspecialchars($_POST['name']);
$birthdate = $_POST['birthdate']; // expecting YYYY-MM-DD format
$password = $_POST['password'];

if (!$email || !$birthdate) {
    die("Invalid input");
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Step 1: Insert user WITHOUT serial_number
$stmt = $conn->prepare("INSERT INTO users (email, name, birthdate, password_hash) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $name, $birthdate, $passwordHash);

if ($stmt->execute()) {
    // Step 2: Get the inserted user ID
    $userId = $conn->insert_id;

    // Step 3: Generate serial number
    $dobPart = date("Ymd", strtotime($birthdate));
    $serialNumber = $dobPart . '-' . $userId;

    // Step 4: Update serial_number for the user
    $updateStmt = $conn->prepare("UPDATE users SET serial_number = ? WHERE id = ?");
    $updateStmt->bind_param("si", $serialNumber, $userId);

    if ($updateStmt->execute()) {
        echo "Registration successful! Your serial number is: $serialNumber";
    } else {
        echo "Error updating serial number: " . $updateStmt->error;
    }
    $updateStmt->close();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
