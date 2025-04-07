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
							<h3>Edit Vehicle Make</h3>            
						</div> <!-- /widget-header -->                    
						<div class="widget-content">                        
							<div class="tabbable">              
								<div class="tab-content">                
									<form id="edit-profile" action="<?= base_url('admin/vehicle/make/update')?>" method="post" class="form-horizontal" enctype="multipart/form-data">                  
										<fieldset>                    
											<input type="hidden" id="make_id" name="make_id" required value="<?=$edit['make_id']?>">                    
											<div class="control-group">                      <label class="control-label" for="make_name">Vehicle Make Name *</label>                      <div class="controls">                        <input type="text" class="span6" id="make_name" name="make_name" required value="<?=$edit['make_name']?>">                      
											</div> <!-- /controls -->                           
										</div> <!-- /control-group -->                                         <br />                                                              <div class="form-actions">                      <button type="submit" class="btn btn-primary">Save</button>                       
											<a href="<?=base_url('admin/vehicle/make');?>" class="btn">Cancel</a>                    
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