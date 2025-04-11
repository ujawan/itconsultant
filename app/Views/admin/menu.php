<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('warning') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Menu Management</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-list me-1"></i>
            Menu Items
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                Add New Menu
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Menu Name</th>
                        <th>URL</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td><?= $menu['menu_id'] ?></td>
                        <td><?= $menu['menu_name'] ?></td>
                        <td><?= $menu['url'] ?></td>
                        <td><?= $menu['order_num'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editMenu<?= $menu['menu_id'] ?>">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteMenu(<?= $menu['menu_id'] ?>)">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Menu Modal -->
<div class="modal fade" id="addMenuModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/menu/add') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Menu Name</label>
                        <input type="text" name="menu_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Order</label>
                        <input type="number" name="order_num" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Menu Modals -->
<?php foreach ($menus as $menu): ?>
<div class="modal fade" id="editMenu<?= $menu['menu_id'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= site_url('admin/menuedit/' . $menu['menu_id']) ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Menu Name</label>
                        <input type="text" name="menu_name" class="form-control" value="<?= $menu['menu_name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control" value="<?= $menu['url'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Order</label>
                        <input type="number" name="order_num" class="form-control" value="<?= $menu['order_num'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
function deleteMenu(menu_id) {
    if (confirm('Are you sure you want to delete this menu item?')) {
        window.location.href = '<?= site_url('admin/menu/delete/') ?>' + menu_id;
    }
}
</script>

<?= $this->endSection() ?>