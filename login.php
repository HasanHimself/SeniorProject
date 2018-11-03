<?php
  session_start();
  if(isset($_SESSION['name']))
  {
    header('location: /proj');
  }
  include('login_user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Queue Waiting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Queue Waiting</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/proj"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="proj/create.php">Create</a></li>
          <li><a href="#">Modify</a></li>
        </ul>
      </li>
      <li><a href="proj/services.html">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">About Us</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
    	<li><a href="proj/signup.php">Sign Up</a></li>
      	<li class="active"><a href="#">Login</a></li>
    </ul>

    <form class="navbar-form navbar-right" action="/results.php">
    	<div class="form-group">
    		<input type="text" class="form-control" placeholder="Search">
    	</div>
    	<button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1>User login</h1>
      <footer style="color: grey; font-style: italic;">All fields are required</footer>

      <form method="post" action="login.php" class="signupform">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" placeholder="Enter your e-mail"required/>
        </div>

        <div class="form-group">
          <label for="phone">Password:</label>
          <input type="password" name="password" class="form-control" placeholder="Enter your password" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-default btn-lg btn-register">Submit</button>
      </form>
    </div>
  </div>
</div>
  

</body>
</html>
