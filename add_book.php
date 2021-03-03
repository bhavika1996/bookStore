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
        header("Location: index1.php");
    }else{
        echo "SQL: ".$query . "Error:". mysqli_error($dbc);
    }
    mysqli_close($dbc);
}
session_start();
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['price'] = $_POST['price'];
}
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Book</h2>
  <form class="form-horizontal" action="add_book.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="title" class="form-control" id="title" placeholder="Enter title" name="title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="type">Type of Book:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="type" placeholder="Frictional,Motivational" name="type">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="year">Year Of Publishing:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="year" placeholder="XXXX-XX-XX" name="year">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pages">Pages:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pages" placeholder="Pages" name="pages">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="quantity">Quantity:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
