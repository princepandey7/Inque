<div id="slider" style="right:-342px;">
    <div id="sidebar" onclick="open_panel()"><img src="assets/images/submit-enquiry.png"></div>
    <div id="header">
        <h1>get in touch with us</h1>
        <form id="strSendEnquiryFrm" method="post" class="contact-form">
            <div class="col-sm-12 padding0"> 
                <input type="text" class="validate[required]" name="name" id="name" placeholder="Name *">
            </div>
            <div class="col-sm-12 padding0"> 
                <input type="email" class="validate[required,custom[email]]" name="email" id="email" placeholder="Email ID *">
            </div>
            <div class="col-sm-12 padding0"> 
                <input type="text" class="validate[required],custom[onlyNumberSp],minSize[10],maxSize[10]" name="mobile" id="mobile" placeholder="Mobile *">
            </div>
            <div class="col-sm-12 padding0"> 
                <input type="text" class="validate[required]" name="city" id="city" placeholder="City *">
            </div>
            <div class="col-sm-12 padding0"> 
                <textarea placeholder="Message" class="validate[required]" name="message" id="message" rows="4"></textarea>
            </div>
            <div class="col-sm-12 alert alert-success padding0" style="display: none">
              <strong>Success!</strong> Enquiry Submitted Successfully.
            </div>
            <div class="col-sm-12 padding0">
                <button type="button" id="strEnquiryContactBtn"> submit</button>
            </div>
        </form>
    </div>
</div>