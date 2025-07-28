<?php include 'db.php'; ?>
<?php include 'navbar.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $best_seller = $_POST['best_seller'];

    $sql = "INSERT INTO books (title, author, genre, description, best_seller) 
            VALUES ('$title', '$author', '$genre', '$description', '$best_seller')";
    $conn->query($sql);
}
?>

<link rel="stylesheet" href="style.css">

<div class="form-container">
    <h2>Add New Book</h2>
    <form method="POST" action="">
        <label>Title:</label><input type="text" name="title" required><br>

        <label>Author:</label><input type="text" name="author" required><br>

        <label>Genre:</label>
        <select name="genre" required>
            <option value="Fiction">Fiction</option>
            <option value="Non-fiction">Non-fiction</option>
            <option value="Sci-fi">Sci-fi</option>
            <option value="Romance">Romance</option>
        </select><br>

        <label>Description:</label><textarea name="description" required></textarea><br>

        <label>Best Seller:</label>
        <input type="radio" name="best_seller" value="Yes" required> Yes
        <input type="radio" name="best_seller" value="No" required> No<br>

        <input type="submit" value="Submit Book">
    </form>
</div>