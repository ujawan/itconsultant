<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Manage Team Members</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamModal">
            <i class="fas fa-plus"></i> Add Team Member
        </button>
    </div>

    <div class="row">
        <?php foreach ($teams as $team) : ?>
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <img src="<?= base_url('assets/img/' . $team['team_img']) ?>" 
                                 class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary">Team Member #<?= $team['team_id'] ?></h6>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="deleteTeam(<?= $team['team_id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/teamedit/' . $team['team_id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label><strong>Name</strong></label>
                            <input type="text" class="form-control" name="team_name" 
                                   value="<?= esc($team['name']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Position</strong></label>
                            <input type="text" class="form-control" name="team_position" 
                                   value="<?= esc($team['designation']) ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Image</strong></label>
                            <div class="mb-2">
                                <img src="<?= base_url('assets/img/' . $team['team_img']) ?>" 
                                     class="img-thumbnail" style="height: 100px;">
                            </div>
                            <input type="file" class="form-control" name="team_img" accept="image/*">
                        </div>

                        <div class="form-group mt-3">
                            <label><strong>Social Links</strong></label>
                            <input type="url" class="form-control mb-2" name="team_twitter" 
                                   value="<?= esc($team['team_twitter']) ?>" placeholder="Twitter URL">
                            <input type="url" class="form-control mb-2" name="team_facebook" 
                                   value="<?= esc($team['team_facebook']) ?>" placeholder="Facebook URL">
                            <input type="url" class="form-control mb-2" name="team_insta" 
                                   value="<?= esc($team['team_insta']) ?>" placeholder="Instagram URL">
                            <input type="url" class="form-control" name="team_linkedin" 
                                   value="<?= esc($team['team_linkedin']) ?>" placeholder="LinkedIn URL">
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

<!-- Add Team Modal -->
<div class="modal fade" id="addTeamModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/team/add') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="team_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Position</label>
                        <input type="text" name="team_position" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="team_img" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label>Social Links</label>
                        <input type="url" class="form-control mb-2" name="team_twitter" placeholder="Twitter URL">
                        <input type="url" class="form-control mb-2" name="team_facebook" placeholder="Facebook URL">
                        <input type="url" class="form-control mb-2" name="team_insta" placeholder="Instagram URL">
                        <input type="url" class="form-control" name="team_linkedin" placeholder="LinkedIn URL">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteTeam(id) {
    if (confirm('Are you sure you want to delete this team member?')) {
        window.location.href = '<?= site_url('admin/team/delete/') ?>' + id;
    }
}
</script>

<?= $this->endSection() ?>