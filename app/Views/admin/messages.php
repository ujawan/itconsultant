<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">  
  <div class="main-inner">      
    <div class="container">
        <div class="row">
          <div class="span12">
        
            <div class="widget ">
              <div class="widget widget-table action-table">
                <form method='post' action="<?= base_url('admin/messages') ?>" style="margin:0;">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                    <h3>Contact Messages</h3>
                  </div>
                </form>
          <!-- /widget-header -->
          <div class="widget-content">

            <?php if($result){ ?>

            <table class="table table-striped table-bordered" style="font-size:12px;">
            <thead>
              <tr>
              <th> S.NO </th>
              <th> Name </th>
              <th> Telephone </th>
              <th> Email </th>
              <th> Message </th>
              <th> Time </th>
              <th class="td-actions"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php $count = $offset+0; ?>
            <?php foreach($result as $data){ $count++;?>
        
        <tr>
              <td> <?=$count?> </td>
              <td> <?=$data['name']?> </td>
              <td> <?=$data['telephone']?> </td>
              <td> <?=$data['email']?> </td>
              <td> <?=$data['message']?> </td>
              <td> <?=$data['message_date']?> </td>
              <td class="td-actions">
        
         <a href="#delete<?=$data['message_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>
        
         <div id="delete<?=$data['message_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
          <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
          <h3 id="myModalLabel">Delete</h3>
        
          </div>
        
          <div class="modal-body">
        
          <p>Are you sure you want to delete this Message from list?</p>
        
          </div>
        
          <div class="modal-footer">
        
          <a href="<?=base_url('admin/messages_delete/'.$data['message_id']);?>" class="btn btn-danger">Delete</a>
        
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
        

        </div> <!-- /widget -->
        </div> <!-- /span8 -->
        
          </div> <!-- /row -->      </div> <!-- /container -->  </div> <!-- /main-inner --></div> <!-- /main -->

           <?=$this->endsection()?>