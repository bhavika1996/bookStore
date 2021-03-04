<?php
<<<<<<< HEAD
    //session_start();
    require("mysqli_connect.php");
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $bookid = $_POST['bookId'];
            $username = $_POST['firstname'] . $_POST['lastname'];
            $quantity = $_POST['quantity'];
            $remaining_quantity = 0;   

            $updateQuery = "update bookstorecreator set quantity_available = quantity_available - {$quantity} where book_id = {$bookid}";

            if(mysqli_query($dbc, $updateQuery)) 
            {
                $qry = "insert into bookstoredata.order values (0, '$username', $bookid)";

                if(mysqli_query($dbc, $qry)) 
                {
                    echo "Order placed <br/> <a href='index.php'>Click here for Home </a>";
                }
                else
                {
                    echo "Error in Insert" . '<br>' .  mysqli_error($dbc);
                    echo "Error Occured!";
                    echo "<a href='index1.php'>Click here for Home </a>";
                }
            }
            else
            {
                echo mysqli_error($dbc);
                echo "Error in update" . '<br>' .  "Error Occured!";
                echo "<a href='index1.php'>Click here for Home </a>";
            }
    
        }

    //$dbc->close();
=======
    session_start();
    require("mysqli_connect.php");
    
    if(isset($_SESSION['login'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $bookid = $_SESSION['link'];
            $username = $_SESSION['username'];
            $quantity = $_POST['quantity'];
            $remaining_quantity = 0;   
            
            $stmt = $dbc->prepare("select * from bookstorecreator where book_id = $bookid");
                      
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $booktitle = $rows['title'];
                    $remaining_quantity = $rows['quantity_available'];
                }
            }    
    
            $stmt = $dbc->prepare("UPDATE bookstorecreator set quantity_available = ? where book_id = ?");
            
            
            $stmt->bind_param("ss", $remaining_quantity, $bookid);
            
            $stmt->execute();
            $remaining_quantity = $remaining_quantity - $quantity;


            $stmt = $dbc->prepare("INSERT into order(username, book_id) values(?,?)");
            $stmt->bind_param("si", $username, $bookid);
    
            if($stmt->execute()){
                $success = "Order Successfully placed";
            }
        }
    }
    else{
        header("Location: index.php");
    }

    $dbc->close();
>>>>>>> 4270940c30ba7bcb98a4bf82dc7e59c9fcdd8ffd
?>
