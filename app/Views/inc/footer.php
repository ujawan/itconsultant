     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <a href="<?= base_url() ?>" class="navbar-brand">
        <?php if (!empty($footer['footer_logo'])): ?>
            <img src="<?= base_url('assets/img/' . $footer['footer_logo']) ?>" alt="Logo" class="img-fluid" style="max-height: 60px;">
        <?php endif; ?>
    </a>
    <p class="mt-3 mb-4"><?= $footer['footer_text'] ?></p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <?php if (!empty($headerAddress['header_address'])): ?>
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?= esc($headerAddress['header_address']) ?></small>
                <?php endif; ?>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <?php if (!empty($headerAddress['header_email'])): ?>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i><?= esc($headerAddress['header_email']) ?></small>
                <?php endif; ?>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <?php if (!empty($headerAddress['header_phone'])): ?>
                <small class="text-light"><i class="fa fa-phone-alt me-2"></i><?= esc($headerAddress['header_phone']) ?></small>
                <?php endif; ?>
                            </div>
                            <div class="d-flex mt-4">
                                <?php if (!empty($headerAddress['twitter_url'])): ?>
                <a class="btn btn-primary btn-square me-2" href="<?= esc($headerAddress['twitter_url']) ?>"><i class="fab fa-twitter fw-normal"></i></a>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['facebook_url'])): ?>
                <a class="btn btn-primary btn-square me-2" href="<?= esc($headerAddress['facebook_url']) ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['linkedin_url'])): ?>
                <a class="btn btn-primary btn-square me-2" href="<?= esc($headerAddress['linkedin_url']) ?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['instagram_url'])): ?>
                <a class="btn btn-primary btn-square me-2" href="<?= esc($headerAddress['instagram_url']) ?>"><i class="fab fa-instagram fw-normal"></i></a>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['youtube_url'])): ?>
                <a class="btn btn-primary btn-square" href="<?= esc($headerAddress['youtube_url']) ?>"><i class="fab fa-youtube fw-normal"></i></a>
                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="<?= base_url('') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="<?= base_url('about') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="<?= base_url('service') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light" href="<?= base_url('contact') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="<?= base_url('') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="<?= base_url('about') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="<?= base_url('service') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light" href="<?= base_url('contact') ?>"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="#">RZ Technologies</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
