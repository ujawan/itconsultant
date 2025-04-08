
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h1 class="text-center mb-4">Why Choose Us Settings</h1>

        <?php foreach ($whychooseus as $feature) : ?>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/whychooseusedit/1') ?>">
            <?= csrf_field() ?>

          

            <!-- Feature Heading -->
            <div class="mb-3">
                <label for="featureHeading" class="form-label">Feature Heading</label>
                <input type="text" class="form-control" name="featureHeading" value="<?= esc($feature['feature_heading']) ?>">
            </div>

            <!-- Feature 1 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="featureName" class="form-label">Feature 1 Name</label>
                    <input type="text" class="form-control" name="featureName" value="<?= esc($feature['feature_name']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="featureDetail" class="form-label">Feature 1 Detail</label>
                    <textarea class="form-control" name="featureDetail" rows="3"><?= esc($feature['feature_detail']) ?></textarea>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="featureName2" class="form-label">Feature 2 Name</label>
                    <input type="text" class="form-control" name="featureName2" value="<?= esc($feature['feature_name2']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="featureDetail2" class="form-label">Feature 2 Detail</label>
                    <textarea class="form-control" name="featureDetail2" rows="3"><?= esc($feature['feature_detail2']) ?></textarea>
                </div>
            </div>
              <!-- Feature Image -->
              <div class="mb-3">
                <label for="featureImage" class="form-label">Feature Image</label>
                <input type="file" class="form-control" name="featureImage" accept="image/*">
                <?php if (!empty($feature['feature_img'])) : ?>
                    <img src="<?= base_url('assets/img/' . $feature['feature_img']) ?>" alt="Feature Image" class="img-fluid mt-2" style="width: 200px; height: 200px;">
                <?php endif; ?>
            </div>

            <!-- Feature 3 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="featureName3" class="form-label">Feature 3 Name</label>
                    <input type="text" class="form-control" name="featureName3" value="<?= esc($feature['feature_name3']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="featureDetail3" class="form-label">Feature 3 Detail</label>
                    <textarea class="form-control" name="featureDetail3" rows="3"><?= esc($feature['feature_detail3']) ?></textarea>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="featureName4" class="form-label">Feature 4 Name</label>
                    <input type="text" class="form-control" name="featureName4" value="<?= esc($feature['feature_name4']) ?>">
                </div>
                <div class="col-md-6">
                    <label for="featureDetail4" class="form-label">Feature 4 Detail</label>
                    <textarea class="form-control" name="featureDetail4" rows="3"><?= esc($feature['feature_detail4']) ?></textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>
