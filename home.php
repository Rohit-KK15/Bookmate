<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css" >
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
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <a href="home.php" class="nav-link home">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link search" href="search.php">SEARCH</a>
        </li>
        <li class="nav-item">
            <a href="wishlist.php" class="nav-link wl">WISHLIST</a>
        </li>
        <li class="nav-item">
            <a class="nav-link logout" id="exit" href="#">LOGOUT</a>
        </li>
    </ul>
    <!-- Logging Out -->
    <script type="text/javascript">
          document. getElementById("exit"). onclick = function () {
          location. href = "logout.php";
          };
          </script>
          
    <div class="span9">
        <center>
               
               <div class="card"> 
                <img class="card-img-top" src="profile.png" alt="Card image cap">
                <div class="card-body2">

                <?php
                session_start();
                if(isset($_SESSION['sess_user'])) {
                $pin = $_SESSION['sess_user'];
                }
                $con = mysqli_connect('localhost', 'root', '','users');
                $sql="select * from users where pin='".$pin."'";
                $result=$con->query($sql);
                $row=$result->fetch_assoc();

                $name=$row['firstname'];
                $branch=$row['branch'];
                $email=$row['email'];
                $pin=$row['pin'];
                ?>    
                    <i>
                    <h1 class="card-title"><center><?php echo $name ?></center></h1>
                    
                    <p><b>Pin No : </B><?php echo $pin ?></p>
                    
                    <p><b>Branch : </b><?php echo $branch ?></p>

                    <p><b>Email ID : </b><?php echo $email ?></p>
                    </b>
                </i>

                </div>
            </div>
            <br>
            </center>              	
    </div>