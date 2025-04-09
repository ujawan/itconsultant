<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Our Services<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Services</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Services</a>
                </div>
            </div>
        </div>
<?php foreach ($records as $record) : ?>
<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0"><?= $record['services_heading'] ?></h1>
            </div>
            <div class="row g-5">
                <?php foreach ($services as $service) : ?>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <h4 class="mb-3"><?= $service['service_name'] ?></h4>
                <p class="m-0"><?= $service['service_text'] ?></p>
                <a class="btn btn-lg btn-primary rounded" href="">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0"><?= $record['testimonial_heading'] ?></h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <?php foreach ($testimonials as $testimonial) : ?>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="<?= base_url('assets/img/' . $testimonial['testimonial_img']) ?>" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1"><?= $testimonial['client_name'] ?></h4>
                            <small class="text-uppercase"><?= $testimonial['client_position'] ?></small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <?= $testimonial['detail'] ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

     <!-- Vendor Start -->
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <?php foreach ($brand_logos as $brand_logo) : ?>
                    <img src="<?= base_url('assets/img/' . $brand_logo['brand_logo']) ?>" alt="">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    <?php endforeach; ?>
<?= $this->endSection() ?>
