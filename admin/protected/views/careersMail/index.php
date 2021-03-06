<h1>Careers Mails</h1>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Careers Mails <small></small></h2>
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
				<!-- <th>State</th> -->
				<th>Creted Date</th>
				<th>Resume</th>
				<!-- <th>Action</th> -->
			</tr>
		</thead>

		<tbody>
			<?php
				if( !empty( $objCareersmail ) ){
					foreach ($objCareersmail as $keyCareersMail => $objCareersMails) {
			?>
						<tr>
							<td><?php echo $keyCareersMail + 1; ?></td>
							<td><?php echo $objCareersMails->name; ?></td>
							<td><?php echo $objCareersMails->email; ?></td>
							<td><?php echo $objCareersMails->phone; ?></td>
							<td><?php echo $objCareersMails->city; ?></td>
							<!-- <td><?php// echo $objCareersMails->state; ?></td> -->
							<td><?php echo date('d-M-Y', strtotime($objCareersMails->created_on)); ?></td>
							 <!-- <td> -->
							 <?php 
							 // 	$link = '../protected/uploads/' . $objCareersMails->resume;
								// $download_link = '<a href = "' . $link . '" target = "_blank"> Click here </a>';
								// echo $download_link;
							 ?>
							 <td><?php echo CHtml::link('Download Resume',array('careersmail/download', 'id' => $objCareersMails->id )); ?></td>
							<!-- <td> -->
								<!-- <a href="<?php //echo Yii::app()->createUrl("/careersMail/update", array('id' => $objCareersMails->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a> -->

								<!-- <a id="strCurrentCarMailStatus" status="<?php //echo $objCareersMails->status; ?>" car_id="<?php //echo $objCareersMails->id; ?>" class="btn btn-danger btn-xs"> -->
									<?php 
										// $strFaIcon = 'fa-eye-slash';
										// if( $objCareersMails->status == Events::STATUS_ACTIVE ){
										// 	$strFaIcon = 'fa-eye';
										// }
									?>
									<!-- <i class="changeFaIcon fa <?php //echo $strFaIcon ;?>"></i> -->
								<!-- </a> -->
							<!-- </td> -->
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
		$(document).on('click','#strCurrentCarMailStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('status'), id: $(this).attr('car_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/careersmail/ChangeStatus/",
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

