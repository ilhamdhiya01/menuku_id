<div id="app">
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-dark">
                <div class="p-4 m-3">
                    <img src="<?= base_url(); ?>public/vendor/assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="text-light font-weight-normal" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Welcome to <span class="font-weight-bold" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Menuku_id</span></h4>
                    <p class="text-muted" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);">Before you get started, you must login or register if you don't already have an account.</p>
                    <?= $this->session->flashdata('flash'); ?>
                    <form action="<?= base_url('auth/index'); ?>" method="POST">
                        <div class="form-group">
                            <label for="email" class="text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">Email</label>
                            <input id="email" type="text" class="form-control" value="<?= set_value('email'); ?>" name="email" autofocus>
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password1" class="control-label text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">Password</label>
                            </div>
                            <input id="password1" type="password" class="form-control" name="password1">
                            <small class="text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <div class="form-group text-right">
                            <a href="auth-forgot-password.html" class="float-left mt-3" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">
                                Forgot Password?
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                                Login
                            </button>
                        </div>

                        <div class="mt-5 text-center text-muted" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);">
                            Don't have an account? <a href="<?= base_url('auth/registrasi'); ?>" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">Create new one</a>
                        </div>
                    </form>

                    <div class="text-center mt-5 text-small text-muted">
                        Copyright &copy; Your Company. Made with 💙 by ilham
                        <div class="mt-2">
                            <a href="#">Privacy Policy</a>
                            <div class="bullet"></div>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 hero text-white hero-bg-image hero-bg-parallax min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(); ?>public/vendor/assets/img/unsplash/menu.jpg">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);">Welcom to Menuku_id</h1>
                            <h5 class="font-weight-normal text-muted-transparent" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Semarang, Indonesia</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>