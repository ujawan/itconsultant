<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manage Quote Section</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Quote Details</h6>
        </div>
        <?php foreach ($quotes as $quote) : ?>
        <div class="card-body">
            <form action="<?= base_url('admin/quoteedit/' . $quote['quote_id']) ?>" method="post">
                <div class="form-group">
                    <label><strong>Heading</strong></label>
                    <input type="text" class="form-control" name="quote_heading" value="<?= esc($quote['quote_heading']) ?? '' ?>">
                </div>
                <div class="form-group">
                    <br><label><strong>Check Point 1</strong></label>
                    <input type="text" class="form-control" name="quote_check1" value="<?= esc($quote['quote_check1']) ?? '' ?>">
                </div>
                <div class="form-group">
                    <br><label><strong>Check Point 2</strong></label>
                    <input type="text" class="form-control" name="quote_check2" value="<?= esc($quote['quote_check2']) ?? '' ?>">
                </div>
                <div class="form-group">
                    <br><label><strong>Description</strong></label>
                    <textarea class="form-control" name="quote_text" rows="4"><?= esc($quote['quote_text']) ?? '' ?></textarea>
                </div>
                <div class="form-group">
                    <br><label><strong>Phone Heading</strong></label>
                    <input type="text" class="form-control" name="quote_phone_heading" value="<?= esc($quote['quote_phone_heading']) ?? '' ?>">
                </div>
                <div class="form-group">
                    <br><label><strong>Phone Number</strong></label>
                    <input type="text" class="form-control" name="quote_phone" value="<?= esc($quote['quote_phone']) ?? '' ?>">
                </div><br>
                <button type="submit" class="btn btn-primary">Update Quote Section</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>