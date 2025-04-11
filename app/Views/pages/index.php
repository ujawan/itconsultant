<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php foreach ($records as $record) : ?>
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('assets/img/' . $record['bkimg_1']) ?>" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?= $record['hero_small_heading'] ?></h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?= $record['hero_heading'] ?></h1>
                        <a href="<?= base_url('contact') ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?= base_url('assets/img/' . $record['bkimg_2']) ?>" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?= $record['hero_small_heading'] ?></h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?= $record['hero_heading'] ?></h1>
                        <a href="<?= base_url('contact') ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

  <!-- Facts Start -->
  <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0"><?= $record['happy_clients_text'] ?></h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up"><?= $record['happy_clients'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0"><?= $record['projects_done_text'] ?></h5>
                            <h1 class="mb-0" data-toggle="counter-up"><?= $record['projects_done'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0"><?= $record['win_awards_text'] ?></h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up"><?= $record['win_awards'] ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Facts Start -->
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
                    <a href="<?= base_url('contact') ?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
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
    <?php foreach ($features as $feature) : ?>

  <!-- Features Start -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
                <h1 class="mb-0"><?= $feature['feature_heading'] ?></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4><?= $feature['feature_name'] ?></h4>
                            <p class="mb-0"><?= $feature['feature_detail'] ?></p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4><?= $feature['feature_name2'] ?></h4>
                            <p class="mb-0"><?= $feature['feature_detail2'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('assets/img/' . $feature['feature_img']) ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4><?= $feature['feature_name3'] ?></h4>
                            <p class="mb-0"><?= $feature['feature_detail3'] ?></p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4><?= $feature['feature_name4'] ?></h4>
                            <p class="mb-0"><?= $feature['feature_detail4'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
    <!-- Features End -->

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
                                <i class="fa <?= $service['service_icon'] ?? 'fa-shield-alt' ?> text-white"></i>
                            </div>
                            <h4 class="mb-3"><?= $service['service_name'] ?></h4>
                            <p class="m-0"><?= $service['service_text'] ?></p>
                            <a class="btn btn-lg btn-primary rounded" href="<?= base_url('service') ?>">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Pricing Plans</h5>
                <h1 class="mb-0"><?= $record['pricing_heading'] ?></h1>
            </div>
            <div class="row g-0 gy-4">
    <?php foreach ($pricings as $key => $pricing) : ?>
        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
            <?php if ($key == 1): ?>
                <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
            <?php else: ?>
                <div class="bg-light rounded">
            <?php endif; ?>
                <div class="border-bottom py-4 px-5 mb-4">
                    <h4 class="text-primary mb-1"><?= $pricing['pricing_plan'] ?></h4>
                    <small class="text-uppercase"><?= $pricing['pricing_text'] ?></small>
                </div>
                <div class="p-5 pt-0">
                    <h1 class="display-5 mb-3">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small><?= $pricing['price'] ?>.00<small
                            class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                    </h1>
                    <div class="d-flex justify-content-between mb-3"><span><?= $pricing['pricing_check1'] ?></span><i class="fa fa-check text-primary pt-1"></i></div>
                    <div class="d-flex justify-content-between mb-3"><span><?= $pricing['pricing_check2'] ?></span><i class="fa fa-check text-primary pt-1"></i></div>
                    <div class="d-flex justify-content-between mb-3"><span><?= $pricing['pricing_check3'] ?></span><i class="fa fa-check text-primary pt-1"></i></div>
                    <div class="d-flex justify-content-between mb-2"><span><?= $pricing['pricing_check4'] ?></span><i class="fa fa-times text-danger pt-1"></i></div>
                    <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </div>
    </div>
    <!-- Pricing Plan End -->

<?php foreach ($quotes as $quote) : ?>
    <!-- Quote Start -->
    <div class="container-fluid form section py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0"><?= $quote['quote_heading'] ?></h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i><?= $quote['quote_check1'] ?></h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i><?= $quote['quote_check2'] ?></h5>
                        </div>
                    </div>
                    <p class="mb-4"><?= $quote['quote_text'] ?></p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?= $quote['quote_phone_heading'] ?></h5>
                            <h4 class="text-primary mb-0"><?= $quote['quote_phone'] ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form action="<?= base_url('quote/send') ?>" method="POST">
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

                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="name" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <select name="service" class="form-select bg-light border-0" style="height: 55px;" required>
                                        <option value="" selected disabled>Select A Service</option>
                                        <option value="Service 1">Service 1</option>
                                        <option value="Service 2">Service 2</option>
                                        <option value="Service 3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
<?php endforeach; ?>


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
    <?php endforeach; ?>
    <!-- Vendor End -->
<?= $this->endSection() ?>
