<?php

$con = mysqli_connect('localhost', 'root', '','users');

// get the post records
$name = $_POST['name'];
$branch = $_POST['branch'];
$pin = $_POST['pin'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2=$_POST['password2'];

if($password==$password2)
{

// database insert SQL code
$sql = "INSERT INTO `users` (`firstname`, `branch`, `pin`, `email`, `password`) VALUES ( '$name', '$branch', '$pin', '$email','$password')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
     echo '<script>alert("Registerd Successfully")</script>';
     header("Location: launch.php");
}

}
else{
     echo '<script>alert("Passwords donot Match")</script>';
     header("Location: signup.php");

}
?>