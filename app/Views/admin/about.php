<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h1 class="text-center mb-4">About Page Settings</h1>

        <?php foreach ($abouts as $about) : ?>
        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/aboutedit/1') ?>">
            <?= csrf_field() ?>

            <!-- About Image -->
            <div class="me-3">
                <label for="aboutImage" class="form-label">About Image</label>
                <input type="file" class="form-control" name="aboutImage" accept="image/*">
                <?php if (!empty($about['about_img'])) : ?>
                    <img src="<?= base_url('assets/img/' . $about['about_img']) ?>" alt="About Image" class="img-fluid mt-2" style="width: 200px; height: 200px;">
                <?php endif; ?>
            </div>

            <!-- About Heading -->
            <div class="mb-3">
                <label for="aboutHeading" class="form-label">About Heading</label>
                <textarea class="form-control" name="aboutHeading" rows="2"><?= esc($about['about_heading']) ?></textarea>
            </div>

            <!-- About Text -->
            <div class="mb-3">
                <label for="aboutText" class="form-label">About Text</label>
                <textarea class="form-control" name="aboutText" rows="5"><?= esc($about['about_text']) ?></textarea>
            </div>

            <!-- Check Points -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="aboutCheck1" class="form-label">Check Point 1</label>
                    <textarea class="form-control" name="aboutCheck1" rows="2"><?= esc($about['about_check1']) ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="aboutCheck2" class="form-label">Check Point 2</label>
                    <textarea class="form-control" name="aboutCheck2" rows="2"><?= esc($about['about_check2']) ?></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="aboutCheck3" class="form-label">Check Point 3</label>
                    <textarea class="form-control" name="aboutCheck3" rows="2"><?= esc($about['about_check3']) ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="aboutCheck4" class="form-label">Check Point 4</label>
                    <textarea class="form-control" name="aboutCheck4" rows="2"><?= esc($about['about_check4']) ?></textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="aboutPhoneText" class="form-label">Phone Text</label>
                    <textarea class="form-control" name="aboutPhoneText" rows="2"><?= esc($about['about_phone_text']) ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="aboutPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="aboutPhone" value="<?= esc($about['about_phone']) ?>">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>