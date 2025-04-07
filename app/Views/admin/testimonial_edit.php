<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">  
	<div class="main-inner">      
		<div class="container">        
			<div class="row">          
				<div class="span12">                  
					<?php //include(ADMINPATH.'assets/includes/messages.php'); ?>                  
					<div class="widget ">              
						<div class="widget-header">                
							<i class="icon-cog"></i>                
							<h3>Edit Testimonial</h3>            
						</div> <!-- /widget-header -->                    
						<div class="widget-content">                        
							<div class="tabbable">              
								<div class="tab-content">                
									<form id="edit-profile" action="<?=base_url('admin/testimonials/update')?>" method="post" class="form-horizontal" enctype="multipart/form-data">                  <fieldset>                    
										<input type="hidden" id="testimonial_id" name="testimonial_id" required value="<?=@$edit['testimonial_id']?>">                    <div class="control-group">                      
											<label class="control-label" for="testimonial_by">Testimonial By *</label>                      
											<div class="controls">                          
												<input type="text" class="span4" id="testimonial_by" name="testimonial_by" required value="<?=@$edit['testimonial_by']?>" style="width:37%">                      
											</div> <!-- /controls -->                           
										</div> <!-- /control-group -->

										<div class="control-group">                                           
											<label class="control-label" for="testimonial_desc">Testimonial Text *</label>                      
											<div class="controls">                        
												<div class="span4" style="margin:0;">
													<textarea class="span6" rows="7" name="testimonial_desc" required style="width: 98%;"><?=@$edit['testimonial_desc']?></textarea>
												</div>
											</div>
										</div>

	
										<div class="control-group">                      
											<label class="control-label" for="images">Photo</label>                      
											<div class="controls">                        
												<input type="file" class="span6" name="file">                 
											</div>                           
										</div>                                           
										<input type="hidden" name="old_img" value="<?=@$edit['testimonial_image']?>"> 
                                                                               
										
										<div class="control-group">
											<label class="control-label" for="testimonial_visibility">Visibility</label>                                            
													<div class="controls">                        
														<select class="span4" id="testimonial_visibility" name="testimonial_visibility">
															<option <?php if(@$edit['testimonial_visibility'] == "Show"){echo 'selected';} ?> value="Show">Show</option>  <option <?php if(@$edit['testimonial_visibility'] == "Hide"){echo 'selected';} ?> value="Hide">Hide</option>
														</select>                      
													</div>
										</div>

										

										 															<br />                                                              
															<div class="form-actions">                      
																<button type="submit" class="btn btn-primary">Save</button>                       
																<a href="<?=base_url('admin/testimonial/')?>" class="btn">Cancel</a>                    
															</div> <!-- /form-actions -->                  
														</fieldset>                
													</form>                                              </div>                                        
												</div>                      
											</div> <!-- /widget-content -->        
										</div> <!-- /widget -->        
									</div> <!-- /span8 -->                  
								</div> <!-- /row -->      
							</div> <!-- /container -->  
						</div> <!-- /main-inner -->
					</div> <!-- /main -->
					<?=$this->endsection()?>
					<script>$('#news_image').change( function(event) {    var tmppath = URL.createObjectURL(event.target.files[0]);    $("#news_image_show").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));});</script>