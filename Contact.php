<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_GET['Logout']))
{

$_SESSION['useridAdmin']= "";
$_SESSION['usernameAdmin']= "";
$_SESSION['useridStudent']= "";
$_SESSION['usernameStudent']= "";

unset($_SESSION['useridAdmin']);
unset($_SESSION['usernameAdmin']);
unset($_SESSION['useridStudent']);
unset($_SESSION['usernameStudent']);
}
elseif(isset($_SESSION['useridAdmin']) and isset($_SESSION['usernameAdmin']))
{
		header("Location:Main.php");
}
elseif(isset($_SESSION['useridStudent']) and isset($_SESSION['usernameStudent']))
{
		header("Location:MainStudent.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}

.box {
    padding: 40px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
    margin-top: 100px
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box .text-muted{
    color: white;
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}


    </style>
	
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style type="text/css">
    .bs-example {
      margin: 0px;

    }
    .bg-dark {
    background-color: #212529!important;
}
    .navbar-brand {
      font-size: 20px;
      font-family: sans-serif;

    }
  </style>
  
  </head>
  <body>
<?php
include("Header.php");
?>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
		
 <form class="box" role="form" action="Main.php" method="post">
                     <h1>Contact Us</h1>
                     <p class="text-muted"> Contact Us Information</p>

 <center>
    <h3 class='alert alert-success' style="margin-bottom:0px;">Contact Us !</h3>
  </center>
  <div class="jumbotron" style="margin-bottom: 0px;margin-top: 0px;">
    
    <p class="lead">
	Contact Details-
	</p>
    <hr class="my-4">
 
  </div>
  

                </form>
      
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
    /*---------------------------------------
   Social section
-----------------------------------------*/
    footer {
      padding: 0px 0px 0px 0px;
      background-color: #212529;
      margin: 0px;
    }

    .fa {
      padding: 20px;
      font-size: 23px;
      width: 60px;
      text-align: center;
      text-decoration: none;
      margin: 5px 2px;
      border-radius: 50%;
    }

    .fa:hover {
      opacity: 0.5;
      text-decoration: none;
    }



    p {
      text-align: center;

    }
  </style>
</head>

<footer>

  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div style="color:#ffffff;" class="wow fadeInUp footer-copyright">
          <p>Made in India <br>DYPCET STUDENT'S<br>
            Copyright &copy; 2022 </p><br>
        </div>
      </div>
    </div>
  </div>
</footer>

  </body>
</html>
