<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
        height: 450px;
    }

    .card-body {
        padding: 5px 5px;
    }

    .background {
        border: 1px solid aliceblue;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        padding: 20px 20px;
        height: 450px;
        border-radius: 20px;
        background-image: linear-gradient(#ff6e7f, #bfe9ff);
    }

    .background span {
        margin: 5px 0;
    }

    .btn {
        margin: 30px 0;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1>My Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">My Profile</div>
            </div>
        </div>
        <!-- <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1>Member Page</h1>
        </div> -->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="border-radius: 20px;">
                        <!-- <div class="card-body"> -->
                        <?= $this->session->flashdata('flash'); ?>
                        <div class="background">
                            <center>
                                <img src="<?= base_url('public/img/profile/' . $user_session['image']); ?>" style="width:90px; height:90px; margin-top:25%; border-radius:50%; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);" alt="">
                            </center>
                            <br>
                            <center>
                                <h5><?= $user_session['nama_admin']; ?></h5>
                            </center>
                            <center>
                                <span><?= $user_session['email']; ?></span>
                            </center>
                            <?php if ($user_session['level_id'] == 1) : ?>
                                <center>
                                    <div class=" text-small font-600-bold"><i class="fas fa-circle text-success"></i> <span>Developer</span></div>
                                </center>
                            <?php elseif ($user_session['level_id'] == 2) : ?>
                                <center>
                                    <div class=" text-small font-600-bold"><i class="fas fa-circle text-success"></i> <span>Administator</span></div>
                                </center>
                            <?php else : ?>
                                <center>
                                    <div class=" text-small font-600-bold"><i class="fas fa-circle text-success"></i> <span>Member</span></div>
                                </center>
                            <?php endif; ?><br><br>
                            <a href="<?= base_url('member/edit_profile/') . $user_session['id']; ?>" type="submit" class="btn btn-success btn-block" style="border-radius:20px;"><i class="fas fa-user-edit"></i> Edit Profile</a>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <!-- <div class="card-body"> -->
                        <!-- <div class="jumbotron background-walk-y " style="height:410px; background-size:cover;" data-background="<?= base_url(); ?>public/vendor/assets/img/unsplash/gunung.jpg">

                            </div> -->
                        <div class="hero text-white hero-bg-image  background-walk-y position-relative" style="height:450px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);" data-background="<?= base_url(); ?>public/vendor/assets/img/unsplash/gunung.jpg">
                            <div class="hero-inner">
                                <div class="search-element">
                                    <h5 class="text-light">Tentang <?= $user_session['nama_resto']; ?></h5>
                                </div><br>
                                <?php
                                if(is_null($data_null)):
                                ?>
                                <p class="lead"></p>
                                <?php else: ?>
                                    <p class="lead"><?= $profil['about']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>