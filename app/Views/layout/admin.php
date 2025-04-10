<?php
$uri = service('uri');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #333;
            padding: 0.8rem 1rem;
            margin: 0.2rem 0;
            border-radius: 0.25rem;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }
        .sidebar .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 8px;
        }
        .main-content {
            padding: 20px;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('admin/dashboard') ?>">IT Consulting Admin</a>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-user"></i> <?= session()->get('adminUsername') ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= site_url('admin/logout') ?>">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 bg-light sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'dashboard' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'headeraddress' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/headeraddress') ?>">
                                <i class="fas fa-list"></i> Header 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'headerlogo' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/headerlogo') ?>">
                                <i class="fas fa-image"></i> Header Logo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'home' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/home') ?>">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'about' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/about') ?>">
                                <i class="fas fa-info-circle"></i> About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'whychooseus' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/whychooseus') ?>">
                                <i class="fas fa-blog"></i> Why Choose Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'ourservices' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/ourservices') ?>">
                                <i class="fas fa-cogs"></i>Our Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'pricing' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/pricing') ?>">
                                <i class="fas fa-money-bill"></i> Pricing Plan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'quote' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/quote') ?>">
                                <i class="fas fa-blog"></i> Request Quote
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'testimonials' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/testimonials') ?>">
                                <i class="fas fa-quote-right"></i> Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'team' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/team') ?>">
                                <i class="fas fa-users"></i> Team Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'brand' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/brand') ?>">
                                <i class="fas fa-cog"></i> Brand Logo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'contact' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/contact') ?>">
                                <i class="fas fa-phone"></i> Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($uri->getSegment(2) === 'footer' ? 'active' : '') ?>" 
                               href="<?= site_url('admin/footer') ?>">
                                <i class="fas fa-cog"></i> Footer
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 main-content">
                <?php if(session()->getFlashdata('message')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
