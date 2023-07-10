<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css" >
</head>
  <body>
      <div class="backg">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="card-body">
          <h2><b>BOOKMATE</b></h2>
        </div>
        <div class="par">
            <h3>Access your Library</h3>
            <h2><b>Virtually</b></h2>
        </div>
        <div class="form">
            <h2>Login Here</h2><hr/>
            <form name="login" class="needs-validation " method="post" action="">
            <input type="pin" name="pin" id="pin" placeholder="Enter Pin Here">
            <input type="password" name="password" id="password" placeholder="Enter Password Here">
            <button class="btnn" type="submit" id="submit" value="submit"><a href="#">Login</a></button></form>

            <p class="link">Don't have an account<br>
            <a id="reg" href="#">SignUp </a> here</a></p>
            <p class="link">If you are an Admin<br>
            <a id="adm" href="#">Click Here </a> here</a></p>
            </div>
            </div>
        </div>
        <?php

if(!empty($_POST['pin']) && !empty($_POST['password'])) {  
    $pin=$_POST['pin'];  
    $password=$_POST['password'];  
  

$con = mysqli_connect('localhost', 'root', '','users');
$query=mysqli_query($con,"SELECT * FROM users WHERE pin='".$pin."' AND password='".$password."'");  
$numrows=mysqli_num_rows($query);  
if($numrows!=0)  
{  
while($row=mysqli_fetch_assoc($query))  
{  
$dbpin=$row['pin'];  
$dbpassword=$row['password'];  
}  

if($dbpin == $pin && $dbpassword == $password)  
{   
session_start(); 
$_SESSION['sess_user']=$pin; 
echo '<script>alert("Logged-In Successfully")</script>';

/* Redirect browser */  
header("Location: home.php"); 

}  
} else {  
  echo '<script>alert("Invalid Pin or Password")</script>';
}  
}
?>
        <script type="text/javascript">
          document. getElementById("reg"). onclick = function () {
          location. href = "signup.php";
          };
          </script>
          <script type="text/javascript">
          document. getElementById("adm"). onclick = function () {
          location. href = "admin.php";
          };
          </script>
          </div>
</body>
</html>
