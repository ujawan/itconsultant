<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Home Page Content</h6>
        </div>
        <div class="card-body">
            <?php foreach ($records as $record) : ?>
            <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/homeedit/1') ?>">
                <?= csrf_field() ?>

                <!-- Background Images -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Background Image 1</label></strong>
                            <div class="mb-2">
                                <img src="<?= base_url('assets/img/' . $record['bkimg_1']) ?>" 
                                     class="img-thumbnail" style="height: 100px;">
                            </div>
                            <input type="file" class="form-control" name="background1" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Background Image 2</label></strong>
                            <div class="mb-2">
                                <img src="<?= base_url('assets/img/' . $record['bkimg_2']) ?>" 
                                     class="img-thumbnail" style="height: 100px;">
                            </div>
                            <input type="file" class="form-control" name="background2" accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- Hero Section -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Hero Small Heading</label></strong>
                            <input type="text" class="form-control" name="hero_small_heading" 
                                   value="<?= esc($record['hero_small_heading']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Hero Main Heading</label></strong>
                            <input type="text" class="form-control" name="hero_heading" 
                                   value="<?= esc($record['hero_heading']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong><label>Happy Clients Text</label></strong>
                            <input type="text" class="form-control" name="happy_clients_text" 
                                   value="<?= esc($record['happy_clients_text']) ?>">
                            <input type="number" class="form-control mt-2" name="happy_clients" 
                                   value="<?= esc($record['happy_clients']) ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong><label>Projects Done Text</label></strong>
                            <input type="text" class="form-control" name="projects_done_text" 
                                   value="<?= esc($record['projects_done_text']) ?>">
                            <input type="number" class="form-control mt-2" name="projects_done" 
                                   value="<?= esc($record['projects_done']) ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <strong><label>Win Awards Text</label></strong>
                            <input type="text" class="form-control" name="win_awards_text" 
                                   value="<?= esc($record['win_awards_text']) ?>">
                            <input type="number" class="form-control mt-2" name="win_awards" 
                                   value="<?= esc($record['win_awards']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Section Headings -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Services Heading</label></strong>
                            <input type="text" class="form-control" name="services_heading" 
                                   value="<?= esc($record['services_heading']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Pricing Heading</label></strong>
                            <input type="text" class="form-control" name="pricing_heading" 
                                   value="<?= esc($record['pricing_heading']) ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Testimonial Heading</label></strong>
                            <input type="text" class="form-control" name="testimonial_heading" 
                                   value="<?= esc($record['testimonial_heading']) ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong><label>Team Heading</label></strong>
                            <input type="text" class="form-control" name="team_heading" 
                                   value="<?= esc($record['team_heading']) ?>">
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Content</button>
                </div>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>