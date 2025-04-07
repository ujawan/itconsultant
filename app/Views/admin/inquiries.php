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
                <?php } ?> 
      

            <div class="widget ">

          <div class="widget widget-table action-table">
          <form method='post' action="<?= base_url('admin/messages') ?>" style="margin:0;">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Inquiry Messages</h3>
            </div>
          </form>

          <!-- /widget-header -->
          <div class="widget-content">

            <?php if($data){ ?>

            <table class="table table-striped table-bordered" style="font-size:1em;">
            <thead>
              <tr>
              <th> S.NO </th>
              <th> Name </th>
              <th> Message </th>
              <th> Vehicle Link </th>

              <th> Email </th>
              <th> Phone </th>
              <th> Time </th>
              <th class="td-actions"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php $count=0;?>
            <?php foreach($data as $data){ $count++;?>
  
              <tr>
              <td nowrap> <?=$count?> </td>
              <td nowrap> <?=$data['name']?> </td>
              <td> <?=$data['message']?> </td>

              <?php if(!empty($data['slug'])){ ?>
                <td nowrap> <a href="<?= $data['slug']?>" target="_blank">Vehicle Link</a> </td>
              <?php }else{ ?>
                <td nowrap style="color:red"> Vehicle Not Exists </td>
              <?php } ?>
              <td nowrap> <?=$data['email']?> </td>
              <td nowrap> <?=$data['phone']?> </td>
              <td nowrap> <?=$data['created_at']?> </td>
              <td class="td-actions">



                 <a href="#delete<?=$data['inquiry_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>
                 <div id="delete<?=$data['inquiry_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Delete</h3>
                  </div>
                  <div class="modal-body">
                  <p>Are you sure you want to delete this Inquiry from list?</p>
                  </div>
                  <div class="modal-footer">
                  <a href="<?=base_url('admin/inquiries/delete/'.$data['inquiry_id'])?>" class="btn btn-danger">Delete</a>
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

        </div> <!-- /widget -->
        </div> <!-- /span8 -->
          
        </div> <!-- /row -->
      </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->
<?=$this->endsection()?>
<?=$this->section('jquery')?>

<?=$this->endsection()?>
