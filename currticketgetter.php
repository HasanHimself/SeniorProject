<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpw = "";
    $dbname = "senior_project";

    $db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);

    $selectedService = mysqli_real_escape_string($db, $_GET['service']);
    $query = "SELECT currentTicket FROM parameters WHERE serviceId = '$selectedService'";
    $result = mysqli_query($db, $query);
    $currentTicket = mysqli_fetch_assoc($result)['currentTicket'];
    echo "Current ticket: " . $currentTicket;
?>