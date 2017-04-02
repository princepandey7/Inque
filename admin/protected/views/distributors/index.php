<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Distributor <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/distributors/create"); ?>" class="btn btn-success btn-sm"> Add Distributor</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Telephone No</th>
				<th>Country</th>
				<th>State</th>
				<th>City</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objDistributors ) ){
					foreach ($objDistributors as $KeyDistributor => $objDistributor) {
			?>
						<tr>
							<td><?php echo $KeyDistributor + 1; ?></td>
							<td><?php echo $objDistributor->name; ?></td>
							<td><?php echo $objDistributor->email ?></td>
							<td><?php echo $objDistributor->telephone_no ?></td>
							<td><?php echo Countries::getCountryName($objDistributor->country) ?></td>
							<td><?php echo States::getStateName($objDistributor->state) ?></td>
							<td><?php echo Cities::getCitiesName($objDistributor->city) ?></td>
							<td>
								<a href="<?php echo Yii::app()->createUrl("/distributors/update", array('id' => $objDistributor->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>

								<a id="strDisStatus" distributor_status="<?php echo $objDistributor->distributor_status; ?>" cat_id="<?php echo $objDistributor->id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objDistributor->distributor_status == Distributors::STATUS_ACTIVE ){
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
		$(document).on('click','#strDisStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('distributor_status'), id: $(this).attr('cat_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/distributors/changestatus",
                success: function(data) {
                    if(data.status =="success"){
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('distributor_status', data.change_status);
                    }
                }
            });
		})
	});

</script>

