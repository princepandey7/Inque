<?php
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>
            <div class="clear0"></div>
            <div class="container-fluid contact padding0 margin-top100">
                <div class="row">
                 <div class="col-sm-6 padding0">
                    <img src="assets/images/Contact/contact-img-01.jpg" class="responsive-img">
                    <div class="contact-add">
                        <h2>
                            Pooja Hardware Pvt. Ltd
                            <span>Kitchen &amp; Bathroom Accessories</span>
                        </h2>
                        <span>A-107, Building No 2, Sanjay Mittal Ind.Estate, </span>
                        <span>Marol naka, Andheri - Kurla Road,</span>
                        <span>Andheri (East), Mumbai - 400 059, India.</span>
                        <p class="firstp">
                            <span>Tel :   + 91-22-2852 0329   </span>
                            <span>  Email :  designs@inque.co.in</span>
                        </p>
                        <p>
                            <span>Tel :   + 91-22-2850 0973 </span>
                            <span> Email :  sales.designs@inque.co.in</span>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 padding0">
                    <div class="contact-inner">
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
                        <h5 class="white">Write us for an enquiry </h5>
                        <div class="contactForm ">
                            <form id="strSendContactFrm" method="post" class="contact-form" _lpchecked="1">
                                <div class="row">
                                    <div class="col-sm-6"><input type="text" class="validate[required]" name="name" id="name" placeholder="Name *" required=""></div>
                                    <div class="col-sm-6"><input type="email" class="validate[required,custom[email]]" name="email" id="email" placeholder="Email ID *" required=""></div>
                                    <div class="col-sm-6"><input type="text" class="validate[required],custom[onlyNumberSp],minSize[10],maxSize[10]" name="mobile" id="mobile" placeholder="Mobile *" required=""></div>
                                    <div class="col-sm-6"><input type="text" class="validate[required]" name="city" id="city" placeholder="City *" required=""></div>
                                    <div class="col-sm-12"><textarea placeholder="Message" class="validate[required]" name="message" id="message" rows="4"></textarea></div>
                                    <div class="col-sm-12 alert alert-success" style="display: none">
                                      <strong>Success!</strong> Data Submitted Successfully.
                                    </div>
                                    <div class="col-sm-12 pr0">
                                        <button type="button" id="strContactBtn" class="btn">Send Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
               
                <div class="clear0"></div>
                <div>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.0013436469435!2d72.88101231401664!3d19.107596987069822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c86cc495a4e5%3A0x63eb875616718008!2sMittal+Estate!5e0!3m2!1sen!2sin!4v1488228683340" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
        <script src="assets/gallery/js/masonry.pkgd.min.js"></script>
        <script src="assets/gallery/js/imagesloaded.js"></script>
        <script src="assets/gallery/js/classie.js"></script>
        <script src="assets/gallery/js/AnimOnScroll.js"></script>

        <script type="text/javascript">
            $(".menubar").on('click', 'li', function () {
                $(".menubar li.active").removeClass("active");
                $(this).addClass("active");
            });
        </script>
        <script>
            new AnimOnScroll( document.getElementById( 'grid1' ), {
                minDuration : 0.4,
                maxDuration : 0.7,
                viewportFactor : 0.2
            } );
        </script>
        <script type="text/javascript">
            /*
            ------------------------------------------------------------
            Function to activate form button to open the slider.
            ------------------------------------------------------------
            */
            function open_panel() {
                slideIt();
                var a = document.getElementById("sidebar");
                a.setAttribute("id", "sidebar1");
                a.setAttribute("onclick", "close_panel()");
            }
            /*
            ------------------------------------------------------------
            Function to slide the sidebar form (open form)
            ------------------------------------------------------------
            */
            function slideIt() {
                var slidingDiv = document.getElementById("slider");
                var stopPosition = 0;
                if (parseInt(slidingDiv.style.right) < stopPosition) {
                    slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
                    setTimeout(slideIt, 1);
                }
            }
            /*
            ------------------------------------------------------------
            Function to activate form button to close the slider.
            ------------------------------------------------------------
            */
            function close_panel() {
                slideIn();
                a = document.getElementById("sidebar1");
                a.setAttribute("id", "sidebar");
                a.setAttribute("onclick", "open_panel()");
            }
            /*
            ------------------------------------------------------------
            Function to slide the sidebar form (slide in form)
            ------------------------------------------------------------
            */
            function slideIn() {
                var slidingDiv = document.getElementById("slider");
                var stopPosition = -342;
                if (parseInt(slidingDiv.style.right) > stopPosition) {
                    slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
                    setTimeout(slideIn, 1);
                }
            }
        </script>
    </body>
</html>
