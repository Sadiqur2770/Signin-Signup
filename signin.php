
<?php
include_once("config.php");

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM reg_user WHERE user_email='$email' and user_pass='$password'";

	$result = mysqli_query($db_connection, $query);
	$rows = mysqli_num_rows($result);

	if ($rows == 1) {
		$_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
       

		header("Location: user_list.php");
	}else {
		echo "error";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Signup System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Log in System</h1>
        <br>
        <?php 
        //Login message from session
        if(isset($_SESSION["login"])){
            echo $_SESSION["login"];
            unset($_SESSION["login"]);
        }
        if(isset($_SESSION["no-login-message"])){
            echo $_SESSION["no-login-message"];
            unset($_SESSION["no-login-message"]);
        }
        ?>
        <br>
        <!-- Login form start -->
        <form action="" method="POST">

            <div class="padding">
            <p > User Name:</p>
            <input type="text" name="username" placeholder="Enter username">
            </div>

            <div class="padding">
            <p>Password:</p>
            <input type="password" name="password" placeholder="Enter password">
            </div>
          
            <input type="submit" name="submit" value="Signin" class="primary-btn">
            <a href="signup.php">Sign up</a>
        </form>
        <!-- Login form end -->
        <br>
    <p class="text-center">Created by - <a href="https://sadiqur2770.github.io/My-Portfolio/">Sadiqur Rahman</a></p>
    </div>
    
</body>
</html>
