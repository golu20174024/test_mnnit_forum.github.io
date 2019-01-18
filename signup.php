<?php
include 'dbh.php';
$name=$_POST['name'];
$Username=$_POST['Username'];
$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE user_name=".$Username."";
$res=mysqli_query($conn,$query);
$data=mysqli_num_rows($res);
if($data>0){
    echo "user name already exist";
}
else{
$sql="INSERT INTO users(name, user_name, email, user_pwd)
VALUES('$name', '$Username', '$email','$password')";
$result=$conn->query($sql); 
header("Location:index.php");}