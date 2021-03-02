

<?php 
 session_start();
 session_unset();
require("mysqli_connect.php");
$username = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = mysqli_real_escape_string($dbc,$_POST['username']);
    $password = mysqli_real_escape_string($dbc,$_POST['password']);
   
    $q = "SELECT username, password from account where username='{$username}' AND password='{$password}'";
	$r = mysqli_query($dbc,$q);

    if(mysqli_num_rows($r)>0){
        session_start();
        $_SESSION["login"] = true;
        header("Location: index.php");
    }else{
        echo "Invalid login information"; 
    }
}else {
    echo "error";
}
?>
<html>
<body>

<form action="login.php" method="post">

	<fieldset><legend>Please Add Username & Password:</legend>

    <p><label>Username: <input type="text" name="username" size="30" maxlength="50"></label></p>

    <p><label>Password : <input type="text" name="password" size="30" maxlength="50"></label></p>

	<p align="center"><input type="submit" value="Submit" name="submit"></p>
	</fieldset>

</form>

</body>
</html>