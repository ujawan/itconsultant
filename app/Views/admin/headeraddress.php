<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Header Information</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/headeraddress/update') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Contact Information -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Contact Information</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="header_address" 
                                       value="<?= esc($headerAddress['header_address'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="header_phone" 
                                       value="<?= esc($headerAddress['header_phone'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="header_email" 
                                       value="<?= esc($headerAddress['header_email'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Social Media Links</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" name="twitter_url" 
                                       value="<?= esc($headerAddress['twitter_url'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" name="facebook_url" 
                                       value="<?= esc($headerAddress['facebook_url'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">LinkedIn URL</label>
                                <input type="url" class="form-control" name="linkedin_url" 
                                       value="<?= esc($headerAddress['linkedin_url'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" name="instagram_url" 
                                       value="<?= esc($headerAddress['instagram_url'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" name="youtube_url" 
                                       value="<?= esc($headerAddress['youtube_url'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Header Information</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>