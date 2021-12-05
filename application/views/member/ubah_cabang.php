<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    }

    .gambar {
        width: 130px;
        height: 130px;
        margin: 10px 0;
    }

    @media (min-width: 992px) {
        .gambar {
            width: 180px;
            height: 180px;
            margin: 0 30px;
        }
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1><?= ucwords($menu); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Tabel <?= ucwords($menu); ?></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About <?= ucwords($menu); ?></h2>
            <p class="section-lead">
                You can adjust all <?= ucwords($menu); ?>s here
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="<?= base_url('member/add_profil/' . $user_session['id']); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Lengkapi Profil</a></li>
                                <li class="nav-item"><a href="<?= base_url('member/ubah_profil/' . $user_session['id']); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Ubah Profil</a></li>
                                <li class="nav-item"><a href="<?= base_url('member/cabang/' . $user_session['id']); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Cabang Resto</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i> Email</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i> System</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i> Automation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>General Settings</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('flash'); ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <input type="hidden" name="user_id" value="<?= $user_session['id']; ?>">
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <div class="col-sm-12 col-md-4">
                                                <img src="<?= base_url('public/img/profile/' . $data['gambar']); ?>" class="gambar">
                                            </div><br>
                                            <label for="gambar">Upload Foto Menu (.JPG, .PNG)</label>
                                            <input type="file" name="gambar" class="form-control-file" id="gambar">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Resto Cabang</label>
                                            <input type="text" name="nama_cabang" value="<?= $data['nama_cabang'] ?>" class="form-control">
                                            <small class="text-danger"><?= form_error('nama_cabang'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label>No Tlp</label>
                                            <input type="text" name="no_tlp" value="<?= $data['no_tlp'] ?>" class="form-control">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>No Wa</label>
                                            <input type="text" name="no_wa" value="<?= $data['no_wa'] ?>" class="form-control">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="summernote-simple" value="<?= $data['alamat_cabang'] ?>" name="alamat"><?= $data['alamat_cabang'] ?></textarea>
                                                <small class="text-danger"><?= form_error('alamat'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>About</label>
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="summernote-simple" value="<?= $data['about'] ?>" name="about"><?= $data['about'] ?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>