<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  die("You must log in to place an order.");
}

$user_id = $_SESSION['user_id'];
$item_name = $_POST['item_name'];
$regular_price = $_POST['regular_price'];
$discount_price = $_POST['discount_price'];

$conn = new mysqli("localhost", "root", "", "myshop");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO orders (user_id, item_name, regular_price, discount_price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isdd", $user_id, $item_name, $regular_price, $discount_price);

if ($stmt->execute()) {
  echo "Order placed successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
