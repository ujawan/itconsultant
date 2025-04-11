<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Admin Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative pb-3 mb-5">
                    <h1 class="mb-0">Admin Login</h1>
                </div>
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <div class="bg-light rounded p-5">
                    <form action="<?= base_url('admin/login') ?>" method="POST">
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" name="username" class="form-control border-0 px-4" placeholder="Username" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control border-0 px-4" placeholder="Password" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
