<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Gallery <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/gallery/create"); ?>" class="btn btn-success btn-sm"> Add Gallery</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Title</th>
				<th>Desc</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objGallerys ) ){
					foreach ($objGallerys as $keyGallery => $objGallery) {
			?>
						<tr>
							<td><?php echo $keyGallery + 1; ?></td>
							<td><?php echo $objGallery->gallery_title; ?></td>
							<td><?php echo $result = substr($objGallery->gallery_description, 0, 10); ?></td>
							<td>
								<a href="<?php echo Yii::app()->createUrl("/gallery/update", array('id' => $objGallery->gallery_id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>

								<a id="strCurrentGalleryStatus" gallery_status="<?php echo $objGallery->gallery_status; ?>" gallery_id="<?php echo $objGallery->gallery_id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objGallery->gallery_status == Events::STATUS_ACTIVE ){
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
		$(document).on('click','#strCurrentGalleryStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('gallery_status'), id: $(this).attr('gallery_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/gallery/ChangeStatus/",
                success: function(data) {
                    if(data.status =="success"){
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('gallery_status', data.change_status);
                    }
                }
            });
		})
	});

</script>
