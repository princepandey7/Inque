$(function(){
    $("#strSendContactFrm").validationEngine();
    $("#strSendEnquiryFrm").validationEngine();
    $(document).on('click','#strContactBtn',function(){
        if($("#strSendContactFrm").validationEngine('validate')){
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
                }
            });
        }
    });

    $(document).on('click','#strEnquiryContactBtn',function(){
        if($("#strSendEnquiryFrm").validationEngine('validate')){
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
                }
            });
        }
    });
});