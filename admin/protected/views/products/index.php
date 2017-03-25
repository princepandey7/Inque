<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Products <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/products/create"); ?>" class="btn btn-success btn-sm"> Add Products</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Title</th>
				<th>Category</th>
				<th>Sub-Category</th>
				<th>Size</th>
				<!-- <th>End Date</th> -->
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objProducts ) ){
					foreach ($objProducts as $keyProduct => $objProduct) {
			?>
						<tr>
							<td><?php echo $keyProduct + 1; ?></td>
							<td><?php echo $objProduct->title; ?></td>
							<td><?php echo Categories::getCategoryName($objProduct->categories_id); ?></td>
							<td><?php echo SubCategories::getSubCategoryName($objProduct->subcategories_id); ?></td>
							<td><?php echo $objProduct->size; ?></td>
							<!-- <td><?php //echo $objProduct->event_end_date; ?></td> -->
							<td>
								<a href="<?php echo Yii::app()->createUrl("/products/update", array('id' => $objProduct->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>
								<a id="strCurrentProductstatus" product_status="<?php echo $objProduct->product_status; ?>" event_id="<?php echo $objProduct->id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objProduct->product_status == Products::STATUS_ACTIVE ){
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
		$(document).on('click','#strCurrentProductstatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('product_status'), id: $(this).attr('event_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/Products/ChangeStatus/",
                success: function(data) {
                    if(data.status =="success"){
                        // $("#strCurrentProductstatus").html(data.change_status);
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('product_status', data.change_status);
                        // $elem.html(data.update);
                    }
                }
            });
		})
	});

</script>