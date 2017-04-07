<?php
ob_start();
require_once("db.php");
if(!empty($_POST))
{

	$insetQuery = array();
	$formData = $_POST['form_value'];
	
	if(!empty($formData)){
		foreach ($formData as $key => $value) {
			$strValue = '';
			if( $value['name'] == 'email' ){
				$strValue = filter_var( $value['value'], FILTER_SANITIZE_EMAIL);
			} else if( $value['name'] == 'mobile' ){
				$strValue = filter_var( $value['value'], FILTER_SANITIZE_NUMBER_INT);
			} else {
				$strValue = filter_var( $value['value'], FILTER_SANITIZE_STRING);
			}
			$insetQuery[$value['name']] = $strValue;
		}
	}

	$insetQuery['sended_by'] = $_POST['form_status'] ;
	$connection->InsertQuery("contactus", $insetQuery);
	$to = "contact@m9creative.com";
	$subject = "Contact Form";
	if( $insetQuery['sended_by'] == 'enquiry'){
		$subject = 'Enquiry Form';
	}


	$message = " <html>
	<head>
		<title>". $subject ."</title>
	</head>
	<body>
		<p>Hi Admin, <br/> Below are ". $subject ." details send by website user. </p>
		<table>
			<tr>
				<td>Name :</td> <td>". $insetQuery['name'] ."</td>
			</tr>
			<tr>
				<td>Email :</td> <td>". $insetQuery['email'] ."</td>
			</tr>
			<tr>
				<td>Contact No :</td> <td>". $insetQuery['phone'] ."</td>
			</tr>
			<tr>
				<td>Message :</td> <td>". $insetQuery['message'] ."</td>
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

	$toUser = $insetQuery['email'] ;

	$Usermessage = " <html>
	<head>
		<title>". $subject ."</title>
	</head>
	<body>
		<p>Hi ". $insetQuery['name'] .", <br/></p>
		
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