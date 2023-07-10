$edit="UPDATE $br SET `BOOK`='".$_POST["bk"]."',`AUTHOR`='".$_POST["au"]."',`PUBLISHERS`='". $_POST["pb"]."',`stock`='".$_POST["st"]."' WHERE sno='".$_GET["id"]."'";
     $wladd = mysqli_query($connect, $edit);
     if($wladd)
     {








          $sql = "UPDATE ".$br." SET stock='".$_POST["st"]."' WHERE sno=".$_GET["id"];
          if(mysqli_query($connect,$sql))
          {
               echo '<script>alert("Book Modified Successfully")</script>';
          }