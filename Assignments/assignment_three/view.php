<?php include 'db.php'; ?>
<?php include 'navbar.php'; ?>

<link rel="stylesheet" href="style.css">

<h2>All Books</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Description</th>
        <th>Best Seller</th>
        <th>Action</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM books");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['author']}</td>
            <td>{$row['genre']}</td>
            <td>{$row['description']}</td>
            <td>{$row['best_seller']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>