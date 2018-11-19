<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpw = "";
  $dbname = "senior_project";
  $db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);

  if(mysqli_connect_errno())
  {
    printf("Couldn't connect to the database: %s\n", mysqli_connect_error($db));
    exit();
  }

  if(isset($_POST['move-ticket']))
  {
    $serviceId = mysqli_real_escape_string($db, $_POST['service']);
    if($serviceId != "")
    {
      $query = "UPDATE parameters SET currentTicket = currentTicket+1 WHERE serviceId = '$serviceId'";
      mysqli_query($db, $query);
    }
  }
  elseif(isset($_POST['add-ticket']))
  {
    $serviceId = mysqli_real_escape_string($db, $_POST['service']);
    if($serviceId != "")
    {
      $query = "UPDATE parameters SET lastTicket = lastTicket+1 WHERE serviceId = '$serviceId'";
      mysqli_query($db, $query);
    }
  }

?><!DOCTYPE html>
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
  <script>
    $(document).ready(function() {
      $("#service-curr").change(function() {
      serviceVal = $(this).val();
      $currTicket = $("#curr-ticket");
      if(serviceVal != "")
      {
        $("#service-curr option[value='']").remove();
        $currTicket.load("currticketgetter.php?service=" + serviceVal);
        header('location: /');
      }
    });

      $("#service-last").change(function() {
      serviceVal = $(this).val();
      $lastTicket = $("#last-ticket");
      if(serviceVal != "")
      {
        $("#service-last option[value='']").remove();
        $lastTicket.load("lastticketgetter.php?service=" + serviceVal);
        header('location: /');
      }
    });
    });

  </script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      </li>
      <li><a href="services.html">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">About Us</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
	    <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['name'];?><span class="caret"></span></a>
	        <ul class="dropdown-menu">
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
      <h1>Move current ticket</h1>
      <form class="signupform" method="post" action="index_employee.php">

        <div class="form-group">
          <label for="service">Service</label>
          <select class="form-control" id="service-curr" name="service">
            <option value="">Choose a service</option>
            <?php
              $branchId = $_SESSION['branchId'];
              $query = "SELECT id, name FROM service WHERE branchId = '$branchId'";
              $result = mysqli_query($db, $query);
              while($row = mysqli_fetch_array($result))
              {
                printf("<option value=%s>%s</option>", $row['id'], $row['name']);
              }
            ?>
          </select>
        </div>

        <p id="curr-ticket">Current ticket:</p>


      <button type="submit" class="btn btn-default btn-lg btn-register" id="submit" name="move-ticket">Add</button>
      </form>
            <h1>Add ticket</h1>
      <form class="signupform" method="post" action="index_employee.php">
        <div class="form-group">
          <label for="service">Service</label>
          <select class="form-control" id="service-last" name="service">
            <option value="">Choose a service</option>
            <?php
              $branchId = $_SESSION['branchId'];
              $query = "SELECT id, name FROM service WHERE branchId = '$branchId'";
              $result = mysqli_query($db, $query);
              while($row = mysqli_fetch_array($result))
              {
                printf("<option value=%s>%s</option>", $row['id'], $row['name']);
              }
            ?>
          </select>
        </div>
          <p id="last-ticket">Last ticket:</p>
          <button type="submit" class="btn btn-default btn-lg btn-register" id="submit" name="add-ticket">Add</button>
          </form>
    </div>

</div>




</body>
</html>
