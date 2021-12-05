<div class="col-lg-12 col-12 order-lg-12 hero text-white hero-bg-image hero-bg-parallax min-vh-50 background-walk-y position-relative" data-background="<?= base_url(); ?>public/vendor/assets/img/unsplash/food.jpg">
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url(); ?>public/vendor/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header bg-dark">
                                <h4 class="text-light">Registrasi</h4>
                            </div>

                            <div class="card-body bg-dark">
                                <form action="<?= base_url('auth/registrasi'); ?>" method="POST">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama_admin" class="text-light">Nama Admin</label>
                                            <input id="nama_admin" type="text" value="<?= set_value('nama_admin') ?>" class="form-control" name="nama_admin" autofocus>
                                            <small class="text-danger"><?= form_error('nama_admin'); ?></small>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nama_resto" class="text-light">Nama Restaurant</label>
                                            <input id="nama_resto" type="text" value="<?= set_value('nama_resto') ?>" class="form-control" name="nama_resto">
                                            <small class="text-danger"><?= form_error('nama_resto'); ?></small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="text-light">Email</label>
                                        <input id="email" type="text" value="<?= set_value('email') ?>" class="form-control" name="email">
                                        <small class="text-danger"><?= form_error('email'); ?></small>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password1" class="text-light">Password</label>
                                            <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                                            <small class="text-danger"><?= form_error('password1'); ?></small>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="text-light">Konfirmasi Password</label>
                                            <input id="password2" type="password" class="form-control" name="password2">
                                            <small class="text-danger"><?= form_error('password2'); ?></small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a href="<?= base_url('auth'); ?>" class="text-light">Kembali ke halaman login</a>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer text-light" style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);">
                            Copyright &copy; Ilham 2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>