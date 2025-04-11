<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Why Choose Us Content</h6>
        </div>
        <div class="card-body">
            <?php foreach ($whychooseus as $feature) : ?>
            <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/whychooseusedit/1') ?>">
                <?= csrf_field() ?>

              
                <!-- Main Heading -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong><label>Feature Heading</label></strong>
                            <input type="text" class="form-control" name="featureHeading" 
                                   value="<?= esc($feature['feature_heading']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Feature 1 Name</label></strong>
                            <input type="text" class="form-control" name="featureName" 
                                   value="<?= esc($feature['feature_name']) ?>">
                                   <strong><label>Feature details</label></strong>
                            <textarea class="form-control mt-2" name="featureDetail" 
                                      rows="3" placeholder="Feature 1 Detail"><?= esc($feature['feature_detail']) ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Feature 2 Name</label></strong>
                            <input type="text" class="form-control" name="featureName2" 
                                   value="<?= esc($feature['feature_name2']) ?>">
                                   <strong><label>Feature details</label></strong>
                            <textarea class="form-control mt-2" name="featureDetail2" 
                                      rows="3" placeholder="Feature 2 Detail"><?= esc($feature['feature_detail2']) ?></textarea>
                        </div>
                    </div>
                </div>
                  <!-- Feature Image -->
                  <div class="form-group mb-4">
                    <strong><label>Feature Image</label></strong>
                    <div class="mb-2">
                        <img src="<?= base_url('assets/img/' . $feature['feature_img']) ?>" 
                             class="img-thumbnail" style="height: 200px;">
                    </div>
                    <input type="file" class="form-control" name="featureImage" accept="image/*">
                </div>


                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Feature 3 Name</label></strong>
                            <input type="text" class="form-control" name="featureName3" 
                                   value="<?= esc($feature['feature_name3']) ?>">
                                   <strong><label>Feature details</label></strong>
                            <textarea class="form-control mt-2" name="featureDetail3" 
                                      rows="3" placeholder="Feature 3 Detail"><?= esc($feature['feature_detail3']) ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Feature 4 Name</label></strong>
                            <input type="text" class="form-control" name="featureName4" 
                                   value="<?= esc($feature['feature_name4']) ?>">
                                   <strong><label>Feature details</label></strong>
                            <textarea class="form-control mt-2" name="featureDetail4" 
                                      rows="3" placeholder="Feature 4 Detail"><?= esc($feature['feature_detail4']) ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Content</button>
                </div>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>