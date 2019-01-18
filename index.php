<?php
session_start();
include("dbh.php");
if(isset($_SESSION['username'])){
	header('Location:welcome1.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Login Form</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="loginBox">
			<img src="user.png" class="user">
			<h2>Log In Here</h2>
			<form action="" method="POST">
				<p>User Name</p>
				<input type="text" name="username" placeholder="User_name">
				<p>Password</p>
				<input type="password" name="password" placeholder="password">
				<input type="submit" name="submit" value="Sign In">
				<a href="registration.html">Don't have an account?</a>
			</form>
		</div>
	</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$user=$_POST['username'];
	$pwd=$_POST['password'];
	$query="SELECT * FROM users WHERE user_name='$user' && user_pwd='$pwd'";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
	if($total==1){
          $_SESSION['username']=$user;
          header('Location:welcome1.php');
	}
	else{
		echo "wrong entry";
	} 
}
?>
