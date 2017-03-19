<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Categories <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/categories/create"); ?>" class="btn btn-success btn-sm"> Add Categories</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objCategories ) ){
					foreach ($objCategories as $keyCategorie => $objCategory) {
			?>
						<tr>
							<td><?php echo $keyCategorie + 1; ?></td>
							<td><?php echo $objCategory->categories_name; ?></td>
							<td><?php echo substr($objCategory->categories_description, 0, 30); ?></td>
							<td>
								<a href="<?php echo Yii::app()->createUrl("/categories/update", array('id' => $objCategory->categories_id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>

								<a id="strCatStatus" categories_status="<?php echo $objCategory->categories_status; ?>" cat_id="<?php echo $objCategory->categories_id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objCategory->categories_status == Events::STATUS_ACTIVE ){
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
		$(document).on('click','#strCatStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('categories_status'), id: $(this).attr('cat_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/categories/changestatus",
                success: function(data) {
                    if(data.status =="success"){
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('categories_status', data.change_status);
                    }
                }
            });
		})
	});

</script>

