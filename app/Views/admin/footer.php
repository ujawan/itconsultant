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
            <h6 class="m-0 font-weight-bold text-primary">Edit Footer Information</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/footerupdate/1') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label">Footer Logo</label>
                    <?php if (!empty($footer['footer_logo'])): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('assets/img/' . $footer['footer_logo']) ?>" 
                                 alt="Current Logo" style="max-height: 100px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="footer_logo" accept="image/*">
                    <small class="text-muted">Recommended size: 200x60 pixels</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Footer Text</label>
                    <textarea class="form-control" name="footer_text" rows="4"><?= esc($footer['footer_text'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Footer</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>