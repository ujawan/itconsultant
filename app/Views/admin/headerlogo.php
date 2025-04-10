<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit header logo</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/headerlogo/' . $headerlogo['header_logo_id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label">Header Logo</label>
                    <?php if (!empty($headerlogo['logo_image'])): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('assets/img/' . $headerlogo['logo_image']) ?>" 
                                 alt="Current Logo" style="max-height: 100px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="logo_image" accept="image/*">
                    <small class="text-muted">Recommended size: 200x60 pixels</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Header Logo</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>