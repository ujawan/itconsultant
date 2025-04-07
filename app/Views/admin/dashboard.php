<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php $stats = $stats ?? ['services' => 0, 'posts' => 0, 'team' => 0, 'testimonials' => 0]; ?>
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Welcome, <?= session()->get('adminUsername') ?>!</h1>
        <div>
            <a href="<?= site_url('admin/services/new') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Service
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-primary">
                            <i class="fas fa-cogs fa-2x"></i>
                        </div>
                        <h6 class="mb-0">Services</h6>
                    </div>
                    <h3 class="mb-0">12</h3>
                    <div class="small text-muted mt-2">Active services</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-success">
                            <i class="fas fa-blog fa-2x"></i>
                        </div>
                        <h6 class="mb-0">Blog Posts</h6>
                    </div>
                    <h3 class="mb-0">45</h3>
                    <div class="small text-muted mt-2">Published posts</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-info">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h6 class="mb-0">Team Members</h6>
                    </div>
                    <h3 class="mb-0">8</h3>
                    <div class="small text-muted mt-2">Active members</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="text-warning">
                            <i class="fas fa-quote-right fa-2x"></i>
                        </div>
                        <h6 class="mb-0">Testimonials</h6>
                    </div>
                    <h3 class="mb-0">24</h3>
                    <div class="small text-muted mt-2">Client reviews</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions and Recent Activities -->
    <div class="row g-4">
        <!-- Quick Actions -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="<?= site_url('admin/services/new') ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-plus-circle text-primary me-2"></i> Add New Service
                        </a>
                        <a href="<?= site_url('admin/blog/new') ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-edit text-success me-2"></i> Create Blog Post
                        </a>
                        <a href="<?= site_url('admin/team/new') ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-plus text-info me-2"></i> Add Team Member
                        </a>
                        <a href="<?= site_url('admin/testimonials/new') ?>" class="list-group-item list-group-item-action">
                            <i class="fas fa-comment-medical text-warning me-2"></i> Add Testimonial
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0">
                    <h5 class="mb-0">Recent Activities</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New service added</h6>
                                <small class="text-muted">Just now</small>
                            </div>
                            <p class="mb-1">IT Infrastructure Management</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Blog post published</h6>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                            <p class="mb-1">Top 10 Cybersecurity Trends</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New team member</h6>
                                <small class="text-muted">Yesterday</small>
                            </div>
                            <p class="mb-1">John Doe - Senior Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
