<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">
			
			
							<!-- <?php //if($this->session->flashdata('success')){?>
                 <div class="alert alert-success">
                   <?php //echo $this->session->flashdata('success'); ?>
                 </div>
                <?php //}elseif ($this->session->flashdata('error')) {?>
                  <div class="alert alert-danger">
                   <?php //echo $this->session->flashdata('error'); ?>
                 </div>
                <?php //} ?> -->

			
			
	      		<div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-cog"></i>
	      				<h3>Create Testimonial</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
							<div class="tab-content">
								<form id="edit-profile" action="<?=base_url('admin/testimonials/store')?>" method="post" class="form-horizontal" enctype="multipart/form-data">
									<fieldset>


										<div class="control-group">
											<label class="control-label" for="testimonial_by">Testimonial By *</label>
											<div class="controls">
													<input type="text" class="span4" id="testimonial_by" name="testimonial_by" required value="" style="width:37%">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="testimonial_text">Testimonial Text *</label>
											<div class="controls">
												<div class="span4" style="margin:0;">
													<textarea name="testimonial_text" rows="6" cols="50" required="required" style="width: 98%;"></textarea>
												</div> <!-- /controls -->
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

										<div class="control-group">
										 		<label class="control-label" for="testimonial_image">Photo</label>                      
										 		<div class="controls">                        
										 			<div style="margin:0;">                          
										 				<input class="span6" type="file" id="testimonial_image" name="file" >
										 				</div>
										 			</div>
										 	</div>
									

                  	<div class="control-group">											
											<label class="control-label" for="testimonial_visibility">Visibility</label>
											
											<div class="controls">
												<select class="span4" id="testimonial_visibility" name="testimonial_visibility">
													<option value="Show">Show</option>
													<option value="Hide">Hide</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
											<a href="<?=base_url('admin/testimonials')?>" class="btn">Cancel</a>
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
