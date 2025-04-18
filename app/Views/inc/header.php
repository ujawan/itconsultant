
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

   <!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <?php if (!empty($headerAddress['header_address'])): ?>
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?= esc($headerAddress['header_address']) ?></small>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['header_phone'])): ?>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><?= esc($headerAddress['header_phone']) ?></small>
                <?php endif; ?>
                
                <?php if (!empty($headerAddress['header_email'])): ?>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i><?= esc($headerAddress['header_email']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <?php if (!empty($headerAddress['twitter_url'])): ?>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= esc($headerAddress['twitter_url']) ?>">
                    <i class="fab fa-twitter fw-normal"></i>
                </a>
                <?php endif; ?>

                <?php if (!empty($headerAddress['facebook_url'])): ?>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= esc($headerAddress['facebook_url']) ?>">
                    <i class="fab fa-facebook-f fw-normal"></i>
                </a>
                <?php endif; ?>

                <?php if (!empty($headerAddress['linkedin_url'])): ?>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= esc($headerAddress['linkedin_url']) ?>">
                    <i class="fab fa-linkedin-in fw-normal"></i>
                </a>
                <?php endif; ?>

                <?php if (!empty($headerAddress['instagram_url'])): ?>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= esc($headerAddress['instagram_url']) ?>">
                    <i class="fab fa-instagram fw-normal"></i>
                </a>
                <?php endif; ?>

                <?php if (!empty($headerAddress['youtube_url'])): ?>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="<?= esc($headerAddress['youtube_url']) ?>">
                    <i class="fab fa-youtube fw-normal"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="<?= base_url() ?>" class="navbar-brand p-0">
                <?php if (!empty($headerlogo['logo_image'])): ?>
                    <img src="<?= base_url('assets/img/' . $headerlogo['logo_image']) ?>" alt="Logo" class="img-fluid" style="max-height: 60px;">
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                    <a href="<?= base_url('about') ?>" class="nav-item nav-link">About</a>
                    <a href="<?= base_url('service') ?>" class="nav-item nav-link">Services</a>
                    <a href="<?= base_url('contact') ?>" class="nav-item nav-link">Contact</a>
                </div>
                <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            </div>
        </nav>
    </div>
    <!-- Navbar & Carousel End -->


     <!-- Full Screen Search Start -->
     <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
