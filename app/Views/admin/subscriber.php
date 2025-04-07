<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <?php if(session()->getFlashdata('success')){?>
                    <div class="alert alert-success"><?php echo session()->getFlashdata('success'); ?></div>
                    <?php }elseif (session()->getFlashdata('error')) {?>
                    <div class="alert alert-danger"><?php echo session()->getFlashdata('error'); ?></div>
                    <?php } ?>
                    <div class="widget">
                        <div class="widget widget-table action-table">
                            <form method="post" action="<?= base_url('admin/subscribers') ?>" style="margin:0;">
                                <div class="widget-header">
                                    <i class="icon-th-list"></i>
                                    <h3>Subscribers</h3>
                                    
                                </div>
                            </form>
                            <!-- /widget-header -->
                            <div class="widget-content">

                                <?php if($subscribers){ ?>

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:33px">S.NO</th>
                                            <th>Email</th>
                                            <th class="td-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $count=0;?>
                                        <?php foreach($subscribers as $data){ $count++; ?>
                                        <tr>
                                            <td style="width:33px"><?=$count?></td> 
                                            <td><?=$data['email']?></td>
                                            <td class="td-actions">
                                                <a href="#delete<?=$data['sub_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>
                                                <div id="delete<?=$data['sub_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Delete</h3>
                                                    </div>
                                                    <div class="modal-body"><p>Are you sure you want to delete this Subscriber?</p></div>
                                                    <div class="modal-footer">
                                                        <a href="<?=base_url('admin/subscriber/delete/'.$data['sub_id'])?>" class="btn btn-danger">Delete</a>
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
                        <!-- Paginate -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span8 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
<?=$this->endsection()?>
<?=$this->section('jquery')?>

<?=$this->endsection()?>
