<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="col-12 mb-4">
            <div class="hero text-white hero-bg-image hero-bg-parallax  background-walk-y position-relative" style="height:350px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 1);" data-background="<?= base_url(); ?>public/vendor/assets/img/unsplash/andre-benz-1214056-unsplash.jpg">
                <div class="hero-inner">
                    <div class="search-element">
                        <h5 class="text-light">Selamat datang <?= $user_session['nama_resto']; ?></h5>
                    </div>
                    <p class="lead">Lengkapi Profil Resto Anda</p>
                    <div class="mt-4">
                        <a href="<?= base_url('member/add_profil/'.$user_session['id']); ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Lengkapi Profil</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member</h4>
                        </div>
                        <div class="card-body">
                            <?= count($member); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>News</h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Reports</h4>
                        </div>
                        <div class="card-body">
                            1,201
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Online Users</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>