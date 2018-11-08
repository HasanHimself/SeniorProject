<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpw = "";
    $dbname = "senior_project";

    $db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
	$selectedCompany = mysqli_real_escape_string($db, $_GET['choice']);
	$query = "SELECT * FROM branch WHERE companyName = '$selectedCompany'";
	$result = mysqli_query($db, $query);
	echo "<option value=''>Please choose a branch</option>";
	while($row = mysqli_fetch_array($result)) {
		printf("<option value=%s>%s</option>", $row{'id'}, $row{'address'});
		}

?>