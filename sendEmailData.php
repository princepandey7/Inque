<?php
ob_start();
require_once("db.php");

echo "<pre>"; print_r($_POST); echo "</pre>". __LINE__ . ".\n"; exit(); 

$insetQuery = 
		array(
			'name'=>$_POST['name'],
			'email'=>$_POST['email'],
			'phone'=>$_POST['mobile'],
			'city'=>$_POST['city'],
			'message'=>$_POST['message']
		);

$connection->InsertQuery("contact_us",$insetQuery);


// if(!empty($_POST))
// {
// 	$to = "admin@gmail.com";
// 	$subject = "User contact details";
	
// 	if(empty($_POST['name'])  ||  empty($_POST['email']) || empty($_POST['telephone']) || empty($_POST['message']) )
// 	{
// 	    echo "error";
// 	}
// 	else
// 	{
// 		$name 		=  	$_POST['name'];
// 		$emailid 	=  	$_POST['email'];
// 		$number 	=  	$_POST['telephone'];
// 		$message 	= 	$_POST['message'];

// 		$message = "
// 		<html>
// 		<head>
// 		<title>HTML email</title>
// 		</head>
// 		<body>
// 		<p>Hi Sir,</p>
// 		<table>

// 		<tr>
// 		<td>Name :</td> <td>".$name."</td>
// 		</tr>

// 		<tr>
// 		<td>Email :</td> <td>".$emailid."</td>
// 		</tr>

// 		<tr>
// 		<td>Contact No :</td> <td>".$number."</td>
// 		</tr>

// 		<tr>
// 		<td>Message :</td> <td>".$message."</td>
// 		</tr>
// 		</table>
// 		</body>
// 		</html>
// 		";

// 		// Always set content-type when sending HTML email
// 		$headers = "MIME-Version: 1.0" . "\r\n";
// 		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// 		mail($to,$subject,$message,$headers);
		echo "success";
// 	}
// }
// else
// {
// 	echo "error";
// }
?>