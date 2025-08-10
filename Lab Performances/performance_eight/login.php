<?php
session_start();
require 'db.php'; // Connect to DB (assumes mysqli or PDO)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic sanitization
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Query the user
    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['email'] = $email;
            header("Location: index.php"); // Redirect to a logged-in page
            exit();
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ No user found with this email.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
