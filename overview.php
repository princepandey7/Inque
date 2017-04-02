<?php 
ob_start();
require_once("db.php");
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>

            <div class="container-fluid banner margin-top100">
                <img src="assets/images/top-banner.jpg" class="responsive-img">
                <h6>solution for smart spaces</h6>
            </div>
            <div class="clear0"></div>
            <div class="container weare">
                <div class="col-sm-6">
                    <div class="">
                        <h5>We are</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum, has been theindustry's standard dummy text ever since the1500s, when an unknown Printer took a galley of type and scrambled it tomake a type specimen book. It has survived not only five centuries, but alsothe leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p>
                            It was popularised in the 1960s with the release of Letraset sheets containingLorem Ipsum passages, and more recently with desktop publishing software

                            like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing softwarelike Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 pl0">
                    <div class="img-black">
                      
                   </div>
                </div>
            </div>
            <div class="container-fluid pl0 vision-mission">
                <div class="">
                   <img src="assets/images/aboutus/mission-vision-bg.jpg" class="responsive-img">
                   <div class="container">
                       <h5 class="white">OUR MISSION</h5>
                       <p>
                            like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing softwarelike Aldus PageMaker including versions of Lorem Ipsum.
                       </p>
                       <h5 class="white">OUR VISION</h5>
                       <p>
                            like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing softwarelike Aldus PageMaker including versions of Lorem Ipsum.
                       </p>
                   </div>
               </div>
            </div>
            <div class="clear15"></div>
            <div class="container distributor ">
                <h5>FIND DISTRIBUTOR</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum, has been theindustry's standard dummy text ever since the1500s, when an unknown Printer took a galley of type and scrambled it tomake a type specimen book. It has survived not only five centuries, but alsothe leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="container find-contact">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="distributorFormBox">
                            <p>Contact details for distributor </p>
                            <?php
                                $countryQuery = $connection->tableDataCondition("*", "countries","1=1");
                                $rowCountrys = $countryQuery->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-bottom: 10px">
                                        <select name="country" id="distributorCountry" placeholder="Country" class="form-control">
                                            <?php
                                                if( !empty( $rowCountrys ) ){
                                                    foreach ($rowCountrys as $strCtyIndex => $rowCountry) {
                                            ?>
                                                        <option value="<?php echo $rowCountry['id']; ?>"> <?php echo $rowCountry['name']; ?> </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-bottom: 10px">
                                        <select name="state" id="distributorState" placeholder="State" class="form-control">
                                            <option value="0"> Select State </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-bottom: 10px">
                                        <select name="city" id="distributorCity" placeholder="City" class="form-control">
                                            <option value="0">Select City </option>
                                        </select>
                                    </div>
                                </div>
                                <input type="button" id="strGetDistDetails"  value="SUBMIT" />
                            </form>
                        </div>   
                    </div>

                    <div class="col-sm-8">
                        <ul class="distributorMainBox">
                            <li class="col-sm-4"> No Distributor Available </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>

        <div class="clear0"></div>

        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
        <script src="assets/gallery/js/masonry.pkgd.min.js"></script>
        <script src="assets/gallery/js/imagesloaded.js"></script>
        <script src="assets/gallery/js/classie.js"></script>
        <script src="assets/gallery/js/AnimOnScroll.js"></script>

       <script>
            $(function(){
                $(document).on('change', '#distributorCountry', function(){
                    $("#loader-overlay").show();
                    var strCountryId = $(this).find('option:selected').val();
                    if( strCountryId != ''){
                        // var This = $(this);
                        jQuery.ajax({
                            url: "loadDistributorDetails.php",
                            type: "post",
                            data: {country_id: strCountryId, status : "country"},
                            success: function(data) {
                                if( data != ''){
                                    $("#distributorState").empty();
                                    $("#distributorState").html(data);
                                    $("#distributorState").trigger('change');
                                }
                                $("#loader-overlay").hide();
                            }
                        });
                    } else {
                        $("#distributorState").empty();
                        $("#distributorState").html("<option value='0'>--Select State --</option>");
                    }
                });


                $(document).on('change', '#distributorState', function(){
                    $("#loader-overlay").show();
                    var strStateId = $(this).find('option:selected').val();
                    if( strStateId != ''){
                        jQuery.ajax({
                            url: "loadDistributorDetails.php",
                            type: "post",
                            data: {state_id: strStateId, status : "state"},
                            success: function(data) {
                                if( data != ''){
                                    $("#distributorCity").empty();
                                    $("#distributorCity").html(data);
                                }
                                $("#loader-overlay").hide();
                            }
                        });
                    } else {
                        $("#distributorCity").empty();
                        $("#distributorCity").html("<option value='0'>--Select State --</option>");
                    }
                });

                $(document).on('click', '#strGetDistDetails', function(){
                    var boolData = true;
                    var strCountryId    = $("#distributorCountry").find('option:selected').val();
                    var strStateId      = $("#distributorState").find('option:selected').val();
                    var strCityId       = $("#distributorCity").find('option:selected').val();

                    console.log(strStateId);
                    console.log(strCityId);

                    var errorMsg = '';
                    if( strStateId == '0' && strCityId == '0'){
                        errorMsg = 'Please select state and city';
                        boolData = false;
                    } else if(strCityId == '0'){
                        errorMsg = 'Please select city';
                        boolData = false;
                    }

                    if(boolData === false){
                        alert(errorMsg);
                        return false;
                    }
                    if( boolData == true ){
                        $("#loader-overlay").show();
                        jQuery.ajax({
                            url: "loadDistridutorData.php",
                            type: "post",
                            data: {country_id: strCountryId, state_id: strStateId, city_id: strCityId},
                            success: function(data) {
                                if( data != ''){
                                    $('.distributorMainBox').empty();
                                    $('.distributorMainBox').html(data);
                                }
                                $("#loader-overlay").hide();
                            }
                        });
                    }
                });

            });
        </script>
    </body>
</html>
