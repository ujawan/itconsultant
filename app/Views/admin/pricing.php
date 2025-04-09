<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manage Pricing Plans</h1>

    <div class="row">
        <?php foreach ($prices as $price) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Pricing Plan #<?= $price['pricing_id'] ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/pricingedit/' . $price['pricing_id']) ?>" method="post">
                        <div class="form-group">
                            <label><strong>Plan Name</strong></label>
                            <input type="text" class="form-control" name="pricing_plan" value="<?= esc($price['pricing_plan']) ?? '' ?>">
                        </div>
                        
                        <div class="form-group mt-3">
                            <label><strong>Description</strong></label>
                            <input type="text" class="form-control" name="pricing_text" value="<?= esc($price['pricing_text']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Price</strong></label>
                            <input type="number" class="form-control" name="price" value="<?= esc($price['price']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 1</strong></label>
                            <input type="text" class="form-control" name="pricing_check1" value="<?= esc($price['pricing_check1']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 2</strong></label>
                            <input type="text" class="form-control" name="pricing_check2" value="<?= esc($price['pricing_check2']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 3</strong></label>
                            <input type="text" class="form-control" name="pricing_check3" value="<?= esc($price['pricing_check3']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Feature 4</strong></label>
                            <input type="text" class="form-control" name="pricing_check4" value="<?= esc($price['pricing_check4']) ?? '' ?>">
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

<?= $this->endSection() ?>