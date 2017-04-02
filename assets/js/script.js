$(function(){
    $("#strSendContactFrm").validationEngine();
    $("#strSendEnquiryFrm").validationEngine();
    $("#strSendProductCatalogueFrm").validationEngine();

    $(document).on('click','#strContactBtn',function(){
        if($("#strSendContactFrm").validationEngine('validate')){
            $("#loader-overlay").show();
            var form_value = $("#strSendContactFrm").serializeArray();
            jQuery.ajax({
                url: "sendEmailData.php",
                type: "post",
                data: form_value,
                success: function(data) {
                    if(data == "success")
                    {
                        // alert("Your form has been successfully submited.");
                        // window.location.href = "http://www.adsupportadvertising.com/";
                        $("#strSendContactFrm").find(".alert-success").show().delay(5000).fadeOut();;
                        $("#strSendContactFrm").find("input[type=text]").val("");
                        $("#strSendContactFrm").find("input[type=email]").val("");
                        $("#strSendContactFrm").find("textarea").val("");
                    }
                    else
                    {
                        alert("Something Went Wrong, Please try again.");
                    }
                    $("#loader-overlay").hide();
                }
            });
        }
    });

    $(document).on('click','#strEnquiryContactBtn',function(){
        if($("#strSendEnquiryFrm").validationEngine('validate')){
            $("#loader-overlay").show();
            var form_value = $("#strSendEnquiryFrm").serializeArray();
            jQuery.ajax({
                url: "sendEmailData.php",
                type: "post",
                data: form_value,
                success: function(data) {
                    if(data == "success")
                    {
                        // alert("Your form has been successfully submited.");
                        // window.location.href = "http://www.adsupportadvertising.com/";
                        $("#strSendEnquiryFrm").find(".alert-success").show().delay(5000).fadeOut();;
                        $("#strSendEnquiryFrm").find("input[type=text]").val("");
                        $("#strSendEnquiryFrm").find("input[type=email]").val("");
                        $("#strSendEnquiryFrm").find("textarea").val("");
                    }
                    else
                    {
                        alert("Something Went Wrong, Please try again.");
                    }
                    $("#loader-overlay").hide();
                }
            });
        }
    });

    $(document).on('click','#strProductCatalogueBtn',function(){
        if($("#strSendProductCatalogueFrm").validationEngine('validate')){
            $("#loader-overlay").show();
            var form_value = $("#strSendProductCatalogueFrm").serializeArray();
            jQuery.ajax({
                url: "sendProductCatalogueData.php",
                type: "post",
                data: form_value,
                success: function(data) {
                    if(data == "success")
                    {
                        $("#strSendProductCatalogueFrm").find("input[type=text]").val("");
                        $("#strSendProductCatalogueFrm").find("input[type=email]").val("");
                        $('#productCatalogueForm').modal('hide');
                        alert("Pdf Link has been sent to your email.");
                    }
                    else
                    {
                        alert("Something Went Wrong, Please try again.");
                    }
                    $("#loader-overlay").hide();
                }
            });
        }
    });


    $(document).on('click','.commonPdfRequest',function(){
        $("#requested_pdf_status").val($(this).attr('pdf_status'));
        $("#requested_name").val($(this).attr('requested_pdf_name'));
        $("#requested_id").val($(this).attr('sub_cat_id'));
    })

    $(document).on('click','#strProductCatalogueBtn',function(){
        if($("#strSendProductCatalogueFrm").validationEngine('validate')){
            $("#loader-overlay").show();
            var form_value = $("#strSendProductCatalogueFrm").serializeArray();
            jQuery.ajax({
                url: "sendProductCatalogueData.php",
                type: "post",
                data: form_value,
                success: function(data) {
                    if(data == "success")
                    {
                        $("#strSendProductCatalogueFrm").find("input[type=text]").val("");
                        $("#strSendProductCatalogueFrm").find("input[type=email]").val("");
                        $('#productCatalogueForm').modal('hide');
                        alert("Pdf Link has been sent to your email.");
                    }
                    else
                    {
                        alert("Something Went Wrong, Please try again.");
                    }
                    $("#loader-overlay").hide();
                }
            });
        }
    });

});