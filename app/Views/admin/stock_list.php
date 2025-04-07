<?php 
	//print_r($stock);
	//exit;
 ?>
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
      
      
            <div class="widget ">


          <div class="widget widget-table action-table">

          <form method='post' action="<?= base_url('admin/stock') ?>" style="margin:0;">

            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Stock
		
				<a style="text-align:right;" href="<?=base_url('admin/stock/create')?>" class="btn btn-primary">Create New</a>
							 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Total Record: <?=$pager->getTotal()?> 
              
              </h3>

                <?= csrf_field() ?>
                <input id="clear" type="submit" name="clear" value="Clear" onclick="clearSearch();" class="btn btn-large btn-primary" style="float:right;">
                <input type="submit" name="submit" value="Search" class="btn btn-large" style="float:right"><!-- <i class="icon-search" style="margin:0;"></i> -->

                <input id="search" type="text" name="search" value="<?= $search ?>" class="span4" placeholder="Search..." style="float:right;">


            </div>

            </form>

          <!-- /widget-header -->
          <div class="widget-content">

      <?php if($stock){ ?>    

			<table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th> <input type="checkbox" id="checkAllbox" onclick="checkAll();" value="1"> </th>
                <th> # </th>
                <th> AVIS ID </th>
                <th> Stock No </th>
                <th> Picture </th>
                <th> Make </th>
                <th> Model </th>
                <th> Chassis  </th>
                <th> Year </th>
                <th> Status </th>
                 

				
                <th> Full Details  </th>
                <th class="td-actions"> Actions </th>
              </tr>
            </thead>
            <tbody>

            <?php 
                  
                  $counter = $offset+0; 

                  foreach($stock as $data)
                  {  

                    $counter++; 
                    
                    
    
              switch($data['status'])
              {
                case 'SOLD'   : $class = 'text-red';    break;
                case 'BOOKED'   : $class = 'text-blue';   break;
                case 'AVAILABLE'  : $class = 'text-green';  break;
                default     : $class = '';        break;
              }
              
              ?>
              
            
              <tr>

              <td> <input type="checkbox" name="veh[]" id="check<?=$data['veh_id']?>" value="<?=$data['veh_id']?>"> </td>
              <td> <?=$counter?> </td>
              <td> <?=$data['veh_id']?> </td>
              <td> <?=$data['stock_no']?> </td>
              <td>

                  <?php 
                  
                  if($data['featured_image'] == ''){ ?>

                    <img src="<?= base_url('public/assets/admin/uploads/stock/no_image.png') ?>" style="max-width:100px;">

                  <?php }elseif(strpos($data['featured_image'], 'http') === 0){ ?>

                    <img src="<?= $data['featured_image'] ?>" style="max-width:100px;">  

                  <?php }else{ ?>

                    <img src="<?= base_url('public/assets/admin/uploads/stock')."/".$data['featured_image'] ?>" style="max-width:100px;"> 

                  <?php } ?>

              </td>
              <td> <?=$data['make']?> </td>
              <td> <?=$data['model']?> </td>
              <td> <?=$data['chassis']?> </td>
              <td> <?=$data['year']?> </td>
              <td class="<?=$class?>"><b> <?=$data['status']?> </b></td>

			

              <td>

                 <a href="#modal<?=$data['veh_id']?>" role="button" class="btn" data-toggle="modal">View</a>
                 <div id="modal<?=$data['veh_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Vehicle Detail</h3>
                  </div>
                  <div class="modal-body">


                  <table class="table table-striped table-bordered">
                    <tr>
                    <td>Stock No.</td>
                    <td><?=$data['stock_no']?></td>
                    </tr>
                    <tr>
                    <td>Model Code</td>
                    <td><?=$data['model_code']?></td>
                    </tr>
                    <tr>
                    <td>Chassis</td>
                    <td><?=$data['chassis']?></td>
                    </tr>
                    <tr>
                    <td>Engine No</td>
                    <td><?=$data['engine_no']?></td>
                    </tr>
                    <tr>
                    <td>Engine Type</td>
                    <td><?=$data['engine_type']?></td>
                    </tr>
                    <tr>
                    <td>Body Type</td>
                    <td><?=$data['body_type']?></td>
                    </tr>
                    <tr>
                    <td>Body Type II</td>
                    <td><?=$data['body_type_II']?></td>
                    </tr>
                    <tr>
                    <td>Make</td>
                    <td><?=$data['make']?></td>
                    </tr>
                    <tr>
                    <td>Model</td>
                    <td><?=$data['model']?></td>
                    </tr>
                    <tr>
                    <td>Fuel</td>
                    <td><?=$data['fuel']?></td>
                    </tr>
                    <tr>
                    <td>Traction</td>
                    <td><?=$data['traction']?></td>
                    </tr>
                    <tr>
                    <td>Drive</td>
                    <td><?=$data['drive']?></td>
                    </tr>
                    <tr>
                    <td>Year</td>
                    <td><?=$data['year']?></td>
                    </tr>
                    <tr>
                    <td>Month</td>
                    <td><?=$data['month']?></td>
                    </tr>
                    <tr>
                    <td>Doors</td>
                    <td><?=$data['doors']?></td>
                    </tr>
                    <tr>
                    <td>Seats</td>
                    <td><?=$data['seats']?></td>
                    </tr>
                    <tr>
                    <td>CC</td>
                    <td><?=$data['cc']?></td>
                    </tr>
                    <tr>
                    <td>Mileage</td>
                    <td><?=$data['mileage']?></td>
                    </tr>
                    <tr>
                    <td>Transmission</td>
                    <td><?=$data['transmission']?></td>
                    </tr>
                    <tr>
                    <td>Gross Weight</td>
                    <td><?=$data['gross_weight']?></td>
                    </tr>
                    <tr>
                    <td>Net Weight</td>
                    <td><?=$data['net_weight']?></td>
                    </tr>
                    <tr>
                    <td>Length</td>
                    <td><?=$data['length']?></td>
                    </tr>
                    <tr>
                    <td>Width</td>
                    <td><?=$data['width']?></td>
                    </tr>
                    <tr>
                    <td>Height</td>
                    <td><?=$data['height']?></td>
                    </tr>
                    <tr>
                    <td>M3</td>
                    <td><?=$data['m3']?></td>
                    </tr>
                    <tr>
                    <td>Model Grade</td>
                    <td><?=$data['model_grade']?></td>
                    </tr>
                    <tr>
                    <td>Exterior Color</td>
                    <td><?=$data['exterior_color']?></td>
                    </tr>
                    <tr>
                    <td>Interior Color</td>
                    <td><?=$data['interior_color']?></td>
                    </tr>
                    <tr>
                    <td>Location</td>
                    <td><?=$data['location']?></td>
                    </tr>
                    <tr>
                    <td>Stock For</td>
                    <td><?=$data['stock_for']?></td>
                    </tr>
                    <tr>
                    <td>Remarks</td>
                    <td><?=$data['remarks']?></td>
                    </tr>
                    <tr>
                    <td>Price Type</td>
                    <td><?=$data['price_type']?></td>
                    </tr>
                    <tr>
                    <td>Status</td>
                    <td class="<?=$class?>"><b><?=$data['status']?></b></td>
                    </tr>
                    <tr>
                    <td>Rare Vehicle</td>
                    <td><?=$data['rare_vehicle']?></td>
                    </tr>
                    <tr>
                    <td>Description</td>
                    <td><?=$data['description']?></td>
                    </tr>
                    <tr>
                    <td>Display Website</td>
                    <td><?php if($data['display_website']==1){echo "Yes";}else{echo "No";}?></td>
                    </tr>
                    <tr>
                    <td>Added on</td>
                    <td><?=$data['added_on']?></td>
                    </tr>
                  <?php
                    if($data['updated_on']!= "0000-00-00 00:00:00"){
                  ?>
                    <tr>
                    <td>Updated on</td>
                    <td><?=$data['updated_on']?></td>
                    </tr>
                  <?php
                    }
                  ?>
                    <tr>
                    <td>Views</td>
                    <td><?=$data['views']?></td>
                    </tr>
                    <tr>
                    <td>Inquiries</td>
                    <td><?=$data['inquiries']?></td>
                    </tr>
                  </table>

                  
                  
                  </div>
                  <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>
                </div>

                
              </td>

  
              <td class="td-actions">
                <a href="<?=base_url('admin/stock/edit/'.$data['veh_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
				<!-- <?php //if($_SESSION['usertype']=="DEALER"){ ?>
                <a href="<?=base_url('admin/stock/editd/'.$data['veh_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
				<?php //}else{ ?>
                <a href="<?=base_url('admin/stock/edit/'.$data['veh_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
				<?php //} ?> -->


                 <a href="#delete<?= $data['veh_id'] ?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>

                 <div id="delete<?=$data['veh_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Delete</h3>
                  </div>
                  <div class="modal-body">
                  <p>Are you sure you want to delete this Vehicle?</p>
                  </div>
                  <div class="modal-footer">
                  <a href="<?=base_url('admin/stock/delete/'.$data['veh_id'])?>" class="btn btn-danger">Delete</a>
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
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
			
      <?php }else{?><h2 style="text-align:center; margin: 20px 0 20px 0;">No Record Found</h2><?php } ?>
            
          </div>
          <!-- /widget-content --> 
          </div>

       <?php //echo $pagination; ?>
         
        </div> <!-- /widget -->
        </div> <!-- /span8 -->
          
        </div> <!-- /row -->
      </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->


<script>

function clearSearch() {
  $("#search").val('');
}
  



  function checkAll()
    {
      if(document.getElementById('checkAllbox').checked == true)
      {
        <?php foreach($stock as $data){ ?>
          document.getElementById('check<?=$data['veh_id']?>').checked = true;
        <?php } ?>
      }
      else{
        <?php foreach($stock as $data){ ?>
          document.getElementById('check<?=$data['veh_id']?>').checked = false;
        <?php } ?>
      }
    }
</script>




<?=$this->endsection()?>

