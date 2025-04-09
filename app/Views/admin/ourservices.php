<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h1 class="text-center mb-4">Services Settings</h1>
        <?php foreach ($services as $service) : ?>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/servicesedit/' . $service['service_id']) ?>">
            <?= csrf_field() ?>
            
            <!-- Service 1 -->
            <div class="row mb-3">

            
                    <input type="hidden" class="form-control" name="serviceid" value="<?= esc($service['service_id']) ?>">
            
                <div class="col-md-6">
                   <strong> <label for="serviceName" class="form-label">Service Name</label></strong>
                    <input type="text" class="form-control" name="serviceName" value="<?= esc($service['service_name']) ?>">
                </div>
                <div class="col-md-6">
                   <strong> <label for="serviceDetail" class="form-label">Service Detail</label></strong>
                    <textarea class="form-control" name="serviceDetail" rows="3"><?= esc($service['service_text']) ?></textarea>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div> <hr>
        </form>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>