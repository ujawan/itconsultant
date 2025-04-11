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

<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Services Settings</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                <i class="fas fa-plus"></i> Add Service
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Service Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $service['service_id'] ?></td>
                        <td><?= $service['service_name'] ?></td>
                        <td><?= $service['service_icon'] ?></td>
                        <td><?= substr($service['service_text'], 0, 100) ?>...</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                                    data-bs-target="#editService<?= $service['service_id'] ?>">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" 
                                    onclick="deleteService(<?= $service['service_id'] ?>)">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/services/add') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Service Name</label>
                        <input type="text" name="serviceName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Service Detail</label>
                        <textarea name="serviceDetail" class="form-control" rows="4" required></textarea>
                    </div>
                    <!-- Add this where your service form is -->
                    <div class="mb-3">
                        <label for="service_icon" class="form-label">Service Icon</label>
                        <select class="form-select" name="service_icon" id="service_icon">
                            <option value="fa-shield-alt" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-shield-alt' ? 'selected' : '' ?>>Shield</option>
                            <option value="fa-server" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-server' ? 'selected' : '' ?>>Server</option>
                            <option value="fa-laptop" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-laptop' ? 'selected' : '' ?>>Laptop</option>
                            <option value="fa-code" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-code' ? 'selected' : '' ?>>Code</option>
                            <option value="fa-database" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-database' ? 'selected' : '' ?>>Database</option>
                            <option value="fa-cloud" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-cloud' ? 'selected' : '' ?>>Cloud</option>
                            <option value="fa-network-wired" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-network-wired' ? 'selected' : '' ?>>Network</option>
                            <option value="fa-mobile-alt" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-mobile-alt' ? 'selected' : '' ?>>Mobile</option>
                            <option value="fa-cogs" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-cogs' ? 'selected' : '' ?>>Cogs</option>
                            <option value="fa-tools" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-tools' ? 'selected' : '' ?>>Tools</option>
                        </select>
     <div class="form-text">Preview: <i class="fa fa-shield-alt"></i></div>
   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Modals -->
<?php foreach ($services as $service): ?>
<div class="modal fade" id="editService<?= $service['service_id'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/servicesedit/' . $service['service_id']) ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Service Name</label>
                        <input type="text" name="serviceName" class="form-control" 
                               value="<?= $service['service_name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Service Detail</label>
                        <textarea name="serviceDetail" class="form-control" rows="4" required><?= $service['service_text'] ?></textarea>
                    </div>
                    <!-- Add this where your service form is -->
                    <div class="mb-3">
                        <label for="service_icon" class="form-label">Service Icon</label>
                        <select class="form-select" name="service_icon" id="service_icon">
                            <option value="fa-shield-alt" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-shield-alt' ? 'selected' : '' ?>>Shield</option>
                            <option value="fa-server" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-server' ? 'selected' : '' ?>>Server</option>
                            <option value="fa-laptop" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-laptop' ? 'selected' : '' ?>>Laptop</option>
                            <option value="fa-code" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-code' ? 'selected' : '' ?>>Code</option>
                            <option value="fa-database" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-database' ? 'selected' : '' ?>>Database</option>
                            <option value="fa-cloud" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-cloud' ? 'selected' : '' ?>>Cloud</option>
                            <option value="fa-network-wired" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-network-wired' ? 'selected' : '' ?>>Network</option>
                            <option value="fa-mobile-alt" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-mobile-alt' ? 'selected' : '' ?>>Mobile</option>
                            <option value="fa-cogs" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-cogs' ? 'selected' : '' ?>>Cogs</option>
                            <option value="fa-tools" <?= isset($service['service_icon']) && $service['service_icon'] == 'fa-tools' ? 'selected' : '' ?>>Tools</option>
                        </select>
                        <div class="form-text">Preview: <i class="fa <?= $service['service_icon'] ?? 'fa-shield-alt' ?>"></i></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
function deleteService(id) {
    if (confirm('Are you sure you want to delete this service?')) {
        window.location.href = '<?= site_url('admin/services/delete/') ?>' + id;
    }
}
</script>

<!-- Add this JavaScript at the bottom of the file -->
<script>
document.getElementById('service_icon').addEventListener('change', function() {
    const preview = this.parentElement.querySelector('.form-text');
    preview.innerHTML = `Preview: <i class="fa ${this.value}"></i>`;
});
</script>

<?= $this->endSection() ?>