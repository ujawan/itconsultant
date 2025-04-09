<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manage Testimonials</h1>

    <div class="row">
        <?php foreach ($testimonials as $testimonial) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="<?= base_url('assets/img/' . $testimonial['testimonial_img']) ?>" 
                             class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary">Edit Testimonial #<?= $testimonial['testimonial_id'] ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/testimonialsedit/' . $testimonial['testimonial_id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><strong>Client Name</strong></label>
                            <input type="text" class="form-control" name="client_name" 
                                   value="<?= esc($testimonial['client_name']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Position</strong></label>
                            <input type="text" class="form-control" name="client_position" 
                                   value="<?= esc($testimonial['client_position']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Testimonial</strong></label>
                            <textarea class="form-control" name="detail" rows="4"><?= esc($testimonial['detail']) ?? '' ?></textarea>
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

<?= $this->endSection() ?>