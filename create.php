<?php
  session_start();
  if(empty($_SESSION['name']))
  {
    header('location: index.php');
  }
  // echo $_SESSION['name'] . "\n";
  // echo $_SESSION['id'];
  include('new_ticket.php');

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
  <script src="jquery-3.3.1.min.js"></script>
  <script src="js/create.js"></script>



</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="img/logo.jpg"/></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="create.html">Create</a></li>
          <li><a href="#">Modify</a></li>
        </ul>
      </li>
      <li><a href="services.html">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">About Us</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
          </ul>
        </li>
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
      <h1>Create a ticket</h1>

      <form class="signupform" method="post" action="create.php">
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" id="category">
            <option value="" style="font-style: italic" selected disabled hidden>Please choose a category</option>
            <option value="communications">Communications</option>
            <option value="resturants">Resturants</option>
            <option value="banks">Banks</option>
          </select>
        </div>

        <div class="form-group">
          <label for="company">Company</label>
          <select class="form-control" id="company" name="company" disabled="true">
          </select>
        </div>

<!--         <div class="form-group">
          <label for="location">Your location</label>
          <span style="font-style: italic">Google Maps [later1111]</span>
        </div> -->

        <div class="form-group">
          <label for="branch">Branch</label>
          <select class="form-control" id="branch" name="branch" disabled="true">
          </select>
        </div>

        <div class="form-group">
          <label for="service">Service</label>
          <select class="form-control" id="service" name="service" disabled="true">
          </select>
        </div>



        <div class="form-group">
          <button type="button" class="btn btn-info btn-md" id="show-info">Show information</button>
        </div>



        <div class="form-group" id="info">

        </div>


      <button type="submit" class="btn btn-default btn-lg btn-register" id="submit" name="submit">Confirm</button>
      </form>

    </div>
  </div>
</div>

</body>
</html>