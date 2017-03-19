<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  	<div class="x_title">
    <h2>Events <small></small></h2>
    	<div class="navbar-right">
    		<a href="<?php echo Yii::app()->createUrl("/events/create"); ?>" class="btn btn-success btn-sm"> Add Events</a> 
    	</div>
    	<div class="clearfix"></div>
  	</div>
  	<div class="x_content">
    <table id="datatable-buttons" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Event Name</th>
				<th>Start Date</th>
				<!-- <th>End Date</th> -->
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if( true == !empty( $objEvents ) ){
					foreach ($objEvents as $keyEvent => $objEvent) {
			?>
						<tr>
							<td><?php echo $keyEvent + 1; ?></td>
							<td><?php echo $objEvent->event_title; ?></td>
							<td><?php echo $objEvent->event_start_date; ?></td>
							<!-- <td><?php //echo $objEvent->event_end_date; ?></td> -->
							<td>
								<a href="<?php echo Yii::app()->createUrl("/events/update", array('id' => $objEvent->event_id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i></a>
								<a id="strCurrentEventStatus" event_status="<?php echo $objEvent->event_status; ?>" event_id="<?php echo $objEvent->event_id; ?>" class="btn btn-danger btn-xs">
									<?php 
										$strFaIcon = 'fa-eye-slash';
										if( $objEvent->event_status == Events::STATUS_ACTIVE ){
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
		$(document).on('click','#strCurrentEventStatus', function(){
			var $elem = $(this);
			$.ajax({
                type: "POST",
                dataType: "json",
                data: { status: $(this).attr('event_status'), id: $(this).attr('event_id')},
                url: "<?php echo Yii::app()->baseUrl; ?>/events/ChangeStatus/",
                success: function(data) {
                    if(data.status =="success"){
                        // $("#strCurrentEventStatus").html(data.change_status);
                        if( data.change_status == "1") {
                            $elem.find('.changeFaIcon').removeClass('fa-eye-slash');
                            $elem.find('.changeFaIcon').addClass('fa-eye');
                        } else {
                             $elem.find('.changeFaIcon').removeClass('fa-eye');
                            $elem.find('.changeFaIcon').addClass('fa-eye-slash');
                        }

                        $elem.attr('event_status', data.change_status);
                        // $elem.html(data.update);
                    }
                }
            });
		})
	});

</script>