

<?php 
 session_start();
require("mysqli_connect.php");
$username = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = mysqli_real_escape_string($dbc,$_POST['username']);
    $password = mysqli_real_escape_string($dbc,$_POST['password']);
    $password= md5($password);
   
    $stmt = $dbc->prepare("select * from account where username = ? and password = ?");

      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      
      if($result = $stmt->get_result()){

        $row = $result->fetch_assoc();
        if($row['password'] == $password){
          $_SESSION['login'] = $username;
          $_SESSION['username'] = $row['username'];
          header("Location: index.php");
        }        
      }
      else{
        echo "Error";
      }
    }
    else{

    }
    $dbc
//     $q = "SELECT username, password from account where username='{$username}' AND password='{$password}'";
// 	$r = mysqli_query($dbc,$q);

//     if(mysqli_num_rows($r)>0){
//         session_start();
//         $_SESSION["login"] = true;
//         header("Location: index.php");
//     }else{
//         echo "Invalid login information"; 
//     }
// }else {
//     echo "error";
// }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="login.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username"required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>      
    </form>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
</div>
</body>
</html>