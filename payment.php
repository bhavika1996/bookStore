<?php
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
?>
