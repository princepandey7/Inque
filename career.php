<?php 

if (isset($_POST['careerSubmit'])){
ob_start();
require_once("db.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $message = $_POST['message'];


    //validation
    $errorArray = array();
    //email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorArray['invalid_email'] = 'Invalid Email Entered.';
    }

    //file- type
    $upload_resume_name = $_FILES['upload_resume']['name'];
    $ext = pathinfo($upload_resume_name, PATHINFO_EXTENSION);
    $validExtentionArray = array('doc','docx','rtf','txt','pdf');
    if(!in_array($ext, $validExtentionArray)){
        $errorArray['invalid_filetype'] = 'Invalid File Uploaded.';
    }
    $min_filesize=10;
    if(filesize($_FILES['upload_resume']['tmp_name']) < $min_filesize){
        $errorArray['invalid_filetype'] = 'File size too large can\'t be lower then 10 bytes';   
    }

    if(empty($errorArray)){
        //upload resume
        $move = 'admin/uploads/';
        move_uploaded_file($_FILES['upload_resume']['tmp_name'], $move.$_FILES['upload_resume']['name']);

        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $datetime = date('Y-m-d H:i:s a',$timestamp);        
        //insert

        $insetQuery = 
                    array(
                        'name'=>$name,
                        'email'=>$email,
                        'phone'=>$phone,
                        'city'=>$city,
                        'state'=>$state,
                        'country'=>$country,
                        'message'=>$message,
                        'resume' => $upload_resume_name
                    );

        $connection->InsertQuery("careers_mail",$insetQuery);

        //mail
        $to_email= "contact@m9creative.com";
        //email body
        $message_body = "Name : ".$name."\r\n\r\nEmail : ".$email."\r\n\r\nPhone Number : ". $phone."\r\n\r\nCity : ". $city."\r\n\r\nState : ". $state."\r\n\r\nCountry : ".$country."\r\n\r\nMessage : ".$message;

        //proceed with PHP email.
        $headers = 'From: '.$name.'<'.$email.'>'. "\r\n" .
        'Reply-To: '.$email.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $subject='Career';
        // $send_mail = mail($to_email, $subject, $message_body, $headers);
        //resume sent succussfully.
        $resume_sent = 'Resume sent succussfully.';
        $name = $email = $phone = $city = $state = $country = $message = '';
    }
}

$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>
            <div class="clear0"></div>
            <div class="container-fluid career padding0 margin-top100">
                <div class="row">
                <div class="col-sm-6 padding0">
                    <div class="career-inner">
                        <h5 class="white">BRING your ideas &amp; experiences </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        </p>
                        <p>
                            Etiam auctor id enim nec consectetur. Proin sem ex, feugiat a tellus et, blandit ultricies arcu. Etiam feugiat vestibulum lacinia. Duis et sodales nisl. Sed et feugiat sapien. Integer commodo  Duis et sodales nisl. Integer commodo 
                        </p>
                        <p>
                            diam quis ante congue sagittis quis a mi. Fusce nec hendrerit nibh. Ut imperdiet ante ac lobortis auctor. Aenean non tempus quam. 
                        </p>
                       
                        <p>
                             faucibus vitae varius in, molestie vel magna. Duis suscipit 
                        </p>
                        <p>To explore opportunities email your resume at</p>
                        <div class="contactForm ">
                            <?php
                                if (isset($resume_sent)) {
                                    echo $resume_sent;
                                 } 
                                if(isset($errorArray['invalid_email'])){
                                   echo $errorArray['invalid_email'].'<br/>'; 
                                }
                                if(isset($errorArray['invalid_filetype'])){
                                   echo $errorArray['invalid_filetype'].'<br/>';
                                }                                           
                            ?>
                            <form id="strSendCareerFrm" method="post"  class="contact-form" _lpchecked="1" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" value="<?php if(isset($name)){ echo $name; } ?>" id="name" placeholder="Name *" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" value="<?php if(isset($email)){ echo $email; } ?>" id="email" placeholder="Email ID *" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="phone" value="<?php if(isset($phone)){ echo $phone; } ?>" id="phone" placeholder="Mobile *" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="city" value="<?php if(isset($city)){ echo $city; } ?>"  id="city" placeholder="City *" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php if(isset($state)){ echo $state; } ?>" placeholder="State" name="state" id="state" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php if(isset($country)){ echo $country; } ?>" placeholder="Country" name="country" id="country" required>
                                    </div>
                                    <div class="col-md-12">
                                                    <textarea rows="4" cols="50" type="text" placeholder="Message" name="message" id="message"><?php if(isset($message)){ echo $message; } ?></textarea>
                                                </div>
                                    <!-- <div class="col-sm-6">
                                        <select>
                                            <option>Select</option>
                                            <option>Example 1</option>
                                            <option>Example 1</option>
                                            <option>Example 1</option>
                                        </select>
                                    </div> -->
                                    <div class="col-sm-12 pr0">
                                        <input type="file" name="upload_resume" id="upload_resume" style=" background:transparent; border:none; outline:none; color:#ffffff">
                                    </div>
                                    <div class="col-sm-12 pr0">
                                        <button type="submit" id="strCareerBtn" name="careerSubmit" class="btn">Send Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
                <div class="col-sm-6 padding0">
                    <img src="assets/images/careers/contact-img-01.jpg" class="responsive-img">
                </div>
                <div class="clear15"></div>
                <div>
                    <img src="assets/images/careers/contact-img-02.jpg" class="responsive-img">
                </div>
            </div>
            <div class="clear0"></div>
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>

        <?php include_once('enquiry-slider.php') ?>

        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
       <!--  <script src="assets/gallery/js/masonry.pkgd.min.js"></script>
        <script src="assets/gallery/js/imagesloaded.js"></script>
        <script src="assets/gallery/js/classie.js"></script>
        <script src="assets/gallery/js/AnimOnScroll.js"></script> -->

        <script type="text/javascript">
            // $(".menubar").on('click', 'li', function () {
            //     $(".menubar li.active").removeClass("active");
            //     $(this).addClass("active");
            // });
        </script>
        <script>
            // new AnimOnScroll( document.getElementById( 'grid1' ), {
            //     minDuration : 0.4,
            //     maxDuration : 0.7,
            //     viewportFactor : 0.2
            // } );
        </script>
    </body>
</html>
