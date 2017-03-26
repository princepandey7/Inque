<?php
ob_start();
require_once("db.php");

if(!empty($_POST))
{
	$name    		= 	filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$emailId   		= 	filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mobile 		= 	filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);
	$companyName    = 	filter_var($_POST["company"], FILTER_SANITIZE_STRING);
	$country    	= 	filter_var($_POST["country"], FILTER_SANITIZE_STRING);
	$state    		= 	filter_var($_POST["state"], FILTER_SANITIZE_STRING);
	$city       	= 	filter_var($_POST["city"], FILTER_SANITIZE_STRING);

	$insetQuery = 
			array(
				'name'		=>$name,
				'email'		=>$emailId,
				'mobile'	=>$mobile,
				'company'	=>$companyName,
				'country'	=>$country,
				'state'		=>$state,
				'city'		=>$city,
				'is_visible'=>1,
			);
	$pdfname = 'test.pdf';
	$connection->InsertQuery("request_product_catalogue",$insetQuery);
	$image_link = DIR.'assets/images/menu-logo.png';

	$download_link = DIR.'assets/pdfProductCatalogue/pdf-product-catalogue.pdf';
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
					If you need more information on a particular product or are facing a challenge in your operations where our expertise can help, please feel free to reach out to us at (<a href="mailto:contact@m9creative.com">contact@m9creative.com</a>). We would be really happy to help you. 
					</p>
					<p>
					Regards,
					</p>
					<p>
					Inque Team
					</p>
					<hr style="border-top: dashed 1px;"/>
					<p style="font-size: 12px;text-align: justify;">
					Disclaimer: This email and any files transmitted with it are privileged and confidential and intended solely for the use of the individual or entity to whom they are addressed. If you are not the intended recipient or an agent responsible for delivering it to the intended recipient, you are hereby notified that you have received this email in error and you should not review, disseminate, distribute or copy this e-mail or any attachments contained herein. Please notify the sender immediately by e-mail and delete this e-mail from your system. E-mail transmission cannot be guaranteed to be secure or error-free as information could be intercepted, corrupted, lost, destroyed, arrive late or incomplete, or contain viruses. The sender therefore does not accept liability for any errors or omissions in the contents of this message, which arise as a result of e-mail transmission. The sender also confirms that it shall not be responsible if this email message is used for any indecent, unsolicited or illegal purposes, which are in violation of any existing laws and the same shall solely be the responsibility of misuser and that the sender shall at all times be indemnified of any civil and/ or criminal liabilities or consequences thereof. If verification is required please request a hard-copy version.
					</p>
				</div>';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: Inque<contact@m9creative.com>' . "\r\n";

	$mail = mail($to,$subject,$message,$headers);


	//send email to admin
	$adminEmail = 'contact@m9creative.com';
	//$adminEmail = 'info@jesons.net';

	$toEmail = $emailId;
	$adminSubject = 'PDF requested';

	$adminMessage = '<div style="width: 900px;">
				<img src="'.$image_link.'"/>
				<p>
				Hello Admin
				</p>
				<p><b>User Details</b></p>
				<p><b>Name:</b> '.$name.'</p>
				<p><b>Email:</b> '.$toEmail.'</p>
				<p><b>Mobile No.:</b> '.$mobile.'</p>
				<p><b>Company Name:</b> '.$companyName.'</p>';

	$adminMessage .= '<br/><p>Requested PDF for</p>
				<p><b>PDF Details</b></p>
				<p>
					<b>PDF Name:</b> '.$pdfname.'
				</p>
				<hr style="border-top: dashed 1px;"/>
				<p style="font-size: 12px;text-align: justify;">
				Disclaimer: This email and any files transmitted with it are privileged and confidential and intended solely for the use of the individual or entity to whom they are addressed. If you are not the intended recipient or an agent responsible for delivering it to the intended recipient, you are hereby notified that you have received this email in error and you should not review, disseminate, distribute or copy this e-mail or any attachments contained herein. Please notify the sender immediately by e-mail and delete this e-mail from your system. E-mail transmission cannot be guaranteed to be secure or error-free as information could be intercepted, corrupted, lost, destroyed, arrive late or incomplete, or contain viruses. The sender therefore does not accept liability for any errors or omissions in the contents of this message, which arise as a result of e-mail transmission. The sender also confirms that it shall not be responsible if this email message is used for any indecent, unsolicited or illegal purposes, which are in violation of any existing laws and the same shall solely be the responsibility of misuser and that the sender shall at all times be indemnified of any civil and/ or criminal liabilities or consequences thereof. If verification is required please request a hard-copy version.
				</p>
				</div>';
				
 
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