<html>
    <head>
    </head>
<body>
<span><a href="login.php">HOME &nbsp</a>
<span><a href="add_book.php">Add Book &nbsp</a>
<!-- <span><a href="login.php">Logout &nbsp</a></span> -->
<div>
<table border=1>
    <tr>
        <th>BookId</th>
        <th>Title</th>
        <th>Author</th>
        <th>Book Type</th>
        <th>Price</th>
        <th>Publishing Year</th>
        <th>Number of Pages</th>
        <th>Quantity Available</th>
    </tr>
    <?php
    require("mysqli_connect.php");  

    $query = "SELECT * FROM bookstorecreator bs LEFT JOIN author a ON bs.book_id = a.book_id";
    $result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));

        while($rows = mysqli_fetch_array($result)){
        // $imgPath = 'uploads/' .  $rows['username'] . '/' . $rows['image'];
        // $img = '<img width="100px" height="100px" src="' . $imgPath . '">';
            echo "<tr>";
            echo "<td>{$rows['book_id']} </td>";
            echo "<td>{$rows['title']} </td>";
            echo "<td>{$rows['author_name']}</td>";
            echo "<td>{$rows['book_type']} </td>";
            echo "<td>{$rows['price']} </td>";
            echo "<td>{$rows['publishing_year']} </td>";
            echo "<td>{$rows['pages']} </td>";
            echo "<td>{$rows['quantity_available']} </td>";
            // echo '<td>'.  $img . ' </td>';
            echo "</tr>";
  }
?>
</table>
</body>
</html>