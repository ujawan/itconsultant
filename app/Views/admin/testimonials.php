<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('warning') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Manage Testimonials</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
            <i class="fas fa-plus"></i> Add Testimonial
        </button>
    </div>

    <div class="row">
        <?php foreach ($testimonials as $testimonial) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <img src="<?= base_url('assets/img/' . $testimonial['testimonial_img']) ?>" 
                                 class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary">Testimonial #<?= $testimonial['testimonial_id'] ?></h6>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="deleteTestimonial(<?= $testimonial['testimonial_id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/testimonialsedit/' . $testimonial['testimonial_id']) ?>" 
                          method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label><strong>Client Name</strong></label>
                            <input type="text" class="form-control" name="client_name" 
                                   value="<?= esc($testimonial['client_name']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Position</strong></label>
                            <input type="text" class="form-control" name="client_position" 
                                   value="<?= esc($testimonial['client_position']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Testimonial</strong></label>
                            <textarea class="form-control" name="detail" rows="4" required><?= esc($testimonial['detail']) ?></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Image</strong></label>
                            <?php if (!empty($testimonial['testimonial_img'])) : ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('assets/img/' . $testimonial['testimonial_img']) ?>" 
                                         class="img-thumbnail" style="height: 100px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="testimonial_img" accept="image/*">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Update Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add Testimonial Modal -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/testimonials/add') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Client Name</label>
                        <input type="text" name="client_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Position</label>
                        <input type="text" name="client_position" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Testimonial</label>
                        <textarea name="detail" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="testimonial_img" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteTestimonial(id) {
    if (confirm('Are you sure you want to delete this testimonial?')) {
        window.location.href = '<?= site_url('admin/testimonials/delete/') ?>' + id;
    }
}
</script>

<?= $this->endSection() ?>