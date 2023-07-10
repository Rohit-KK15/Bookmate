<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="add.css" >
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
            <a href="adminhome.php" class="nav-link home">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add.php">ADD</a>
        </li>
        <li class="nav-item">
            <a href="modify.php" class="nav-link wl">MODIFY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link logout" id="exit" href="#">LOGOUT</a>
        </li>
    </ul>
    <h2 class="sub"><b>Dear Admin... Please Enter The Book Details Inorder To Add It..</b></h2>
    <div class="form">
            <form name="adding" class="needs-validation" method="post" action="addbook.php">
            <input type="bookname" name="bookname" id="bookname" placeholder="Enter Book's name">
            <input type="Branch" name="branch" id="branch" placeholder="Enter Branch">
            <input type="Author" name="au" id="au" placeholder="Name Of The Author">
            <input type="Publisher" name="publis" id="publis" placeholder="Enter the Publisher">
            <input type="Count" name="stock" id="stock" placeholder="Number of Books">
            <button class="btnn" type="submit" id="add" name="add" value="add"><a href="#">ADD</a></button>
            </form>
            </div>
    <!-- Logging Out -->
    <script type="text/javascript">
          document. getElementById("exit"). onclick = function () {
          location. href = "logout.php";
          };
          </script>
      </div>
    </body>
    </html>