<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">  <div class="main-inner">      
	<div class="container">        
		<div class="row">          
			<div class="span12">                  
				<?php //include(ADMINPATH.'assets/includes/messages.php'); ?>                        
				<div class="widget ">              
					<div class="widget-header">                
						<i class="icon-cog"></i>                
						<h3>Add Vehicle Model</h3>            
					</div> <!-- /widget-header -->                    
					<div class="widget-content">                        
						<div class="tabbable">              
							<div class="tab-content">                
								<form id="edit-profile" action="<?=base_url('admin/vehicle/model/store')?>" method="post" class="form-horizontal" enctype="multipart/form-data">                  
									<fieldset>                    
										<div class="control-group">
											<label class="control-label" for="model_name">Vehicle Model Name *</label>                      
											<div class="controls">
												<input type="text" class="span6" id="model_name" name="model_name" required value="" placeholder="e.g Allion">
											</div> <!-- /controls -->                           
										</div> <!-- /control-group -->                     
										<div class="control-group">                      
											<label class="control-label" for="make_id">Vehicle Make *</label>                      
											<div class="controls">                        
												<select class="span4" id="make_id" name="make_id" required>                          
													<option selected disabled value="">Select Vehicle Make</option>                          
													<?php foreach($make as $item){ ?>                            
													<option value="<?=$item['make_id']?>"><?=$item['make_name']?></option>                          
														<?php } ?>                        
													</select>                      
												</div> <!-- /controls -->                           
											</div> <!-- /control-group -->                                         
											<br />                     
											<div class="form-actions">                      
												<button type="submit" class="btn btn-primary">Save</button>                       
												<a href="<?=base_url('admin/vehicle/model');?>" class="btn">Cancel</a>                    
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

<?=$this->endsection()?>