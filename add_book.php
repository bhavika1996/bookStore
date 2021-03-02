<html>
<head>
</head>
<body>
<?php

require('mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$title = '';
$type= '';
$price= '';
$year='';
$pages='';
$quantity='';

if(empty($_POST['title'])){
    $errorArray[] = "Title of the book is mandatory";
    $errors = true;
}else{
    $title = mysqli_real_escape_string($dbc,$_POST['title']);
}

if(empty($_POST['type'])){
    $errorArray[] = "Type of book is mandatory";
    $errors = true;
}else{
    $type = mysqli_real_escape_string($dbc,$_POST['type']);
}

if(empty($_POST['price'])){
    $errorArray[] = "Price is mandatory";
    $errors = true;
}else{

    $price = mysqli_real_escape_string($dbc,$_POST['price']);
}

if(empty($_POST['year'])){
    $errorArray[] = "Year of publishing is mandatory";
    $errors = true;
}else{

    $year = mysqli_real_escape_string($dbc,$_POST['year']);
}
if(empty($_POST['pages'])){
    $errorArray[] = "Pages is mandatory";
    $errors = true;
}else{

    $pages = mysqli_real_escape_string($dbc,$_POST['pages']);
}
if(empty($_POST['quantity'])){
    $errorArray[] = "Quantity is mandatory";
    $errors = true;
}else{

    $quantity = mysqli_real_escape_string($dbc,$_POST['quantity']);
}

// echo $username.$email.$phone;
if($errors = false && count($errorArray)>2){
    echo "All fields mandatory";
}{
    $query = "INSERT INTO `bookstoredata`.`bookstorecreator`(title,book_type,price,publishing_year,pages,quantity_available) values('{$title}','{$type}','{$price}','{$year}','{$pages}','{$quantity}')";
    if(mysqli_query($dbc,$query)){
        echo "</br>Record added";
        echo "</br>";
    }else{
        echo "SQL: ".$query . "Error:". mysqli_error($dbc);
    }
    mysqli_close($dbc);
}
}
?>
<span><a href="index.php">Home</a></span>
<form action="add_book.php" method="post">
<p> Title: <input type="text" name="title"></p>
<p> Book Type: <input type="text" name="type"></p>
<p> Price: <input type="text" name="price"></p>
<p> Year of Publishing: <input type="text" name="year"></p>
<p> Pages: <input type="text" name="pages"></p>
<p> Quantity Available: <input type="text" name="quantity"></p>
<p><input type="submit" name="submit" value="Submit"></p>

</form>
</body>
</html>