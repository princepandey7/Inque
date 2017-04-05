<?php
ob_start();
require_once("db.php");

if(!empty($_POST))
{
	$name    	= 	filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$emailId   	= 	filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$phone 		= 	filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);
	$city       = 	filter_var($_POST["city"], FILTER_SANITIZE_STRING);
	$message    = 	filter_var($_POST["message"], FILTER_SANITIZE_STRING);

	$insetQuery = 
			array(
				'name'		=>$name,
				'email'		=>$emailId,
				'phone'		=>$phone,
				'city'		=>$city,
				'message'	=>$message
			);

	$connection->InsertQuery("contactus",$insetQuery);

	$to = "contact@m9creative.com";
	$subject = "User contact details";

	$message = " <html>
	<head>
		<title>Contact Details</title>
	</head>
	<body>
		<p>Hi Sir, <br/> Below are contact details send by user. </p>
		<table>
			<tr>
				<td>Name :</td> <td>".$name."</td>
			</tr>
			<tr>
				<td>Email :</td> <td>".$emailId."</td>
			</tr>
			<tr>
				<td>Contact No :</td> <td>".$phone."</td>
			</tr>
			<tr>
				<td>Message :</td> <td>".$message."</td>
			</tr>
		</table>
	</body>
	</html>
	";


	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	mail($to,$subject,$message,$headers);
	echo "success";
}
else
{
	echo "error";
}
?>