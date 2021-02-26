<?php 

require("mysqli_connect.php");
?>

<html>
<body>
<span><a href="index.php">HOME &nbsp</a></span>
<div>
<table>
<tr>
    <th>BookId</th>
    <th>Title</th>
    <th>Book Type</th>
    <th>Price</th>
    <th>Publishing Year</th>
    <th>Number of Pages</th>
    <th>Quantity Available</th>
</tr>
<!-- <?php
$query = "SELECT * FROM users";
$result = @mysqli_query($dbc, $query);

while($rows = mysqli_fetch_array($result)){
    $imgPath = 'uploads/' .  $rows['username'] . '/' . $rows['image'];
    $img = '<img width="100px" height="100px" src="' . $imgPath . '">';
    echo "<tr>";
    echo "<td>{$rows['username']} </td>";
    echo "<td>{$rows['profile']} </td>";
    echo '<td>'.  $img . ' </td>';
    echo "</tr>";
}

?> -->
</table>
</body>
</html>