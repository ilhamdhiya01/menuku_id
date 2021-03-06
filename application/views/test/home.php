<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <!-- <img src="<?= base_url(); ?>public/live-dinner/images/slider-01.jpg" alt=""> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Live Dinner Restaurant</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <img src="<?= base_url(); ?>public/live-dinner/images/slider-02.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Live Dinner Restaurant</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <img src="<?= base_url(); ?>public/live-dinner/images/slider-03.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br>
                            trends to see any changes in performance over time.</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
<div class="about-section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                <div class="inner-column">
                    <h1>Welcome To <span>Live Dinner Restaurant</span></h1>
                    <h4>Little Story</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                    <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
                    <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="<?= base_url(); ?>public/live-dinner/images/about-img.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- End About -->

<!-- Start QT -->
<div class="qt-box qt-background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <p class="lead ">
                    " If you're not the one cooking, stay out of the way and compliment the chef. "
                </p>
                <span class="lead">Michael Strahan</span>
            </div>
        </div>
    </div>
</div>
<!-- End QT -->

<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Special Menu</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>

        <div class="row inner-menu-box">
            <div class="col-3">
                <?php foreach ($kategori_menu as $data) : ?>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-home-tab" data-toggle="" href="<?= base_url('resto/tampil_menu/' . $data['id']) ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?= $data['menu_kategori']; ?></a>
                        <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Drinks</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lunch</</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a> -->
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <?php foreach ($menu_makanan as $mm) : ?>
                                <div class="col-lg-4 col-md-6 special-grid drinks">
                                    <div class="gallery-single fix">
                                        <img src="<?= base_url('public/img/profile/' . $mm['gambar']) ?>" class="img-fluid" alt="Image">
                                        <div class="why-text">
                                            <h4><?= $mm['nama_makanan']; ?></h4>
                                            <?= $mm['keterangan']; ?>
                                            <h5> Rp. <?= number_format($mm['harga'], 2, ',', '.'); ?>,-</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Menu -->

<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Gallery</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-01.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-01.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-02.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-02.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-03.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-03.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-04.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-04.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-05.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-05.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="<?= base_url(); ?>public/live-dinner/images/gallery-img-06.jpg">
                        <img class="img-fluid" src="<?= base_url(); ?>public/live-dinner/images/gallery-img-06.jpg" alt="Gallery <?= base_url(); ?>public/live-dinner/Images">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->

<!-- Start Customer Reviews -->
<div class="customer-reviews-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Customer Reviews</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto text-center">
                <div id="reviews" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item text-center active">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="<?= base_url(); ?>public/live-dinner/images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
                            <h6 class="text-dark m-0">Web Developer</h6>
                            <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="<?= base_url(); ?>public/live-dinner/images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
                            <h6 class="text-dark m-0">Web Designer</h6>
                            <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="<?= base_url(); ?>public/live-dinner/images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
                            <h6 class="text-dark m-0">Seo Analyst</h6>
                            <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Customer Reviews -->

<!-- Start Contact info -->
<div class="contact-imfo-box">
    <div class="container">
        <div class="row">
            <div class="col-md-4 arrow-right">
                <i class="fa fa-volume-control-phone"></i>
                <div class="overflow-hidden">
                    <h4>Phone</h4>
                    <p class="lead">
                        +01 123-456-4590
                    </p>
                </div>
            </div>
            <div class="col-md-4 arrow-right">
                <i class="fa fa-envelope"></i>
                <div class="overflow-hidden">
                    <h4>Email</h4>
                    <p class="lead">
                        yourmail@gmail.com
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-map-marker"></i>
                <div class="overflow-hidden">
                    <h4>Location</h4>
                    <p class="lead">
                        800, Lorem Street, US
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Contact info -->