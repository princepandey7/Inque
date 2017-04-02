<div class="modal fade" id="productPdfRequest" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Request for pdf</h4>
        </div>
        <div class="modal-body">
          <form id="strSendProductCatalogueFrm" method="post" class="contact-form">
              <input type="hidden" name="requested_pdf_status" id="requested_pdf_status" value="" />
              <input type="hidden" name="requested_name" id="requested_name" value="" />
              <input type="hidden" name="requested_id" id="requested_id" value="0" />
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
                  <input type="text" class="validate[required]" name="company" id="company" placeholder="Company *">
              </div>
              <div class="col-sm-12 padding0"> 
                  <input type="text" class="validate[required]" name="country" id="country" placeholder="Country *">
              </div>
               <div class="col-sm-12 padding0"> 
                  <input type="text" class="validate[required]" name="state" id="state" placeholder="State *">
              </div>
              <div class="col-sm-12 padding0"> 
                  <input type="text" class="validate[required]" name="city" id="city" placeholder="City *">
              </div>
              <div class="col-sm-12 alert alert-success padding0" style="display: none">
                <strong>Success!</strong> Enquiry Submitted Successfully.
              </div>
              <div class="col-sm-12 padding0">
                  <button type="button" id="strProductCatalogueBtn"> submit</button>
              </div>
          </form>
        </div>
        <div class="clear15"></div>
        </div>
    </div>
  </div>