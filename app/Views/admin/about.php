<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit About Page Content</h6>
        </div>
        <div class="card-body">
            <?php foreach ($abouts as $about) : ?>
            <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/aboutedit/1') ?>">
                <?= csrf_field() ?>

                <!-- About Image -->
                <div class="form-group mb-4">
                    <strong><label>About Image</label></strong>
                    <div class="mb-2">
                        <img src="<?= base_url('assets/img/' . $about['about_img']) ?>" 
                             class="img-thumbnail" style="height: 200px;">
                    </div>
                    <input type="file" class="form-control" name="aboutImage" accept="image/*">
                </div>

                <!-- About Content -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong><label>About Heading</label></strong>
                            <input type="text" class="form-control" name="aboutHeading" 
                                   value="<?= esc($about['about_heading']) ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong><label>About Text</label></strong>
                            <textarea class="form-control" name="aboutText" rows="4"><?= esc($about['about_text']) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Check Points -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Check Point 1</label></strong>
                            <input type="text" class="form-control" name="aboutCheck1" 
                                   value="<?= esc($about['about_check1']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Check Point 2</label></strong>
                            <input type="text" class="form-control" name="aboutCheck2" 
                                   value="<?= esc($about['about_check2']) ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Check Point 3</label></strong>
                            <input type="text" class="form-control" name="aboutCheck3" 
                                   value="<?= esc($about['about_check3']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Check Point 4</label></strong>
                            <input type="text" class="form-control" name="aboutCheck4" 
                                   value="<?= esc($about['about_check4']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Phone Text</label></strong>
                            <input type="text" class="form-control" name="aboutPhoneText" 
                                   value="<?= esc($about['about_phone_text']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Phone Number</label></strong>
                            <input type="text" class="form-control" name="aboutPhone" 
                                   value="<?= esc($about['about_phone']) ?>">
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