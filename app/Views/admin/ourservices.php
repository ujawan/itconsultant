<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h1 class="text-center mb-4">Services Settings</h1>

        <?php foreach ($services as $service) : ?>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/servicesedit/1') ?>">
            <?= csrf_field() ?>

            <!-- Service Image -->
            <div class="mb-3">
                <label for="serviceImage" class="form-label">Service Image</label>
                <input type="file" class="form-control" name="serviceImage" accept="image/*">
                <?php if (!empty($service['service_img'])) : ?>
                    <img src="<?= base_url('assets/img/' . $service['service_img']) ?>" alt="Service Image" class="img-fluid mt-2" style="width: 200px; height: 200px;">
                <?php endif; ?>
            </div>

            <!-- Service Heading -->
            <div class="mb-3">
                <label for="serviceHeading" class="form-label">Service Heading</label>
                <input type="text" class="form-control" name="serviceHeading" value="<?= esc($service['service_heading']) ?>">
            </div>

            <!-- Service 1 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="serviceName" class="form-label">Service 1 Name</label>
                    <input type="text" class="form-control" name="serviceName" value="<?= esc($service['service_name']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="serviceDetail" class="form-label">Service 1 Detail</label>
                    <textarea class="form-control" name="serviceDetail" rows="3"><?= esc($service['service_detail']) ?></textarea>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="serviceName2" class="form-label">Service 2 Name</label>
                    <input type="text" class="form-control" name="serviceName2" value="<?= esc($service['service_name2']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="serviceDetail2" class="form-label">Service 2 Detail</label>
                    <textarea class="form-control" name="serviceDetail2" rows="3"><?= esc($service['service_detail2']) ?></textarea>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="serviceName3" class="form-label">Service 3 Name</label>
                    <input type="text" class="form-control" name="serviceName3" value="<?= esc($service['service_name3']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="serviceDetail3" class="form-label">Service 3 Detail</label>
                    <textarea class="form-control" name="serviceDetail3" rows="3"><?= esc($service['service_detail3']) ?></textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>