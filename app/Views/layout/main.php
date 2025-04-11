<?php
/**
 * Main layout template
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->renderSection('title') ?> - IT Consulting</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
        <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicon_io/apple-touch-icon.png') ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon_io/favicon-32x32.png')?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon_io/favicon-16x16.png')?>">
<link rel="manifest" href="<?= base_url('assets/img/favicon_io//site.webmanifest')?>">
    
    <?= $this->renderSection('styles') ?>
    <style>
        .service-item {
            transition: .5s;
            margin: 0;
        }

        .service-item.shadow {
            transform: scale(1.1);
            margin: -10px;
            z-index: 1;
            background: #FFFFFF !important;
        }

        .service-item.shadow .service-icon {
            background: var(--primary) !important;
        }

        .service-item.shadow:hover {
            transform: scale(1.2);
        }

        .service-item:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <?= $this->include('inc/header') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('inc/footer') ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/lib/wow/wow.min.js') ?>"></script>
    <script src="<?= base_url('assets/lib/easing/easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?= base_url('assets/lib/counterup/counterup.min.js') ?>"></script>
    <script src="<?= base_url('assets/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <!-- Template Javascript -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>