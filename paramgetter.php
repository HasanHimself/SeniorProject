<?php
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpw = "";
    $dbname = "senior_project";

    $db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
    $selectedService = mysqli_real_escape_string($db, $_GET['service']);
    $query = "SELECT * FROM parameters WHERE serviceId = '$selectedService'";
    $result = mysqli_query($db, $query);
    $columns = mysqli_fetch_assoc($result);
    $ticketNum = $columns['lastTicket'] + 1;
    $currentTicket = $columns['currentTicket'];
    $ticketsInQueue = $ticketNum - $currentTicket;
    $countNum = $columns['countNum'];
    $averageTime = $columns['estimatedTime'];
    $estimatedTime = $ticketsInQueue * $averageTime / $countNum;
    echo "Your ticket number: " . $ticketNum . "\n";
    echo "Estimated time left: " . $estimatedTime . " minutes\n";

?>