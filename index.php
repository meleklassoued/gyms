<?php
session_start();
require('db.php');

$username="";
$errors = array(); 


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");

    }
  }
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>gym management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">
    /* change background each 5sec*/ 
    @keyframes changeBg {

    0%,
    100% {
        background-image: url('images/gym_bg.jpg');
    }

    50% {
        background-image: url('images/image2.jpg');
    }

    75% {
        background-image: url('images/image3.jpg');
    }
 100% {
        background-image: url('images/image1.jpg');
    }
  
}
    .Page_container{
      background:url("images/image1.jpg");
    display:flex;
    flex-direction:column;
    align-items:center;
   justify-content:center;
     width:100vw;
    height:100vh;
   flex-wrap:wrap;
      background-repeat: no-repeat;
      animation: changeBg 20s infinite ease-in-out;
    }

    h1,h2{
     color:#2196f3;
     margin:50px;
    }
	
	hr{
		background-color:white;
	}
  
    .navbar{
      background-color: transparent !important;
      margin-left: 730px !important;
    }
    .container{
     display: flex;
     align-items: center;
     justify-content: center;
     width: 100vw;
    
    }
    .btn{
      margin-left:70px;
      cursor:pointer;
    }
  </style>
  
</head>
<body>
<div class="Page_container">
  <h1>Gym management system Sportif.tn</h1>
  <h2>Login If you are an admin</h2>
  <form class="form " action="" method="post">
	  <input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
	  <input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
	  <button type="submit" class="btn" name="login_user">Login</button>
</form>

</div>


</body>
</html>