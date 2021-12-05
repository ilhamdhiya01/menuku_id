<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
        height: 450px;
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

    @media (min-width: 576px) {}
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1>Edit Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Edit Profile</div>
            </div>
        </div>
        <?= form_open_multipart('member/edit_profile'); ?>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="border-radius: 20px;">
                        <!-- <div class="card-body"> -->
                        <div class="background">
                            <center>
                                <img src="<?= base_url('public/img/profile/' . $user_session['image']); ?>" style="width:90px; height:90px; margin-top:25%; border-radius:50%;" alt="">
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
                                    <div class=" text-small font-600-bold"><i class="fas fa-circle text-success"></i> <span>Administator</span></div>
                                </center>
                            <?php else : ?>
                                <center>
                                    <div class=" text-small font-600-bold"><i class="fas fa-circle text-success"></i> <span>Member</span></div>
                                </center>
                            <?php endif; ?>
                            <hr>
                            <!-- <form action="<?= base_url('member/edit_profile'); ?>" method="post" enctype="multipart/form-data"> -->
                            <div class="form-group ml-5">
                                <label for="image">Upload Foto Profil (.JPG, .PNG)</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                            <!-- </form> -->
                        </div>

                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" value="<?= $user_session['email']; ?>" readonly class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_admin">Nama Admin</label>
                                        <input type="text" class="form-control" value="<?= $user_session['nama_admin']; ?>" name="nama_admin" id="nama_admin">
                                        <small class="text-danger"><?= form_error('nama_admin'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_admin">Nama Resto</label>
                                        <input type="text" class="form-control" value="<?= $user_session['nama_resto']; ?>" name="nama_resto" id="nama_resto">
                                        <small class="text-danger"><?= form_error('nama_resto'); ?></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <?php if((is_null($data_null))) : ?>
                                        <div class="form-group">
                                            <label for="nama_admin">No Tlp</label>
                                            <input type="text" class="form-control" value="" readonly name="no_tlp" id="nama_resto">
                                            <small class="text-danger"><?= form_error('no_tlp'); ?></small>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <label for="nama_admin">No Tlp</label>
                                            <input type="text" class="form-control" value="<?= $profil['no_tlp']; ?>" readonly name="no_tlp" id="nama_resto">
                                            <small class="text-danger"><?= form_error('no_tlp'); ?></small>
                                        </div>
                                    <?php endif; ?>
                                    <?php if((is_null($data_null))) : ?>
                                    <div class="form-group">
                                        <label for="nama_admin">No Wa</label>
                                        <input type="text" class="form-control" value="" readonly name="no_tlp" id="nama_resto">
                                        <small class="text-danger"><?= form_error('no_tlp'); ?></small>
                                    </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                        <label for="nama_admin">No Wa</label>
                                        <input type="text" class="form-control" value="<?= $profil['no_wa']; ?>" readonly name="no_tlp" id="nama_resto">
                                        <small class="text-danger"><?= form_error('no_tlp'); ?></small>
                                    </div>
                                    <?php endif; ?>
                                    <?php if((is_null($data_null))) : ?>
                                    <div class="form-group">
                                        <label>About</label>
                                        <div class="col-sm-12 col-md-12">
                                            <textarea class="" value="" readonly name="alamat"></textarea>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                        <div class="form-group">
                                        <label>About</label>
                                        <div class="col-sm-12 col-md-12">
                                            <textarea class="" value="<?= $profil['alamat']; ?>" readonly name="alamat"><?= $profil['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right"><i class="fas fa-user-edit"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</div>