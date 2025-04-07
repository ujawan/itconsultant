<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>


<?php
			
	$attribute_names = array('AC',
'POWER_STEERING',
'ABS',
'POWER_WINDOWS',
'SRS',
'REAR_SPOILER',
'ROOF_RAIL',
'CD',
'TV',
'NAVIGATION',
'ALLOY_WHEEL',
'LEATHER_SEATS',
'BACKTYRE',
'RADIO',
'CENTRAL_LOCKING',
'POWER_MIRROR',
'BACK_CAMERA',
'FRONT_CAMERA',
'SUN_ROOF',
'DVD_Player',
'MD_Player',
'FOG_Lights',
'Body_Kit',
'Turbo',
'One_Owner',
'HID',
'POWER_SLIDE_DOOR',
'CORNER_SENSOR',
'STEERING_SWITCH',
'AUTO_AC',
'half_leather_seat',
'seven_seater',
'push_start',
'paddle_shift',
'double_power_slide_door');

	foreach($attribute_names as $att)
	{
		if(@$features[$att]=="YES")
		{ 
				$features[$att] = "YES"; 
		}
		else
		{ 
			$features[$att] = "NO"; 
		}
	}			
		


?>





<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">

			
			
	      		<div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-cog"></i>
	      				<h3>Update Stock info</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
							<div class="tab-content">

								<form id="edit-profile" action="<?= base_url('admin/stock/update') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

											<input type="hidden" id="veh_id" name="veh_id" value="<?=$veh['veh_id']?>">
									
									<fieldset>

										<div class="control-group">
											<label class="control-label" for="stock_no">Stock No *</label>
											<div class="controls">
												<input type="text" class="span6" id="stock_no" name="stock_no" value="<?=$veh['stock_no']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">
											<label class="control-label" for="model_code">Model Code</label>
											<div class="controls">
												<input type="text" class="span6" id="model_code" name="model_code" value="<?=$veh['model_code']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="chassis">Chassis</label>
											<div class="controls">
												<input type="text" class="span6" id="chassis" name="chassis" value="<?=$veh['chassis']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="engine_no">Engine No</label>
											<div class="controls">
												<input type="text" class="span6" id="engine_no" name="engine_no" value="<?=$veh['engine_no']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="engine_type">Engine Type</label>
											<div class="controls">
												<input type="text" class="span6" id="engine_type" name="engine_type" value="<?=$veh['engine_type']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->



										
                                        <div class="control-group">											
											<label class="control-label" for="body_type">Body Type *</label>
											<div class="controls">
												<select class="span4" id="body_type" name="body_type">
													<option selected disabled value="">Select Body Type</option>

													<?php foreach($bodytype as $item){ ?>
														<option <?php if($veh['body_type'] == strtoupper($item['BodyStyleID1Name'])){echo 'selected';} ?> value="<?=strtoupper($item['BodyStyleID1Name'])?>"><?=strtoupper($item['BodyStyleID1Name'])?></option>
													<?php } ?>

												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										

                                        <div class="control-group">											
											<label class="control-label" for="make">Make *</label>
											
											<div class="controls">
												<select class="span4" id="make" name="make" onchange="load_models_by_name(this.value);">
													<option disabled selected value="">Select any Make</option>
													<?php foreach($makes as $item){ ?>
														<option <?php if(strtoupper($veh['make']) == strtoupper($item['make_name'])){echo 'selected';} ?> value="<?=$item['make_id']?>"><?=$item['make_name']?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        

                    <div class="control-group">											
											<label class="control-label" for="model">Model *</label>
											
											<div class="controls">
												<select class="span4" id="model" name="model">
													<option disabled selected value="">Select any Model</option>
														<?php foreach($models as $item){ ?>
														<option <?php if(strtoupper($veh['model']) == strtoupper($item)){echo 'selected';} ?> value="<?= $item?>"><?= $item ?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										

                     <div class="control-group">											
											<label class="control-label" for="fuel">Fuel</label>
											
											<div class="controls">
												<select class="span4" id="fuel" name="fuel">
													<option selected disabled value="">Select Fuel Type</option>
														<option <?php if($veh['fuel'] == "Gasoline"){echo 'selected';} ?> value="Gasoline">Gasoline</option>
														<option <?php if($veh['fuel'] == "Diesel"){echo 'selected';} ?> value="Diesel">Diesel</option>
														<option <?php if($veh['fuel'] == "Hybrid"){echo 'selected';} ?> value="Hybrid">Hybrid</option>
														<option <?php if($veh['fuel'] == "LPG"){echo 'selected';} ?> value="LPG">LPG</option>
														<option <?php if($veh['fuel'] == "Other"){echo 'selected';} ?> value="Other">Other</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										
                    <div class="control-group">											
											<label class="control-label" for="veh_condition">Condition</label>
											
											<div class="controls">
												<select class="span4" id="veh_condition" name="veh_condition">
													<option selected disabled value="">Select Condition</option>
														<option <?php if($veh['veh_condition'] == "Used"){echo 'selected';} ?> value="Used">Used</option>
														<option <?php if($veh['veh_condition'] == "New"){echo 'selected';} ?> value="New">New</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
																							
										
										
										
										

										<div class="control-group">
											<label class="control-label">Traction</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="" <?php if($veh['traction'] == ""){echo 'checked';} ?> > N/A
												</label>
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="2WD" <?php if($veh['traction'] == "2WD"){echo 'checked';} ?>> 2WD
												</label>
												<label class="radio inline">
													<input type="radio" id="traction" name="traction" value="4WD" <?php if($veh['traction'] == "4WD"){echo 'checked';} ?>> 4WD
												</label>
											</div>
										</div>										
																
										

										
										<div class="control-group">
											<label class="control-label">Drive</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="drive" name="drive" value="RHD"  <?php if($veh['drive'] == "RHD"){echo 'checked="checked"';} ?>> RHD
												</label>
												<label class="radio inline">
													<input type="radio" id="drive" name="drive" value="LHD" <?php if($veh['drive'] == "LHD"){echo 'checked="checked"';} ?>> LHD
												</label>
											</div>
										</div>										
										
										
                                        <div class="control-group">											
											<label class="control-label" for="month">Month</label>
											
											<div class="controls">
												<select class="span4" id="month" name="month">
													<option selected value="">Select Month</option>
													<?php for($i=1; $i<=12; $i++){ ?>
														<option <?php if($veh['month'] == $i){echo 'selected';} ?> value="<?=$i?>"><?=date("M", strtotime(date("2017-".$i."-01")))?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
										
                                        <div class="control-group">											
											<label class="control-label" for="year">Year</label>
											
											<div class="controls">
												<select class="span4" id="year" name="year">
													<?php for($i=date("Y"); $i>=1990; $i--){ ?>
														<option <?php if($veh['year'] == $i){echo 'selected';} ?> value="<?=$i?>"><?=$i?></option>
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
														<option <?php if($veh['doors'] == $i){echo 'selected';} ?> value="<?=$i?>"><?=$i?></option>
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
														<option <?php if($veh['seats'] == $i){echo 'selected';} ?> value="<?=$i?>"><?=$i?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										

										
										<div class="control-group">
											<label class="control-label" for="cc">CC</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="cc" name="cc" value="<?=$veh['cc']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="mileage">Mileage</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="mileage" name="mileage" value="<?=$veh['mileage']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
                                        <div class="control-group">											
											<label class="control-label" for="transmission">Transmission</label>
											
											<div class="controls">
												<select class="span4" id="transmission" name="transmission">
													<option selected disabled value="">Select Transmission</option>
													<?php foreach($transmission as $item){ ?>
													<option <?php if($veh['transmission'] == $item){echo 'selected';} ?> value="<?=$item?>"><?=$item?></option>
													<?php } ?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">
											<label class="control-label" for="gross_weight">Gross Weight</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="gross_weight" name="gross_weight" value="<?=$veh['gross_weight']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="net_weight">Net Weight</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="net_weight" name="net_weight" value="<?=$veh['net_weight']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="length">Length</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="length" name="length" value="<?=$veh['length']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="width">Width</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="width" name="width" value="<?=$veh['width']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="height">Height</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="height" name="height" value="<?=$veh['height']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="m3">M3</label>
											<div class="controls">
												<input type="number" step="any" class="span6" id="m3" name="m3" value="<?=$veh['m3']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">
											<label class="control-label" for="model_grade">Model Grade</label>
											<div class="controls">
												<input type="text" class="span6" id="model_grade" name="model_grade" value="<?=$veh['model_grade']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
                                        <div class="control-group">                     
                      <label class="control-label" for="exterior_color">Exterior Color</label>
                      <div class="controls">
                      <select class="span2" id="exterior_color" name="exterior_color">
                        <option selected disabled value="">Select Ext.Color</option>
                          <?php foreach($color as $item){ ?>
                          <option value="<?=strtoupper($item)?>" <?php if(strtoupper($item)==strtoupper($veh['exterior_color'])){echo ' selected=selected ';} ?>><?=strtoupper($item)?></option>
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
                          <option value="<?=strtoupper($item)?>" <?php if(strtoupper($item)==strtoupper($veh['interior_color'])){echo ' selected=selected ';} ?>><?=strtoupper($item)?></option>
                          <?php } ?>
                      </select>
                      </div>        
                    </div> <!-- /control-group -->												
										
										
										

<script>
document.getElementById('exterior_color_display').style.backgroundColor = '<?=@$exterior_color_code?>'; 
document.getElementById('interior_color_display').style.backgroundColor = '<?=@$interior_color_code?>'; 
</script>
										
																		
										<div class="control-group">
											<label class="control-label" for="remarks">Remarks</label>
											<div class="controls">
												<input type="text" class="span6" id="remarks" name="remarks"  value="<?=$veh['remarks']?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

                                        <div class="control-group">											
											<label class="control-label" for="status">Status</label>
											
											<div class="controls">
												<select class="span4" id="status" name="status">
													<option disabled value="">Select Current Status for Vehicle</option>
													<option selected value="AVAILABLE" <?php if($veh['status'] == "AVAILABLE"){echo 'selected';} ?> >AVAILABLE</option>
													<option value="BOOKED" <?php if($veh['status'] == "BOOKED"){echo 'selected';} ?> >BOOKED</option>
													<option value="SOLD" <?php if($veh['status'] == "SOLD"){echo 'selected';} ?> >SOLD</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										
										

										<div class="control-group">
											<label for="is_special" class="col-md-4 control-label">Special Offer Vehicle</label>
											<div class="radio inline">
												<input class="checkbox" type="checkbox" id="is_special" name="is_special" <?php if($veh['is_special']==1){echo ' checked=checked ';} ?> value="1" style="margin-top: -3px;">
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="description">Description</label>
											<div class="controls  span6" style="margin:0 20px;">
												<textarea id="EditorBox1" name="description"><?=$veh['description']?></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
																		
										
										
										<div class="control-group">
											<label class="control-label" for="description">Attributes</label>
											<div class="controls  span8" style="margin:0 20px;">
											
<?php foreach($features as $key=>$val) { ?>
		
		<label class="span2">
			<input type="checkbox" id="att_<?=$key?>" name="attributes[<?=$key?>]" value="YES" <?php if($val == "YES"){echo 'checked';} ?>> <?=strtoupper(str_replace("_", " ", $key)); ?>
		</label>
<?php } ?>											
											
											
											
											
											
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">
											<label class="control-label">Display on Website</label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" id="display_website" name="display_website" value="1" <?php if($veh['display_website'] == "1"){echo 'checked';} ?>> Yes
												</label>
												<label class="radio inline">
													<input type="radio" id="display_website" name="display_website" value="0" <?php if($veh['display_website'] == "0"){echo 'checked';} ?>> No
												</label>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="model_grade">Youtube Video Link</label>
											<div class="controls">
												<input type="text" class="span6" id="youtube_video_link" name="youtube_video_link" value="<?=$veh['youtube_video_link']?>" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										
										<div class="control-group">
											<label class="control-label">Images</label>
											<!-- <?php 
												//echo "<pre>";
												//print_r($images);
												//exit;
												 ?> -->
						<?php $attach_pics = array(); ?>
            <?php foreach($images as $img){ 

				$external_image_check = strpos($img['pic_url'],'http');
				
				if($external_image_check === false)
				$attach_pics[] = base_url('public/assets/admin/uploads/stock/')."/".$img['pic_url'];
				else
				$attach_pics[] = $img['pic_url'];

            }
			
			
            ?>	
										</div>
										
										<div class="control-group">
                                        	<label class="control-label"></label>
											<div id="images" orakuploader="on"></div>	
										</div>
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">update</button> 
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

<?php 

// include('adminPanel/vendors/ckeditor/standard.php');
// include('adminPanel/vendors/jquery/datepicker.php'); 

?>


<script>

$(document).ready(function(){
	$('#images').orakuploader({
		orakuploader : true,
		orakuploader_path : '<?=base_url('public/assets/admin/orakuploader/')?>',

		orakuploader_main_path : '<?=base_url('public/assets/admin/uploads/stock')?>',
		orakuploader_thumbnail_path : '<?=base_url('public/assets/admin/uploads/stock/thumbs')?>',
		
		orakuploader_use_main : true,
		orakuploader_use_sortable : true,
		orakuploader_use_dragndrop : true,
		<?php if(!empty($attach_pics)) { ?>
		orakuploader_attach_images : ['<?=implode("','",$attach_pics)?>'],
		<?php } ?>
		orakuploader_add_image : '<?=base_url('public/assets/admin/orakuploader/images/add.png')?>',
		orakuploader_add_label : 'Browser for images',
		
		orakuploader_resize_to	     : 800,
		orakuploader_thumbnail_size  : 184,
		
		orakuploader_main_changed    : function (filename) {
			$("#mainlabel-images").remove();
			$("div").find("[filename='" + filename + "']").append("<div id='mainlabel-images' class='maintext'>Main Image</div>");
		}

	});
});

</script>

<?=$this->endsection()?>
