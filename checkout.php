<?php
    session_start();

    require("mysqli_connect.php");
    $booktitle = $_SESSION['title'];
    $bookprice = $_SESSION['price'];
    
    $query_book = "SELECT * FROM bookstoredata.bookstorecreator WHERE 
            title='$booktitle' AND price='$bookprice'";
    $result1 = @mysqli_query($dbc, $query_book);
    while($rows = mysqli_fetch_array($result1)){
      $book_id = $rows['book_id'];
    }
    
    
    // $query_inventory = "SELECT * FROM bookstoredata.bookstorecreator WHERE book_id='$book_id'";
    // $result2 = @mysqli_query($dbc, $query_inventory);
    // while($rows = mysqli_fetch_array($result2)){
    //   $quantity_available = $rows['quantity_available'];
    // }
    // $remaining_quantity = $quantity_available-$quantity;
    // mysqli_close($dbc); 
    
?>
<html>
<div>
              <h6 class="my-0"><?php echo $_SESSION['title']?></h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$</span><span class="text-muted" id="price"><?php echo $_SESSION["price"]?></span>
</html>