<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>

<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">
			

			
		
			
			
			
	      		<div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Profile</h3>
	  				</div> <!-- /widget-header -->
					<?php 
						if (session()->getFlashdata('success')) {
								?>
								<p style="width: 699px;background: lightseagreen;;border: 0;color: white;margin-top: 12px;" class="alert text-danger">*<?=session()->getFlashdata('success')?></p>
								<?php
							}
					?>
					<div class="widget-content">
						
						<div class="tabbable">
							<div class="tab-content">

								<form id="edit-profile" action="<?=base_url('admin/profile/update')?>" method="post" class="form-horizontal">
									<?= csrf_field() ?>
									<fieldset>
										<input type="hidden" name="email" value="<?=(session()->get('email') ? session()->get('email'): '')?>">
									
									
									
										<div class="control-group">
											<label class="control-label" for="username">Email</label>
											<div class="controls">
												<input type="text" class="span6 disabled" id="username" required value="<?=(session()->get('email') ? session()->get('email'): '')?>" disabled>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="password">Password</label>
											<div class="controls">
												<input type="password" class="span6" id="current_password" name="current_password" required>
												<?php 
													if (session()->getFlashdata('current_password')) {
															?>
															<p style="width: 520px;background: white;border: 0;color: red;margin-top: -9px;" class="alert text-danger">*<?=session()->getFlashdata('current_password')?></p>
															<?php
														}
												 ?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="new_password">New Password</label>
											<div class="controls">
												<input type="password" class="span6" id="new_password" name="new_password" required value="" required minlength="8">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="conf_password">Confirm Password</label>
											<div class="controls">
												<input type="password" class="span6" id="conf_password" name="conf_password" required value="" required><?php 
													if (isset($validation)) {
														if ($validation->hasError('conf_password')) {
															?>
															<p style="width: 520px;background: white;border: 0;color: red;margin-top: -9px;" class="alert text-danger">*<?=$validation->getError('conf_password')?></p>
															<?php
														}
													}
												 ?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										
										
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Update</button> 
											<a href="<?=base_url('admin/dashboard')?>" class="btn">Cancel</a>
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