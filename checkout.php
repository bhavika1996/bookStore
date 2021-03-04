<?php
    session_start();

    require("mysqli_connect.php");

    $bookid = $_SESSION['link'];
    
    $query_book = "SELECT * FROM bookstoredata.bookstorecreator WHERE book_id='$bookid'";
    $result1 = @mysqli_query($dbc, $query_book);
    while($rows = mysqli_fetch_array($result1)){
      $book_id = $rows['book_id'];
      $booktitle = $rows['title'];
      $bookprice = $rows['price'];
      $bookquantity_available = $rows['quantity_available'];
    }

    session_destroy();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $quantity= $_POST['quantity'];

    }   
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

<script>

$(document).ready(function(){

  let price = <?php echo $bookprice;  ?>;

  $('#quantity').on('click', function(){

    var quantity = parseInt($('#quantity').val());

    $('#totalPrice').html('$'+price * quantity);
  });
});




</script>
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
<br>
<br>
<form method="post" action="payment.php">
<<<<<<< HEAD
<input type="hidden" name='bookId' value="<?php echo $book_id; ?>"/>
=======
>>>>>>> 4270940c30ba7bcb98a4bf82dc7e59c9fcdd8ffd
<div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"></span></h4>
      <p><a><?php echo $booktitle; ?></a>
      <br>
<<<<<<< HEAD
      <br>Quantity: <span style="align:centre;">
      <input type="number" id="quantity" name="quantity" min="0" max="<?php echo $bookquantity_available; ?>" step="1" value="1"></span>
      <span  class="price">$<?php echo $bookprice; ?></span></p>
      <hr>
      <p>Total <span id="totalPrice" class="price" style="color:black"><b> $<?php echo $bookprice; ?>  </b></span></p>
    
      <div class="form-group">
      <label class="control-label col-sm-2" for="type">Firstname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="type"  name="firstname">
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="type">Lastname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="type" name="lastname">
      </div>

      <p>
        Credit Card: <input type="radio"  value="credit" name="payment">
        Debit Card: <input type="radio"  value="debit" name="payment">
      </p>

      <div class="col-sm-4">
        <button type="submit" class="btn btn-default">Proceed to payment</button>
      </div>

    </div>    
  </div>
</div>  

=======
      <br>Quantity: <span style="align:centre;"><input type="number" id="quantity" name="quantity" min="0" max="<?php echo $bookquantity_available; ?>" step="1" value="1"></span>
      <span  class="price">$<?php echo $bookprice; ?></span></p>
      <hr>
      <p>Total <span id="totalPrice" class="price" style="color:black"><b>
      </b></span></p>
      <div class="col-sm-4">
      <a href="payment.php"><button type="submit" class="btn btn-default">Proceed to payment</button></a>
      </div>
    </div>
  </div>
>>>>>>> 4270940c30ba7bcb98a4bf82dc7e59c9fcdd8ffd
</form>
</body>
</html>