<?=$this->extend('admin/master/layout')?>
<?=$this->section('content')?>
	<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                     <?php if(session()->getTempdata('success')){?>
                    <div class="alert alert-success"><?php echo session()->getTempdata('success'); ?></div>
                    <?php }elseif (session()->getTempdata('error')) {?>
                    <div class="alert alert-danger"><?php echo session()->getTempdata('error'); ?></div>
                    <?php } ?>
                    <div class="widget">
                        <div class="widget widget-table action-table">
                            <form method="post" action="<?= base_url('admin/testimonial') ?>">
                                <div class="widget-header">
                                    <i class="icon-th-list"></i>
                                    <h3>Testimonials</h3>
                                    <a style="text-align: right;" href="<?=base_url('admin/testimonials/create')?>" class="btn btn-primary">Create New</a>
                                    <input type="submit" name="submit" value="Submit" style="float: right; margin-top: 6px;" /> <input type="text" name="search" value="<?= @$search ?>" class="span4" style="float: right; margin-top: 6px;height: 19px;" />
                                </div>
                            </form>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Person Name</th>
                                            <th>Testimonials Words</th>
                                            <th>Picture</th>
                                            <th>Visibility Status</th>
                                            <th class="td-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=0;?>
                                        <?php foreach($result as $data){$count++;  ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><?=$data['testimonial_by']?></td>
                                            <td><?=$data['testimonial_desc']?></td>
                                            <td>
                                                <?php			if($data['testimonial_image']!=""){				?>
                                                <img src="<?=base_url('public/assets/admin/uploads/testimonials')."/".$data['testimonial_image']?> " style="max-height: 120px;" />
                                                <?php			}						?>
                                            </td>
                                            <td><?=$data['testimonial_visibility']?></td>
                                            <td class="td-actions">
                                                <a href="<?= base_url('admin/testimonials/edit/'.$data['testimonial_id'])?>" class="btn btn-info btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
                                                <a href="#delete<?=$data['testimonial_id']?>" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="btn-icon-only icon-remove"> </i></a>
                                                <div id="delete<?=$data['testimonial_id']?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Delete</h3>
                                                    </div>
                                                    <div class="modal-body"><p>Are you sure you want to delete this Testimonial?</p></div>
                                                    <div class="modal-footer">
                                                        <a href="<?=base_url('admin/testimonials/delete/'.$data['testimonial_id'])?>" class="btn btn-danger">Delete</a>
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- Paginate -->
                        <div style="margin-top: 10px;"><? //echo $pagination; ?></div>
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
<script>
	
</script>
<?=$this->endsection()?>


