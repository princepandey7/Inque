<?php
ob_start();
require_once("db.php");

if(!empty($_POST))
{
	$name    	= 	filter_var($_POST['form_value']["name"], FILTER_SANITIZE_STRING);
	$emailId   	= 	filter_var($_POST['form_value']["email"], FILTER_SANITIZE_EMAIL);
	$phone 		= 	filter_var($_POST['form_value']["mobile"], FILTER_SANITIZE_NUMBER_INT);
	$city       = 	filter_var($_POST['form_value']["city"], FILTER_SANITIZE_STRING);
	$message    = 	filter_var($_POST['form_value']["message"], FILTER_SANITIZE_STRING);
	$frmStatus 	= 	$_POST['form_status'] 

	$insetQuery = 
			array(
				'name'		=>$name,
				'email'		=>$emailId,
				'phone'		=>$phone,
				'city'		=>$city,
				'message'	=>$message
				'sended_by'	=>$frmStatus
			);

	$connection->InsertQuery("contactus",$insetQuery);

	$to = "contact@m9creative.com";
	$subject = "Contact Form";
	if( $frmStatus == 'enquiry'){
		$subject = 'Enquiry Form'
	}


	$message = " <html>
	<head>
		<title>". $subject ."</title>
	</head>
	<body>
		<p>Hi Admin, <br/> Below are ". $subject ." details send by website user. </p>
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
		<p> Thanks </p>
	</body>
	</html>";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	mail($to,$subject,$message,$headers);

###################################################
				// USER MAIL //
###################################################

	$toUser = $emailId;

	$Usermessage = " <html>
	<head>
		<title>". $subject ."</title>
	</head>
	<body>
		<p>Hi ". $name .", <br/></p>
		
		<p> Thank you for taking the time to go through our website.</p>
		<p> We will get in touch soon.</p>
		<br/>
		<p>Regards, <br/> Team Inque.</p>
	</body>
	</html>";
	$Userheaders = "MIME-Version: 1.0" . "\r\n";
	$Userheaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	mail($toUser,$subject,$Usermessage,$Userheaders);

	echo "success";
}
else
{
	echo "error";
}
?>