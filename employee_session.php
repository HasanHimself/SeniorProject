<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpw = "";
	$dbname = "senior_project";

	$db = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
	$errors = array();
	$error = false;

	if(isset($_POST['submit']))
	{
		if(empty($_POST['email']))
		{
			array_push($errors, "Email can't be left blank");
		}
		if(empty($_POST['password']))
		{
			array_push($errors, "Password can't be left blank");
		}
		foreach($errors as $error)
		{
			echo $error;
		}
		if(count($errors) == 0)
		{
			$email = clean_input($_POST['email']);
			$email = strtolower($email);
			$password = clean_input($_POST['password']);
			$password = md5($password);
			$query = "SELECT id, first_name, branchId FROM employee WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($db, $query);
			$num_rows = mysqli_num_rows($result);
			if($num_rows > 0)
			{
				$records = mysqli_fetch_assoc($result);
				$_SESSION['idEmployee'] = $records['id'];
				$_SESSION['name'] = $records['first_name'];
				$_SESSION['branchId'] = $records['branchId'];
				
				header('location: /proj');
			}
			else
			{
				array_push($errors, 'Invalid email and password');
				$error = true;
			}
		}
	}

	function clean_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>