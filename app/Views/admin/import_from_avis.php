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


          	<?php if (session()->getFlashdata('message')) : ?>
		    <div class="message alert alert-success">
		        <?= session()->getFlashdata('message') ?>
		    </div>
			<?php endif; ?>
      
      
            <div class="widget ">


          <div class="widget widget-table action-table">


            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Import Stock from AVIS</h3>
            </div>
            

          <!-- /widget-header -->
          <div class="widget-content">
          <input type="hidden" name="check_url" id="check_url" value="">
		        
<?php if($stock){ ?>

			<table id="import_table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th> # </th>
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
    
              /*switch($data['status'])
              {
                case 'SOLD'   : $class = 'text-red';    break;
                case 'BOOKED'   : $class = 'text-blue';   break;
                case 'AVAILABLE'  : $class = 'text-green';  break;
                default     : $class = '';        break;
              }*/
              $class = '';
              ?>
              
             <form method='post' action="<?= base_url('admin/vehicle/import_from_avis_submit') ?>" style="margin:0;">	
              
              <tr id="import_table_row_<?=$counter?>">
              <td> <?=$counter?> </td>
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
                    </tr>
                    <tr>
                    <td>Status</td>
                    <td class="<?=$class?>"><b><?=$data['status']?></b></td>
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
                    
                    
                  </table>

                  
                  
                  </div>
                  <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>
                </div>

                
              </td>

  
              <td class="td-actions">
               	
               	<input type="hidden" name="veh_id" value="<?=$data['veh_id']?>">

               	<div id="loading_img_<?=$counter?>" style="display: none"><img src="<?= base_url('public/assets/images/loading.gif');?>" alt="loading"></div>
                <button id="import_btn_<?=$counter?>" onclick="show_loader(<?=$counter?>)" type="submit" name="save" value="save" class="btn btn-info btn-small"><i class="btn-icon-only icon-save"> </i> Import</button>
                 
                
              </td>
              </tr>
              </form>
            <?php }

             ?>


            </tbody>
			<tfoot>
        <tr>
          <td colspan="12">
            <?php //echo $pager->links() ?>
          </td>
        </tr>
				
			</tfoot>
            </table>

<?php }else{?><h2 style="text-align:center; margin: 20px 0 20px 0;">No Vehicle To Import</h2><?php } ?>
            
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



  function show_loader(id){
  	$("#loading_img_"+id).show();
  	$("#import_btn_"+id).hide();
  	//$("#import_table_row_"+id).fadeOut(5000);
  }

  
</script>




<?=$this->endsection()?>

