<?php
ob_start();
require_once("db.php");

if(!empty($_POST))
{
	$name    			= 	filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$emailId   			= 	filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mobile 			= 	filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);
	$companyName    	= 	filter_var($_POST["company"], FILTER_SANITIZE_STRING);
	$country    		= 	filter_var($_POST["country"], FILTER_SANITIZE_STRING);
	$state    			= 	filter_var($_POST["state"], FILTER_SANITIZE_STRING);
	$city       		= 	filter_var($_POST["city"], FILTER_SANITIZE_STRING);
	$status				= 	$_POST['requested_pdf_status'];
	
	$requestedPdfName		= 	$_POST['requested_name'];

	$insetQuery =
			array(
				'name'			=>$name,
				'email'			=>$emailId,
				'mobile'		=>$mobile,
				'company'		=>$companyName,
				'country'		=>$country,
				'state'			=>$state,
				'city'			=>$city,
				'requested_by'	=>$status,
				'requested_id'	=>$_POST['requested_id'],
				'status'		=>1,
			);

	$connection->InsertQuery("requestedpdf",$insetQuery);

	$image_link = DIR.'assets/images/menu-logo.png';

	$UrlLink = '';
	switch ($status) {
		case 'get_catalogue_pdf':
			$UrlLink = DIR.'assets/pdfProductCatalogue/pdf-product-catalogue.pdf';
			break;
		case 'get_category_pdf':
			$UrlLink = DIR.'assets/pdfProduct/sub-category/'. $requestedPdfName ;
			break;
		case 'get_product_pdf':
			$UrlLink = DIR.'assets/pdfProduct/product/'. $requestedPdfName ;
			break;
		default:
			break;
	}

	$strArrayData = explode("_", $requestedPdfName);
	$pdfname = $strArrayData[1];
	$download_link = $UrlLink;

	$to = $emailId;

	$subject = 'PDF request received';

	$message = '<div style="width: 900px;">
					<img src="'. $image_link .'"/>
					<p>
					Dear '.$name.'
					</p>
					<p>
					Thank you for taking the time to go through our website. You free PDF download is ready.
					</p>
					<p>
						<b>PDF Name:</b> '.$pdfname.'
					</p>
					<p>
					Simply click on the link below to begin the download immediately. In case you are unable to do that, copy and paste the link in your browser URL window to start the same.
					</p>
					<p><a href='. $download_link .' target="_blank">Click Here</a></p>
					<p>
					If you need more information on a particular product or are facing a challenge in your operations where our expertise can help, please feel free to reach out to us at (<a href="mailto:prince.pandey7@gmail.com">prince.pandey7@gmail.com</a>). We would be really happy to help you. 
					</p>
					<p>
					Regards,
					</p>
					<p>
					Inque Team
					</p>
					<hr style="border-top: dashed 1px;"/>
				</div>';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Inque<prince.pandey7@gmail.com>' . "\r\n";

	$mail = mail($to,$subject,$message,$headers);

	/////////////////////////////////////////////// MAIL SEND TO ADMIN ////////////////////////////////

	//send email to admin
	$adminEmail = 'prince.pandey7@gmail.com';
	//$adminEmail = 'info@jesons.net';

	$toEmail = $emailId;
	$adminSubject = 'PDF Requested';

	$adminMessage = '<div style="width: 900px;">
				<img src="'.$image_link.'"/>
				<p>
				Hello Admin
				</p>
				<p><b>User Details</b></p> <br/>
				<p>Below User requested for the PDF</p>
				<p><b>Name:</b> '.$name.'</p>
				<p><b>Email:</b> '.$toEmail.'</p>
				<p><b>Mobile No.:</b> '.$mobile.'</p>
				<p><b>Company Name:</b> '.$companyName.'</p>
				<p><b>Country :</b> '.$country.'</p>
				<p><b>State:</b> '.$state.'</p>
				<p><b>City:</b> '.$city.'</p>

				<br/><p>Requested PDF for</p>
				<p><b>PDF Details</b></p>
				<p>
					<b>PDF Name:</b> '.$pdfname.'
				</p>
				<hr style="border-top: dashed 1px;"/>
				<p style="font-size: 12px;text-align: justify;">
					Simply click on the link below to begin the download immediately. In case you are unable to do that, copy and paste the link in your browser URL window to start the same
				</p>
				<p style="font-size: 12px;text-align: justify;">
					If you need more information on a particular product or are facing a challenge in your operations where our expertise can help, please feel free to reach out to us at (prince.pandey7@gmail.com). We would be really happy to help you.
				</p>
				<p>Regards, <br/> Inque Team </p>
				</div>
				';
				
 
	// Always set content-type when sending HTML email
	$adminHeaders = "MIME-Version: 1.0" . "\r\n";
	$adminHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$adminMail = mail($adminEmail,$adminSubject,$adminMessage,$adminHeaders);
	echo "success";
}
else
{
	echo "error";
}
?>