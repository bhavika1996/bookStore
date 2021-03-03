<?php
    session_start();
    if(!isset($_SESSION['login'])){
      header("Location: login.php");
    }
    
    if(isset($_GET['link'])){
      $_SESSION['link'] = $_GET['link'];
      header("Location: checkout.php");
    }
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index1.php">Book Inventory</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index1.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_book.php">Add Book</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="login.php">Sign Out</a>
    </span>
  </div>
</nav>
<?php
require("mysqli_connect.php");  

$query = "SELECT * FROM bookstorecreator";
$result = @mysqli_query($dbc, $query) or die(mysqli_error($dbc));
$i = 0;
while($rows = mysqli_fetch_array($result)){
    $i = $i+1;
?>
  <div class='py-4'>
    <div class='container'>
        <div class='col-md-4'>
          <div class='card' style="width:400px">
            <div class='card-body'>            
              <h4 class='card-title'>Book Name: <?php echo $rows['title']; ?></h4>
              <p class='card-text'>Type: <?php echo $rows['book_type']; ?></p>
              <p class='card-text'>Price: <?php echo $rows['price']; ?></p>
              <p class='card-text'>Published Year: <?php echo $rows['publishing_year']; ?></p>
              <p class='card-text'>Number of Pages: <?php echo $rows['pages']; ?></p>
              <p class='card-text'>Quantity: <?php echo $rows['quantity_available']; ?></p>
              <a href="index1.php?link=<?php echo $rows['book_id']; ?>" class='card-link'>Buy Now</a>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>


</body>
</html>