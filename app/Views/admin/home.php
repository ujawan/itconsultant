<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h1 class="text-center mb-4">Home Edit</h1>

        

        <?php foreach ($records as $record) : ?>

           

        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/homeedit/1') ?>">
            <?= csrf_field() ?>

            <!-- Image Uploads -->
            <div class="d-flex justify-content-between mb-3">
                <div class="me-3">
                    <label for="background1" class="form-label">Background Image 1</label>
                    <input type="file" class="form-control" name="background1" accept="image/*">
                    <?php if (!empty($record['bkimg_1'])) : ?>
                        <img src="<?= base_url('assets/img/' . $record['bkimg_1']) ?>" alt="Background 1" class="img-fluid mt-2" style="width: 100px; height: 100px;">
                    <?php endif; ?>
                </div>
                <div class="me-3">
                    <label for="background2" class="form-label">Background Image 2</label>
                    <input type="file" class="form-control" name="background2" accept="image/*">
                    <?php if (!empty($record['bkimg_2'])) : ?>
                        <img src="<?= base_url('assets/img/' . $record['bkimg_2']) ?>" alt="Background 2" class="img-fluid mt-2" style="width: 100px; height: 100px;">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Text Areas -->
            <div class="mb-3">
                <label for="hero_small_heading" class="form-label">Hero Heading</label>
                <textarea class="form-control" name="hero_small_heading" rows="2"><?= esc($record['hero_small_heading']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="hero_heading" class="form-label">Hero Text</label>
                <textarea class="form-control" name="hero_heading" rows="3"><?= esc($record['hero_heading']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="happy_clients_text" class="form-label">Happy Clients Text</label>
                <textarea class="form-control" name="happy_clients_text" rows="3"><?= esc($record['happy_clients_text']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="happy_clients" class="form-label">Happy Clients</label>
                <textarea class="form-control" name="happy_clients" rows="3"><?= esc($record['happy_clients']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="projects_done_text" class="form-label">Projects Done Text</label>
                <textarea class="form-control" name="projects_done_text" rows="3"><?= esc($record['projects_done_text']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="projects_done" class="form-label">Projects Done</label>
                <textarea class="form-control" name="projects_done" rows="3"><?= esc($record['projects_done']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="win_awards_text" class="form-label">Win Awards Text</label>
                <textarea class="form-control" name="win_awards_text" rows="3"><?= esc($record['win_awards_text']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="win_awards" class="form-label">Win Awards</label>
                <textarea class="form-control" name="win_awards" rows="3"><?= esc($record['win_awards']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="services_heading" class="form-label">Services Heading</label>
                <textarea class="form-control" name="services_heading" rows="3"><?= esc($record['services_heading']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="pricing_heading" class="form-label">Pricing Heading</label>
                <textarea class="form-control" name="pricing_heading" rows="3"><?= esc($record['pricing_heading']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="testimonial_heading" class="form-label">Testimonial Heading</label>
                <textarea class="form-control" name="testimonial_heading" rows="3"><?= esc($record['testimonial_heading']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="team_heading" class="form-label">Team Heading</label>
                <textarea class="form-control" name="team_heading" rows="3"><?= esc($record['team_heading']) ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>


