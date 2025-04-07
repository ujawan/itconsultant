<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>



<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">

	      		<?php if(session()->getTempdata('success')){?>
                 <div class="alert alert-success">
                   <?php echo session()->getTempdata('success'); ?>
                 </div>
                <?php }elseif (session()->getTempdata('error')) {?>
                  <div class="alert alert-danger">
                   <?php echo session()->getTempdata('error'); ?>
                 </div>
            <?php }elseif(session()->getTempdata('update_success')){?>
                  <div class="alert alert-success">
                   <?php echo session()->getTempdata('update_success'); ?>
                 </div>
            <?php }elseif(session()->getTempdata('delete')){ ?>
                  <div class="alert alert-success">
                   <?php echo session()->getTempdata('delete'); ?>
                 </div>
            <?php } ?>

			
	      		<div class="widget">

				  <div class="widget widget-table action-table">
					<form action="" method="get" style="margin:0;">
						<div class="widget-header"> <i class="icon-th-list"></i>
						  <h3>Page Content</h3>
						  <a style="text-align:right;" href="<?=base_url('admin/content/create')?>" class="btn btn-primary">Create New</a> 
						</div>
					</form>
					<!-- /widget-header -->
					<div class="widget-content">

						<?php if($content){ ?>

					  <table class="table table-striped table-bordered">
						<thead>
						  <tr>
							<th> Route </th>
							<th> Criteria </th>
							<th> Content </th>
							<th> Meta title </th>
							<th> Meta description </th>
							<th> Meta h1 </th>
							<th> No Index </th>
							<th> Visibility </th>
							<th> Date </th>
							<th class="td-actions"> Actions </th>
						  </tr>
						</thead>
						<tbody>

						<?php
			            foreach($content as $data) {        
			      ?>
						  <tr>
							<td><a target="_blank" href="<?=base_url($data['route'])?>"><?=$data['route']?> </a></td>
							<td> <?=$data['criteria']?> </td>
							<td>
							   <a href="#modal<?=$data['content_id']?>" role="button" class="btn" data-toggle="modal">View</a>
							   <div id="modal<?=$data['content_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel">Content Text</h3>
								  </div>
								  <div class="modal-body">
									<p><?=$data['content']?></p>
								  </div>
								  <div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								  </div>
								</div>
							</td>
							<td> <?=$data['meta_title']?> </td>
							<td> <?=$data['meta_description']?> </td>
							<td> <?=$data['meta_h1']?> </td>
							<td> <?= $data['noindex'] ? "YES" : "NO" ?> </td>
							<td> <?php if($data['visibility']){echo "Show";}else{echo "Hidden";} ?> </td>
							<td> <?=$data['created_date']?> </td>



							<td class="td-actions">
							
								<a href="<?=base_url('admin/content/edit/'.$data['content_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>

							   <a href="#delete<?=$data['content_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>
							   <div id="delete<?=$data['content_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel">Delete</h3>
								  </div>
								  <div class="modal-body">
									<p>Are you sure you want to delete this Content?</p>
								  </div>
								  <div class="modal-footer">
									<a href="<?=base_url('admin/content/delete/'.$data['content_id'])?>" class="btn btn-danger">Delete</a>
									<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								  </div>
								</div>
							
							</td>
								
								
								
						  </tr>

						<?php } ?>

						</tbody>
					  </table>
			
						<?php }else{?><h2 style="text-align:center; margin: 20px 0 20px 0;">No Record Found</h2><?php } ?>

					</div>
					<!-- /widget-content --> 
				  </div>

					<?= $pager->links() ?>


				</div> <!-- /widget -->
		    </div> <!-- /span8 -->
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->

 <?=$this->endsection()?>

