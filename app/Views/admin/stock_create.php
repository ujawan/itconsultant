<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>

<?php

$attribute_names = array('AC', 'POWER_STEERING', 'ABS', 'POWER_WINDOWS', 'SRS', 'REAR_SPOILER', 'ROOF_RAIL', 'CD', 'TV', 'NAVIGATION', 'ALLOY_WHEEL', 'LEATHER_SEATS', 'BACKTYRE', 'RADIO', 'CENTRAL_LOCKING', 'POWER_MIRROR', 'BACK_CAMERA', 'FRONT_CAMERA', 'SUN_ROOF', 'DVD_Player', 'MD_Player', 'FOG_Lights', 'Body_Kit', 'Turbo', 'One_Owner', 'HID', 'POWER_SLIDE_DOOR', 'CORNER_SENSOR', 'STEERING_SWITCH', 'AUTO_AC', 'half_leather_seat', 'seven_seater', 'push_start', 'paddle_shift', 'double_power_slide_door','key_start',
'double_moonroof',
'maker_navi_tv',
'dealer_navi_tv',
'maker_navi_jbl_sound_system',
'front_side_back_camera',
'around_view_4_camera',
'maker_rear_entertainment',
'alpine_rear_entertainment',
'rear_entertainment_premium_sound',
'coolbox',
'black_interior',
'black_half_leather',
'black_full_leather',
'beige_interior',
'beige_half_leather',
'beige_full_leather',
'eight_seater',
'one_power_seat',
'two_power_seat',
'three_power_seat',
'one_power_door',
'two_power_door',
'three_power_door',
'power_boot',
'modelista_front_spoiler',
'modelista_full_body_kit',
'admiration_front_spoiler',
'admiration_full_body_kit',
'after_market_front_spoiler',
'after_market_full_body_kit',
'maker_alloy_wheels',
'after_market_alloy_wheels',
'four_disc_brake',
'difflock',
'spare_key','cruise_control','custom_wheels','driver_airbag','hard_disc','maintenance_records_available','no_accidents','non_smoker','passenger_airbag','rear_window_defroster','rear_window_wiper','remote_keyless_entry','side_airbag','third_row_seats','tinted_glass','tilt_wheel');

?>







<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">
			
	      		<div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-truck"></i>
	      				<h3>Stock</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
							<div class="tab-content">

								<form id="edit-profile" action="<?= base_url('admin/stock/store') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
									
									<fieldset>

										<div class="control-group">
											<label class="control-label" for="stock_no">Stock No *</label>
											<div class="controls">
												<input type="text" class="span6" id="stock_no" name="stock_no" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">
											<label class="control-label" for="model_code">Model Code</label>
											<div class="controls">
												<input type="text" class="span6" id="model_code" name="model_code"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="chassis">Chassis</label>
											<div class="controls">
												<input type="text" class="span6" id="chassis" name="chassis"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="engine_no">Engine No</label>
											<div class="controls">
												<input type="text" class="span6" id="engine_no" name="engine_no"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="engine_type">Engine Type</label>
											<div class="controls">
												<input type="text" class="span6" id="engine_type" name="engine_type"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->



										
                                        <div class="control-group">											
											<label class="control-label" for="body_type">Body Type *</label>
											<div class="controls">
												<select class="span4" id="body_type" name="body_type">
													<option selected disabled value="">Select Body Type</option>
													<?php foreach($bodytype as $item){ ?>
														<option value="<?=strtoupper($item['BodyStyleID1Name'])?>"><?=strtoupper($item['BodyStyleID1Name'])?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										

                      <div class="control-group">											
											<label class="control-label" for="make">Make *</label>
											
											<div class="controls">
												<select class="span4" id="make" name="make" onchange="load_models_by_name(this.value);" required>
													<option disabled selected value="">Select any Make</option>
													<?php foreach($makes as $item){ ?>
														<option value="<?=$item['make_id']?>"><?=$item['make_name']?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        

                    <div class="control-group">											
											<label class="control-label" for="model">Model *</label>
											
											<div class="controls">
												<select class="span4" id="model" name="model">
													<option disabled selected value="">Select any Make to load Models</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										

                                        <div class="control-group">											
											<label class="control-label" for="fuel">Fuel *</label>
											
											<div class="controls">
												<select class="span4" id="fuel" name="fuel">
													<option selected disabled value="">Select Fuel Type</option>
														<option value="Gasoline">Gasoline</option>
														<option value="Diesel">Diesel</option>
														<option value="Hybrid">Hybrid</option>
														<option value="LPG">LPG</option>
														<option value="Other">Other</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										
                    <div class="control-group">											
											<label class="control-label" for="veh_condition">Condition *</label>
											
											<div class="controls">
												<select class="span4" id="veh_condition" name="veh_condition">
													<option selected disabled value="">Select Condition</option>
														<option value="Used">Used</option>
														<option value="New">New</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										
										
										<div class="control-group">
											<label class="control-label" for="traction">Traction</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="" checked> N/A
												</label>
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="2WD" > 2WD
												</label>
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="4WD"> 4WD
												</label>
											</div>
										</div>										
																
										
										
										<div class="control-group">
											<label class="control-label" for="drive">Drive</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="drive" name="drive" value="RHD" checked> RHD
												</label>
												<label class="radio inline">
													<input type="radio" id="drive" name="drive" value="LHD"> LHD
												</label>
											</div>
										</div>										
										
										
                                        <div class="control-group">											
											<label class="control-label" for="month">Month</label>
											
											<div class="controls">
												<select class="span4" id="month" name="month">
													<option selected value="">Select Month</option>
													<?php for($i=1; $i<=12; $i++){ ?>
														<option value="<?=$i?>"><?=date("M", strtotime(date("2017-".$i."-01")))?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
										
                                        <div class="control-group">											
											<label class="control-label" for="year">Year</label>
											
											<div class="controls">
												<select class="span4" id="year" name="year">
													<?php for($i=date("Y"); $i>=1990; $i--){ ?>
														<option value="<?=$i?>"><?=$i?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										


                                        <div class="control-group">											
											<label class="control-label" for="doors">Doors</label>
											
											<div class="controls">
												<select class="span4" id="doors" name="doors">
													<option selected disabled value="">Select No. of Doors</option>
													<?php for($i=0; $i<=10; $i++){ ?>
														<option value="<?=$i?>"><?=$i?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
							

                                        <div class="control-group">											
											<label class="control-label" for="seats">Seats</label>
											
											<div class="controls">
												<select class="span4" id="seats" name="seats">
													<option selected disabled value="">Select No. of Seats</option>
													<?php for($i=0; $i<=60; $i++){ ?>
														<option value="<?=$i?>"><?=$i?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										

										
										<div class="control-group">
											<label class="control-label" for="cc">CC</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="cc" name="cc" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="mileage">Mileage</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="mileage" name="mileage" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
                                        <div class="control-group">											
											<label class="control-label" for="transmission">Transmission</label>
											
											<div class="controls">
												<select class="span4" id="transmission" name="transmission">
													<option selected disabled value="">Select Transmission</option>
													<?php foreach($transmission as $item){ ?>
													<option value="<?=$item?>"><?=$item?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">
											<label class="control-label" for="gross_weight">Gross Weight</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="gross_weight" name="gross_weight" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="net_weight">Net Weight</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="net_weight" name="net_weight" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="length">Length</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="length" name="length" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="width">Width</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="width" name="width" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="height">Height</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="height" name="height" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="m3">M3</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="m3" name="m3" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="model_grade">Model Grade</label>
											<div class="controls">
												<input type="text" class="span6" id="model_grade" name="model_grade" value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
                                        <div class="control-group">                     
                      <label class="control-label" for="exterior_color">Exterior Color</label>
                      <div class="controls">
                      <select class="span2" id="exterior_color" name="exterior_color">
                        <option selected disabled value="">Select Ext.Color</option>
                          <?php foreach($color as $item){ ?>
                          <option value="<?=strtoupper($item)?>"><?=strtoupper($item)?></option>
                          <?php } ?>
                      </select>
                      </div>        
                    </div>


                   <div class="control-group">                     
                      <label class="control-label" for="interior_color">Interior Color</label>
                      <div class="controls">
                      <select class="span2" id="interior_color" name="interior_color">
                        <option selected disabled value="">Select Int.Color</option>
                          <?php foreach($color as $item){ ?>
                          <option value="<?=strtoupper($item)?>"><?=strtoupper($item)?></option>
                          <?php } ?>
                      </select>
                      </div>        
                    </div>												
										
											
																				
										<div class="control-group">
											<label class="control-label" for="remarks">Remarks</label>
											<div class="controls">
												<input type="text" class="span6" id="remarks" name="remarks"  value="">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

                                        <div class="control-group">											
											<label class="control-label" for="status">Status</label>
											
											<div class="controls">
												<select class="span4" id="status" name="status">
													<option disabled value="">Select Current Status for Vehicle</option>
													<option selected value="AVAILABLE">AVAILABLE</option>
													<option value="BOOKED">BOOKED</option>
													<option value="SOLD">SOLD</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
										
										
										<div class="control-group">
											<label class="control-label" for="qty">Quantity</label>
											<div class="controls">
												<input type="text" class="span6" id="qty" name="qty"  value="">
											</div> <!-- /controls -->
										</div>

										<div class="control-group">
											<label for="is_special" class="col-md-4 control-label">Special Offer Vehicle</label>
											<div class="radio inline">
												<input class="checkbox" type="checkbox" id="is_special" name="is_special" value="1" style="margin-top: -3px;">
											</div>
										</div>					

										<div class="control-group">
                      <label class="control-label" for="description">Description</label>
                      <div class="controls  span6" style="margin:0 20px;">
                        <textarea id="EditorBox1" name="description"></textarea>
                      </div>
                    </div>
										
                    <div class="control-group">
											<label class="control-label" for="attributes">Attributes</label>
											<div class="controls  span8" style="margin:0 20px;">
												<?php 
												foreach($attribute_names as $key => $val) {  ?>
													<label class="span2">
                              <input type="checkbox" id="att_<?=$val?>" name="attributes[<?=$val?>]" value="YES"> <?=strtoupper(str_replace("_", " ", $val)); ?>
                          </label>
                        <?php } ?>	
                      </div>
                    </div>
										
                    <div class="control-group">
											<label class="control-label">Display on Website</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="display_website" name="display_website" value="1" checked> Yes
												</label>
												<label class="radio inline">
													<input type="radio" id="display_website" name="display_website" value="0"> No
												</label>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="model_grade">Youtube Video Link</label>
											<div class="controls">
												<input type="text" class="span6" id="youtube_video_link" name="youtube_video_link" value="" placeholder="https://www.youtube.com/watch?v=V5cgt6W2Y4w">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										<!-- <div class="control-group">
											<label class="control-label" for="youtube_video_link">Youtube Video Link</label>
											<div class="controls">
												<input type="text" class="span6" id="youtube_video_link" name="youtube_video_link" placeholder="https://www.youtube.com/watch?v=V5cgt6W2Y4w" value="">
											</div>				
										</div> --> 


										<div class="control-group">
                        <label class="control-label"></label>
                      <div id="images" orakuploader="on"></div> 
                    </div>


										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
											<a href="<?=base_url('admin/stock')?>" class="btn">Cancel</a>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								
								
							</div>
						  
						  
						</div>
						
					</div> <!-- /widget-content -->
				</div> <!-- /widget -->
		    </div> <!-- /span8 -->
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->

<?=$this->endsection()?>



<?=$this->section('jquery')?>

<script type="text/javascript">	

function load_models_by_name(make)
{	
	$.ajax({
				url: "<?php echo base_url('admin/veh_models'); ?>",
				type: "POST",
				data: { make:make },
				success: function(data)
				{	
					$("#model").html(data);
				}
			});
}
</script>

<script type="text/javascript" language="javascript">

<?php for($i=1; $i<=40; $i++){ ?>

$('#picture_<?=$i?>').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#picture_show_<?=$i?>").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
});

<?php } ?>



$(document).ready(function(){

	$('#images').orakuploader({
    orakuploader : true,
    orakuploader_path : '<?=base_url('public/assets/admin/orakuploader/');?>',

    orakuploader_main_path : '<?=base_url('public/assets/admin/uploads/stock/');?>',
    orakuploader_thumbnail_path : '<?=base_url('public/assets/admin/uploads/stock/thumbs/');?>',
    
    orakuploader_use_main : true,
    orakuploader_use_sortable : true,
    orakuploader_use_dragndrop : true,
    
    orakuploader_add_image : "<?=base_url('public/assets/admin/orakuploader/images/add.png')?>",
    orakuploader_add_label : 'Browser for images',
    
    orakuploader_resize_to       : 800,
    orakuploader_thumbnail_size  : 184,
    
    orakuploader_main_changed    : function (filename) {
      $("#mainlabel-images").remove();
      $("div").find("[filename='" + filename + "']").append("<div id='mainlabel-images' class='maintext'>Main Image</div>");
    }

  });

});

</script>

<?=$this->endsection()?>






