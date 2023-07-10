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
    <div class="title">
    <center><h1>WISHLIST</h1></center>
    </div>
    <?php
    session_start();  
    if(isset($_SESSION['sess_user'])) {
        $pin = $_SESSION['sess_user'];
        }
    $connect = mysqli_connect("localhost", "root", "", "books");
    $query = "SELECT * FROM wishlist WHERE pin='".$pin."'";  
    $result = mysqli_query($connect, $query);   
    if(mysqli_num_rows($result) > 0)  
                {  ?>
                    <div class="table">
                    <table style=" margin-top: 60px;margin-left: 300px;border-radius: 10px;border-color: #0a0a0a;" border ="3" cellspacing="0" cellpadding="10" >
                      <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Status</th>
                        <th></th>
                      </tr><?php
                     while($row = mysqli_fetch_array($result))  
                     {   
                        ?>  
                        <div class="col-md-4">  
                             <form method="post" action="wishlist.php?action=add&id=<?php echo $row["sno"]; ?>">    
                             <tr>
           <td><?php echo $row['book']; ?> </td>
           <td><?php echo $row['author']; ?> </td>
           <td><?php echo $row['publisher']; ?> </td>
           <td><?php 
           if( $row['count']>0){ ?>
               <div class="statusA">Available</div>
               <?php } 
               else{ ?>
                 <div class="statusO">OutOf Stock</div>
             <?php } ?></div></td>
                                       <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Remove" /><td>
                                       <input type="hidden" name="hidden_bk" value="<?php echo $row["book"]; ?>" />
                                       <input type="hidden" name="hidden_au" value="<?php echo $row["author"]; ?>" />
                                       <input type="hidden" name="hidden_pb" value="<?php echo $row["publisher"]; ?>" />  
                                       <input type="hidden" name="hidden_st" value="<?php echo $row["count"]; ?>" />  
                                  </div>  
                             </form>  
                        </div></br>  
                        <?php  
                             }  
                        }  
                        else{
                            ?>
                            <h4 style="margin-left:500px; margin-top:100px;">There Are No Books Added To Your Wishlist....</h4>
                            <?php
                        }
        if(isset($_POST['add_to_cart']))
        {
            if(isset($_SESSION["shopping_cart"]))  
            {  
                $rem="DELETE FROM wishlist WHERE pin='".$pin."' AND book='".$_POST["hidden_bk"]."'";
                $wlrem = mysqli_query($connect, $rem);
                if($wlrem)
                {
                    ?><script>alert("Item Removed")</script>;
                    <meta http-equiv="refresh" content="0;URL='wishlist.php'"><?php
                }
            }

        }
    ?>
    <!-- Logging Out -->
    <script type="text/javascript">
          document. getElementById("exit"). onclick = function () {
          location. href = "logout.php";
          };
          </script>
          </body>
</html>