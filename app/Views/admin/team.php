<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manage Team Members</h1>

    <div class="row">
        <?php foreach ($teams as $team) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="<?= base_url('assets/img/' . $team['team_img']) ?>" 
                             class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary">Edit Team Member #<?= $team['team_id'] ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/teamedit/' . $team['team_id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><strong>Name</strong></label>
                            <input type="text" class="form-control" name="team_name" 
                                   value="<?= esc($team['name']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Position</strong></label>
                            <input type="text" class="form-control" name="team_position" 
                                   value="<?= esc($team['designation']) ?? '' ?>">
                        </div>

                        <div class="form-group mt-3">
                        <label><strong>Image</strong></label>
                        <div class="mb-2">
                            <img src="<?= base_url('assets/img/' . $team['team_img']) ?>" 
                                class="img-thumbnail" style="height: 100px;">
                        </div>
                        <input type="file" class="form-control" name="team_img" accept="image/*">
                        <small class="text-muted">Upload new image to change</small>
                    </div>

                        <div class="form-group mt-3">
                            <label><strong>Social Links</strong></label>
                            <input type="text" class="form-control mb-2" name="team_twitter" 
                                   value="<?= esc($team['team_twitter']) ?? '' ?>" placeholder="Twitter URL">
                            <input type="text" class="form-control mb-2" name="team_facebook" 
                                   value="<?= esc($team['team_facebook']) ?? '' ?>" placeholder="Facebook URL">
                            <input type="text" class="form-control mb-2" name="team_insta" 
                                   value="<?= esc($team['team_insta']) ?? '' ?>" placeholder="Instagram URL">
                            <input type="text" class="form-control" name="team_linkedin" 
                                   value="<?= esc($team['team_linkedin']) ?? '' ?>" placeholder="LinkedIn URL">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">Update Team Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>