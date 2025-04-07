<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">  
	<div class="main-inner">      
		<div class="container">        
			<div class="row">          
				<div class="span12">                  
					 <?php if(session()->getFlashdata('success')){?>                 
						<div class="alert alert-success">                   
							<?php echo session()->getFlashdata('success'); ?>                 
						</div>                
						<?php }elseif (session()->getFlashdata('error')) {?>                  
							<div class="alert alert-danger">                   
								<?php echo session()->getFlashdata('error'); ?>                 
							</div>                
							<?php } ?>                        
							<div class="widget ">          
								<div class="widget widget-table action-table">          
									<form method='post' action="<?= base_url('admin/vehicle/make') ?>" style="margin:0;">            
										<div class="widget-header"> 
											<i class="icon-th-list"></i>              
											<h3>Vehicle Make</h3>              
											<a style="text-align:right;" href="<?= base_url('admin/vehicle/make/create')?>" class="btn btn-primary">Create New</a>
											<input type='submit' name='submit' value='Submit' style="float:right;margin-top: 6px"><input type='text' name='search' class="span4" value='<?= @$search ?>' style="float:right;margin-top: 1px">            
										</div>          
									</form><!-- /widget-header -->          
											<div class="widget-content">            
												<table class="table table-striped table-bordered">            
													<thead>              
														<tr>              
															<th> # </th>              
															<th> Vehicle Make </th>              
															<th class="td-actions"> Actions </th>              
														</tr>            
													</thead>            
													<tbody>                                                
														<?php



														   
														$counter = $offset+0;   

														foreach($result as $data)            {               
															$counter++; ?>                
															<tr>              
																<td> <?=$counter?> 
															</td>              
															<td> <?=$data['make_name']?> </td>              
															<td class="td-actions">                
																<a href="<?=base_url('admin/vehicle/make/edit/'.$data['make_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>                 <a href="#delete<?=$data['make_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>                
																<div id="delete<?=$data['make_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">                  
																	<div class="modal-header">                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>                  <h3 id="myModalLabel">Delete</h3>                  
																	</div>                  <div class="modal-body">                 

																	 <p>Are you sure you want to delete this Vehicle Make?</p>                 
																	  </div>                 
																	   <div class="modal-footer">                 
																	    <a href="<?=base_url('admin/vehicle/make/delete/'.$data['make_id'])?>" class="btn btn-danger">Delete</a>                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>                  
																	</div>                
																</div>                                                              
															</td>              
														</tr>            
														<?php } ?>            
													</tbody>
													<tfoot>
														<tr>
												          <td colspan="12">
												            <?= $pager->links() ?>
												          </td>
												        </tr>
													</tfoot>   
												</table>                     
											</div>         
											 <!-- /widget-content -->          
											  </div>                
											   </div> <!-- /widget -->        
											</div> <!-- /span -->                 
											 </div> <!-- /row -->      
											</div> <!-- /container -->  
										</div> <!-- /main-inner -->
									</div> <!-- /main -->

 <?=$this->endsection()?>
<?=$this->section('jquery')?>

<?=$this->endsection()?>