<?php include 'db.php'; ?>
<?php include 'navbar.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $best_seller = $_POST['best_seller'];

    $conn->query("UPDATE books SET title='$title', author='$author', genre='$genre', 
        description='$description', best_seller='$best_seller' WHERE id=$id");

    header("Location: view.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="form-container">
    <h2>Edit Book</h2>
    <form method="POST">
        <label>Title:</label><input type="text" name="title" value="<?= $row['title'] ?>" required><br>
        <label>Author:</label><input type="text" name="author" value="<?= $row['author'] ?>" required><br>
        <label>Genre:</label>
        <select name="genre">
            <?php
            $genres = ['Fiction', 'Non-fiction', 'Sci-fi', 'Romance'];
            foreach ($genres as $g) {
                $sel = ($row['genre'] == $g) ? "selected" : "";
                echo "<option value='$g' $sel>$g</option>";
            }
            ?>
        </select><br>
        <label>Description:</label><textarea name="description"><?= $row['description'] ?></textarea><br>
        <label>Best Seller:</label>
        <input type="radio" name="best_seller" value="Yes" <?= ($row['best_seller'] == 'Yes') ? "checked" : "" ?>> Yes
        <input type="radio" name="best_seller" value="No" <?= ($row['best_seller'] == 'No') ? "checked" : "" ?>> No<br>
        <input type="submit" value="Update Book">
    </form>
</div>