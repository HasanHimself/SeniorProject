<!-- TEST Hasan -->
<html lang="en" class="About">  
      
<head>

<title>contact us.html</title>

<style>

.error {color: #FF0000;}
.About{ background: url('pic/About.jpg'); 
background-repeat:no-repeat;
background-position:center top;} 

</style>

<script>

function myFunction() 
{
    alert(" \n Thank You For Contacting Us \n  We Will reply to you soon Through Your E-mail");
}

</script>

</head>


<?php

// define variables and set to empty values

$UserName = $Email = $message = "";
$UserNameErr = $EmailErr = $massageErr = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   if (empty($_POST["UserName"])) {   
     $UserNameErr = "UserName is required";
   } 
   else {
     $UserName = test_input($_POST["UserName"]);

     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$UserName)) {
       $UserNameErr = "Only letters and white space allowed"; 
     }
   }
   
     if (empty($_POST["Email"])) {
     $EmailErr = "Email is required";
   } else {
     $Email = test_input($_POST["Email"]);

     // check if e-mail address is well-formed
     if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
       $EmailErr = "Invalid Email format"; 
     }
   }
    
   if (empty($_POST["message"])) {
     $messageErr = "You did not write a message";
   } else {
     $message = test_input($_POST["message"]);
   }
   
}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
?>
 
<div style="padding-top:340px;" align="center">

 <h1 >About This Project</h1>
<P> This project is a web application designed to be convenient for all citizens, and be able to select a ticket for queuing by date and time from the available services provided by a variety of companies, like men and women salon and spa, mobile services, food chains, etc.
At the same time, it gives the service providers the access to log in to the system and update or modify their services, which will improve its scalability in the future.
 <br/><br/> <br/><br/>
    
<h1 align="center">Who are we?</h1>

    <P> This project was designed and created by : </P>
	
	<table align="center" cellpadding="5cm" cellspacing="10cm">
  	<tr>
	   <td>
      
      <ul><li>

        
		<b>Ahmed Shahata</b>

        <ul><li> Address:  SEU - JEDDAH Branch - Computation and Informatics College
            <li> Mobile :  0555****** 
            <li> Email : <a href="mailto:130078658@seu.edu.sa">s130078658@seu.edu.sa</a>
        </ul> </li> 

        </ul>
      
      <ul><li>

        <b>Hasan M . Gojgar</b>

         <ul> <li>Address:  SEU - JEDDAH Branch - Computation and Informatics College
              <li>Mobile :  0555******
              <li>Email : <a href="mailto:140079912@seu.edu.sa">s140079912@seu.edu.sa</a>
	  </ul></li>
			   
        </ul>
		
      <ul><li>

        <b>Hadi I . Alandanusi</b> 

         <ul> <li>Address:  SEU - JEDDAH Branch - Computation and Informatics College
              <li>Mobile :  0555******
              <li>Email : <a href="mailto:140053305@seu.edu.sa">s140053305@seu.edu.sa</a></li>

         </li>
        </ul>  
      </ul>
     </td> 
	  </tr>
	</table>

<h1 align="center"> Contact us</h1>

<form action="contactus.php" method="POST">
<span class="error">* Required Fields</span>

  
<table border="0">

<tr> 
  <td> Name: </td> 
  <td><input type="text" name="UserName" size="20" value="<?php echo $UserName ;?>"></input></td>
  <td><span class="error">* <?php echo $UserNameErr;?></span></td>
</tr>

<tr> 
  <td> Email: </td>
  <td><input type="text" name="Email" size="20" value="<?php  echo $Email;?>"></input></td>
  <td><span class="error">* <?php echo $EmailErr;?></span></td>
</tr>

<tr> 
  <td> message </td>
  <td><textarea name="message" rows="5" cols="30" style="resize: none; overflow-y: scroll;">
  <?php  echo $message;?></textarea></td>
  <td><span class="error">* <?php echo $massageErr;?></span></td></tr>

<tr> <td></td><td><button onclick="myFunction()">Send</button></td> 
</table>




</form>
<?php
}else{
?><center>
<H1 style="color:red;">Thank you</H1></center>
<?php  
}
?>

</div>
  
  </body>
</html>
