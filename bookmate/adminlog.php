<?php

if(!empty($_POST['email']) && !empty($_POST['password'])) {  
    $email=$_POST['email'];  
    $password=$_POST['password'];  
  

$con = mysqli_connect('localhost', 'root', '','users');
$query=mysqli_query($con,"SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");  
$numrows=mysqli_num_rows($query);  
if($numrows!=0)  
{  
while($row=mysqli_fetch_assoc($query))  
{  
$dbemail=$row['email'];  
$dbpassword=$row['password'];  
}  

if($dbemail == $email && $dbpassword == $password)  
{   
session_start(); 
$_SESSION['sess_admin']=$email; 

/* Redirect browser */  
header("Location: adminhome.php"); 

}  
} else {  
  ?> <script type="text/javascript">
  alert("Invalid Pin or Password");
  </script>
   <?php 
}  
}?>