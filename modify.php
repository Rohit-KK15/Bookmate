<?php  
 
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "books"); 
 $con = mysqli_connect("localhost", "root", "", "users"); 
 if(isset($_POST["modify"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
     }  
           else  
           {  
               $edit="UPDATE ".$_POST["hidden_br"]." SET `BOOK`='".$_POST["bk"]."',`AUTHOR`='".$_POST["au"]."',`PUBLISHERS`='".$_POST["pb"]."',`stock`='".$_POST["st"]."' WHERE sno=".$_GET["id"];
          if(mysqli_query($connect,$edit)==true)
          {
               echo '<script>alert("Book Modified Successfully")</script>';
          }
          if($_POST["hidden_st"]<$_POST["st"])
          {
               if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM wishlist WHERE book='".$_POST["bk"]."' AND pin='".$pin."'"))>0)
               {
               $book=$_POST["bk"];
               $recipient="bookmate173@gmail.com"; //Enter your mail address
               $subject="Availability of Book"; //Subject 
               $senderEmail=mysqli_query($con,"SELECT email FROM users WHERE pin='".$pin."'");
               $mailBody="$book book, which is in your wishlist, is now available in your college library. You can now borrow the book.";
               mail($recipient, $subject, $mailBody);
               sleep(1);?>
               <meta http-equiv="refresh" content="0;URL='modify.php'"><?php
               }
          }
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
           <title></title>  
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
            <a class="nav-link search" href="add.php">ADD</a>
        </li>
        <li class="nav-item">
            <a href="modify.php" class="nav-link wl">MODIFY</a>
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
                $connect = mysqli_connect("localhost", "root", "", "books");
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
                        <th>Stock</th>
                        <th></th>
                      </tr><?php 
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                         $s=$row["stock"];
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="modify.php?action=add&id=<?php echo $row["sno"]; ?>">    
                     <tr>
                               <td><input type="text" name="bk" value="<?php echo $row["BOOK"]; ?>" /></td>
                               <td><input type="text" name="au" value="<?php echo $row["AUTHOR"]; ?>" /></td>
                               <td><input type="text" name="pb" value="<?php echo $row["PUBLISHERS"]; ?>" /> </td> 
                               <td><input type="text" name="st" value="<?php echo $row["stock"]; ?>" />  </td>
                               <td><input type="submit" name="modify" style="margin-top:5px;" class="btn btn-success" value="Modify" /><td>
                               <input type="hidden" name="hidden_br" value="<?php echo $br; ?>" />
                               <input type="hidden" name="hidden_st" value="<?php echo $s; ?>" />
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


