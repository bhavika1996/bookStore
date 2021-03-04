<?php
    session_start();
    require("mysqli_connect.php");
    
    $html = "";

    if(isset($_SESSION['login'])){
        $book_id = $_SESSION['link'];

        $title = "";
        $bookquantity_available="";
        $stmt = $dbc->prepare("select title,quantity_available from bookstorecreator where book_id = $book_id");
               
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $title = $row["title"];
                $bookquantity_available = $row["quantity_available"];
            }
        }
        else{
            echo "0 entries";
        }
    }
    else{
        header("Location: index.php");
    }

    $dbc->close();
?>

<html>
    <head>
        <title>Book Inventory</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>        
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
        <div class="card mx-auto" style="width: 25rem; margin-top: 40px; margin-bottom: 40px;">	  
            <div class="card-body">
                <p class="card-text">
                    <form action="payment.php" method="POST">

                            <label for="Book ID">Book ID:</label>
                            <input type="text" class="form-control" name="bookid" value="<?php echo $book_id; ?>" placeholder="Book ID" disabled required/>
                                
                        <br>                            
                                                        
                            <label for="Book Name">Book Name:</label>
                            <input type="text" class="form-control" name="bookname" value="<?php echo $title; ?>" placeholder="Book Name" disabled required/>
                            
                        <br>                                                        
                                                        
                            <label for="Quantity">Quantity:</label>
                            <input type="number" min="1" max="<?php echo $bookquantity_available; ?>" class="form-control" name="quantity" placeholder="Total Quantity" required/>
                            
                        <br>
                            
                            <label for="Name on Card">Name on Card:</label>
                            <input type="text" class="form-control" name="namecard" placeholder="Name on Card" required/>
                            
                        <br>
                            
                            <label for="expirydate">Expiry Date:</label>
                            <input type="text" class="form-control" name="expirydate" placeholder="Expiry Date" required/>
                            
                        <br>
                            
                            <label for="Name on Card">CVV:</label>
                            <input type="text" class="form-control" maxlength="3" name="namecard" placeholder="CVV" required/>
                            
                        <br>
                            
                            <label for="Name on Card">Postal:</label>
                            <input type="text" class="form-control" name="namecard" placeholder="Postal" required/>
                            
                        <br>

                        <button class="btn btn-primary" name="submit" value="submit">Checkout</button>
                    </form>	

                </p>		    	
            </div>
        </div>
    </body>
</html