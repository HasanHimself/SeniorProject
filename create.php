<?php
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpw = "";
  $dbname = "senior_project";

  $db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
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


<!-- <script>
      $(document).ready(function() {
            $("#categories").change(function() {
            alert("kkk");
    });

      });
    
</script> -->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Queue Waiting</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Create</a></li>
          <li><a href="#">Modify</a></li>
        </ul>
      </li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">About Us</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Login</a></li>
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

      <form action="#" class="signupform">
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
          <select class="form-control" id="company">
          </select>
        </div>

        <div class="form-group">
          <label for="location">Your location</label>
          <span style="font-style: italic">Google Maps [later1111]</span>
        </div>

        <div class="form-group">
          <label for="branch">Branch</label>
          <select class="form-control" id="branch">
            <option>Hira St., al-Nahdah</option>
            <option>Taibah District</option>
            <option>etcetc</option>
          </select>
        </div>

        <div class="form-group">
          <label for="service">Service</label>
          <select class="form-control" id="service">
            <option>Support</option>
            <option>Issuing SIM</option>
          </select>
        </div>



        <div class="form-group">
          <footer>Current ticket: 12</footer>
          <footer>Last issued ticket: 21</footer>
        </div>

        <button type="submit" class="btn btn-default btn-lg btn-register">Confirm</button>
      </form>

    </div>
  </div>
</div>

</body>
</html>