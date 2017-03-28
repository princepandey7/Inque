<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Careers Mails <small></small></h2>
    	<!-- <div class="navbar-right">
    		<a href="<?php //echo Yii::app()->createUrl("/gallery/create"); ?>" class="btn btn-success btn-sm"> Add Gallery</a> 
    	</div> -->
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone No</th>
				<th>City</th>
				<!-- <th>State</th>
				<th>Country</th>
				<th>Resume</th> -->
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objContactus ) ){
					foreach ($objContactus as $keyContactUs => $objContactDetail) {
			?>
						<tr>
							<td><?php echo $keyContactUs + 1; ?></td>
							<td><?php echo $objContactDetail->name; ?></td>
							<td><?php echo $objContactDetail->email; ?></td>
							<td><?php echo $objContactDetail->phone; ?></td>
							<td><?php echo $objContactDetail->city; ?></td>
							<!-- <td><?php //echo $objContactDetail->state; ?></td>
							<td><?php //echo $objContactDetail->country; ?></td> -->
							<td>
								<!-- <a href="<?php //echo Yii::app()->createUrl("/ContactUs/update", array('id' => $objContactDetail->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a> -->

								<a id="strCurrentContactStatus" status="<?php echo $objContactDetail->status; ?>" cont_id="<?php echo $objContactDetail->id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objContactDetail->status == Events::STATUS_ACTIVE ){
											$strFaIcon = 'fa-eye';
										}
									?>
									<i class="changeFaIcon fa <?php echo $strFaIcon ;?>"></i>
								</a>
							</td>
						</tr>
			<?php
					}
				}
			?>

		</tbody>
    </table>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','#strCurrentContactStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('status'), id: $(this).attr('cont_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/contactus/ChangeStatus/",
                success: function(data) {
                    if(data.status =="success"){
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('status', data.change_status);
                    }
                }
            });
		})
	});

</script>

