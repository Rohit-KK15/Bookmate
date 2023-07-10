<?php   
 session_start();  
 if(isset($_SESSION['sess_user'])) {
     $pin = $_SESSION['sess_user'];
     }
 $connect = mysqli_connect("localhost", "root", "", "books");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'book_id'               =>     $_GET["id"],  
                     'book_name'               =>     $_POST["hidden_bk"],  
                     'book_author'          =>     $_POST["hidden_au"],  
                     'book_publis'          =>     $_POST["hidden_pb"],
                     'book_stock'          =>     $_POST["hidden_st"]
                );
                $adding="INSERT INTO `wishlist` (`pin`, `book`, `author`, `publisher`, `count`) VALUES ( '".$pin."', '".$_POST["hidden_bk"]."', '".$_POST["hidden_au"]."', '".$_POST["hidden_pb"]."','".$item_array["book_stock"]."')";
     $wladd = mysqli_query($connect, $adding);
     if($wladd)
     {
          echo '<script>alert("Item Added")</script>';
     }
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
               'book_id'               =>     $_GET["id"],  
                     'book_name'               =>     $_POST["hidden_bk"],  
                     'book_author'          =>     $_POST["hidden_au"],  
                     'book_publis'          =>     $_POST["hidden_pb"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["book_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';    
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>  
           <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
      </head>  
      <body>
           <div class="card-body" style="background-color: rgb(5, 5, 5); text-align: center; height: 60px; font-size: 70px;">
          <h2 style="color:rgb(245, 246, 247); -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: rgb(249, 247, 247); "><b>BOOKMATE</b></h2>
    </div>
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
            <a class="nav-link logout" id="exit" href="logout.php">LOGOUT</a>
        </li>
    </ul> 
    <h3 class="titl" style="margin-left: 570px; margin-top: 70px;">ENTER THE BRANCH...</h3>
     <form action="" method="post" class="search-text" style="margin-left: 600px; margin-top: 10px;">
     <input type="text" name="branch" id="branch" placeholder="cme/ece/general">   
     <input type="submit" name="br"></form><br/><br/>
                <?php  
                if(empty($_POST['branch'])){
                    return null;
                     }
                     else 
                    {
                      
                    $br=$_POST['branch'];
                $query = "SELECT * FROM ".$br." ORDER BY sno ASC";  
                $result = mysqli_query($connect, $query); 
                ?>
                    <div class="table">
                    <table style=" margin-top: 60px;margin-left: 300px;border-radius: 10px;border-color: #0a0a0a;" border ="3" cellspacing="0" cellpadding="10" >
                      <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Status</th>
                        <th></th>
                      </tr><?php 
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="search.php?action=add&id=<?php echo $row["sno"]; ?>">    
                     <tr>
   <td><?php echo $row['BOOK']; ?> </td>
   <td><?php echo $row['AUTHOR']; ?> </td>
   <td><?php echo $row['PUBLISHERS']; ?> </td>
   <td><?php 
   if( $row['stock']>0){ ?>
       <div class="statusA">Available</div>
       <?php } 
       else{ ?>
         <div class="statusO">OutOf Stock</div>
     <?php } ?></div></td>
                               <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add To WishList" /><td>
                               <input type="hidden" name="hidden_bk" value="<?php echo $row["BOOK"]; ?>" />
                               <input type="hidden" name="hidden_au" value="<?php echo $row["AUTHOR"]; ?>" />
                               <input type="hidden" name="hidden_pb" value="<?php echo $row["PUBLISHERS"]; ?>" />  
                               <input type="hidden" name="hidden_st" value="<?php echo $row["stock"]; ?>" />  
                          </div>  
                     </form>  
                </div></br>  
                <?php  
                     }  
                }  
               }
                ?>
                 <script type="text/javascript">
          document. getElementById("exit"). onclick = function () {
          location. href = "logout.php";
          };
          </script>
      </body>  
 </html>