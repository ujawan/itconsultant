<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">About</a>
                </div>
            </div>
        </div>
<!-- About Start -->
<!-- Facts Start -->



<?php foreach ($records as $record) : ?>



<?php foreach ($abouts as $about) : ?>
       <!-- About Start -->
       <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0"><?= $about['about_heading'] ?></h1>
                    </div>
                    <p class="mb-4"><?= $about['about_text'] ?></p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?= $about['about_check1'] ?></h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?= $about['about_check2'] ?></h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?= $about['about_check3'] ?></h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?= $about['about_check4'] ?></h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?= $about['about_phone_text'] ?></h5>
                            <h4 class="text-primary mb-0"><?= $about['about_phone'] ?></h4>
                        </div>
                    </div>
                    <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?= base_url('assets/img/' . $about['about_img']) ?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <?php endforeach; ?>
 <!-- Team Start -->
 <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0"><?= $record['team_heading'] ?></h1>
            </div>
            <div class="row g-5">
                <?php foreach ($teams as $team) : ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url('assets/img/' . $team['team_img']) ?>" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="<?= $team['team_twitter'] ?>"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="<?= $team['team_facebook'] ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="<?= $team['team_insta'] ?>"><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="<?= $team['team_linkedin'] ?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?= $team['name'] ?></h4>
                            <p class="text-uppercase m-0"><?= $team['designation'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
              
            </div>
        </div>
    </div>
    <!-- Team End -->

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
