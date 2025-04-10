<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Contact Information</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/contactupdate/1') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Main Contact Information -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Contact Page Information</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Main Heading</label>
                                <input type="text" class="form-control" name="heading" 
                                       value="<?= esc($contact['heading'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone Information -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Phone Section</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone Heading</label>
                                <input type="text" class="form-control" name="phone_heading" 
                                       value="<?= esc($contact['phone_heading'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" 
                                       value="<?= esc($contact['phone'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Information -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Email Section</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Heading</label>
                                <input type="text" class="form-control" name="email_heading" 
                                       value="<?= esc($contact['email_heading'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" 
                                       value="<?= esc($contact['email'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Address Section</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Address Heading</label>
                                <input type="text" class="form-control" name="address_heading" 
                                       value="<?= esc($contact['address_heading'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" 
                                       value="<?= esc($contact['address'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Contact Information</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>