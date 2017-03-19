<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Sub-Categories <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/subcategories/create"); ?>" class="btn btn-success btn-sm"> Add Sub-Categories</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Sub-Category Name</th>
				<th>Category</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objSubCategories ) ){
					foreach ($objSubCategories as $keySubCategorie => $objSubCategory) {
			?>
						<tr>
							<td><?php echo $keySubCategorie + 1; ?></td>
							<td><?php echo $objSubCategory->sub_categories_name; ?></td>
							<td><?php echo SubCategories::getCategoryName($objSubCategory->categories_id); ?></td>
							<td><?php echo substr($objSubCategory->sub_categories_description, 0, 30); ?></td>
							<td>
								<a href="<?php echo Yii::app()->createUrl("/subcategories/update", array('id' => $objSubCategory->sub_categories_id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>

								<a id="strCatStatus" sub_categories_status="<?php echo $objSubCategory->sub_categories_status; ?>" cat_id="<?php echo $objSubCategory->sub_categories_id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objSubCategory->sub_categories_status == Events::STATUS_ACTIVE ){
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
                data: { status: $(this).attr('sub_categories_status'), id: $(this).attr('cat_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/subcategories/changestatus",
                success: function(data) {
                    if(data.status =="success"){
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('sub_categories_status', data.change_status);
                    }
                }
            });
		})
	});

</script>

