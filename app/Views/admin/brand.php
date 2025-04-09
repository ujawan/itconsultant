<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Brand Logos</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($brands as $brand) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" 
                                  action="<?= base_url('admin/brandedit/' . $brand['brand_id']) ?>">
                                <?= csrf_field() ?>

                                <!-- Brand Logo -->
                                <div class="form-group text-center mb-3">
                                    <input type="hidden" name="brand_id" value="<?= $brand['brand_id'] ?>">
                                    <?php if (!empty($brand['brand_logo'])) : ?>
                                        <img src="<?= base_url('assets/img/' . $brand['brand_logo']) ?>" 
                                             class="img-thumbnail mb-2" style="height: 100px;">
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="brand_logo" accept="image/*">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>