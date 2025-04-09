<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Manage Pricing Plans</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPricingModal">
            <i class="fas fa-plus"></i> Add New Plan
        </button>
    </div>

    <div class="row">
        <?php foreach ($prices as $price) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Plan #<?= $price['pricing_id'] ?></h6>
                    <button class="btn btn-danger btn-sm" onclick="deletePricing(<?= $price['pricing_id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/pricingedit/' . $price['pricing_id']) ?>" method="post">
                        <div class="form-group">
                            <label><strong>Plan Name</strong></label>
                            <input type="text" class="form-control" name="pricing_plan" value="<?= esc($price['pricing_plan']) ?>" required>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label><strong>Description</strong></label>
                            <input type="text" class="form-control" name="pricing_text" value="<?= esc($price['pricing_text']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Price</strong></label>
                            <input type="number" class="form-control" name="price" value="<?= esc($price['price']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 1</strong></label>
                            <input type="text" class="form-control" name="pricing_check1" value="<?= esc($price['pricing_check1']) ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 2</strong></label>
                            <input type="text" class="form-control" name="pricing_check2" value="<?= esc($price['pricing_check2']) ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 3</strong></label>
                            <input type="text" class="form-control" name="pricing_check3" value="<?= esc($price['pricing_check3']) ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 4</strong></label>
                            <input type="text" class="form-control" name="pricing_check4" value="<?= esc($price['pricing_check4']) ?>">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Update Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add Pricing Modal -->
<div class="modal fade" id="addPricingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Pricing Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/pricing/add') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Plan Name</label>
                        <input type="text" name="pricing_plan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="pricing_text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Feature 1</label>
                        <input type="text" name="pricing_check1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Feature 2</label>
                        <input type="text" name="pricing_check2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Feature 3</label>
                        <input type="text" name="pricing_check3" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Feature 4</label>
                        <input type="text" name="pricing_check4" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Plan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deletePricing(id) {
    if (confirm('Are you sure you want to delete this pricing plan?')) {
        window.location.href = '<?= site_url('admin/pricing/delete/') ?>' + id;
    }
}
</script>

<?= $this->endSection() ?>