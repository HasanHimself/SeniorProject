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
  <script>
    function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
	var modif = "AM";
    m = checkTime(m);
    s = checkTime(s);
	if(h > 12) 
	{
		h = h - 12;
		modif = "PM"
	}
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s + " " + modif;
    var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
    }
</script>
</head>
<body onload="startTime()">
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
    	<li><a href="signup.php">Sign Up</a></li>
      <li class="dropdown">
	  <li><a href="login.php">Login</a></li>
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

  <div class="col-lg-8">
      <h1>Are you tired of waiting in queues?</h1>
      <p>Queue Waiting is a web application for ordering tickets online. By ordering a ticket through our platform, you're spared plenty of waiting time. Simply choose one of the many services available on our website and see how much the estimated time left for your ticket is and go get your order. It is simple, user-friendly and free!</p>

    <div class="row top-buffer">
      <div class="col-md-4">
        <div class="main-steps"><img src="img/step1.png" class="center"/>Choose a service</div>
      </div>
      <div class="col-md-4">
        <div class="main-steps"><img src="img/step2.png" class="center"/>Order a ticket</div>
      </div>
      <div class="col-md-4">
        <div class="main-steps"><img src="img/step3.png" class="center"/>Use the ticket to get your order when it's time</div>
      </div>
    </div>

    <a href="signup.html" class="btn btn-default btn-lg btn-register" role="button">Register now</a>
  </div>

<div class="col-lg-4 footer-col">
  <footer class="ticket-status">You currently don't have an active ticket!</footer>
  <div id="clock" class="clock-display"></div>
</div>
</div>

</div>


</body>
</html>
