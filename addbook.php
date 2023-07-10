<?php
$con = mysqli_connect('localhost', 'root', '','books');

// get the post records
$book = $_POST['bookname'];
$author = $_POST['au'];
$publis = $_POST['publis'];
$count = $_POST['stock'];
$branch = $_POST['branch'];
// database insert SQL code
$res=mysqli_query($con,"SELECT * FROM ".$branch);
if($res)
{
    $check=mysqli_query($con,"SELECT * FROM ".$branch." WHERE BOOK='".$book."' AND AUTHOR='".$author."' AND PUBLISHERS='".$publis."'");
    if(mysqli_num_rows($check) == 0)
    {
        $sn=mysqli_num_rows($res);
        $sn++;
    $sql = "INSERT INTO `$branch` (sno, BOOK, AUTHOR, PUBLISHERS, stock) VALUES ( '$sn', '$book', '$author', '$publis', '$count')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
   
    echo '<script>alert("Book Added Successfully")</script>';?>
    <meta http-equiv="refresh" content="0;URL='add.php'"><?php
    
}
    }
}
?>