<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Manage Brand Logos</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">
            <i class="fas fa-plus"></i> Add Brand Logo
        </button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <?php foreach ($brands as $brand) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" 
                                  action="<?= base_url('admin/brandedit/' . $brand['brand_id']) ?>">
                                <?= csrf_field() ?>

                                <div class="form-group text-center mb-3">
                                    <input type="hidden" name="brand_id" value="<?= $brand['brand_id'] ?>">
                                    <?php if (!empty($brand['brand_logo'])) : ?>
                                        <img src="<?= base_url('assets/img/' . $brand['brand_logo']) ?>" 
                                             class="img-thumbnail mb-2" style="height: 100px;">
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="brand_logo" accept="image/*">
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    <button type="button" class="btn btn-danger btn-sm" 
                                            onclick="deleteBrand(<?= $brand['brand_id'] ?>)">Delete</button>
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

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Brand Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/brand/add') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Brand Logo</label>
                        <input type="file" name="brand_logo" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteBrand(id) {
    if (confirm('Are you sure you want to delete this brand logo?')) {
        window.location.href = '<?= site_url('admin/brand/delete/') ?>' + id;
    }
}
</script>

<?= $this->endSection() ?>