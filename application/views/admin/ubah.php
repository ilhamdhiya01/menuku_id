<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    }

    .gambar {
        width: 250px;
        height: 250px;
        margin: 10px 0;
    }

    @media (min-width: 992px) {
        .gambar {
            width: 250px;
            height: 250px;
            margin: 0 40px;
        }
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1><?= ucwords($menu); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('admin/member') ?>"><?= ucwords($menu); ?></a></div>
                <div class="breadcrumb-item">
                    <a href="<?= base_url('admin/member'); ?>"><i class="fas fa-angle-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $users['id']; ?>">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                            <div class="col-sm-12 col-md-4">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="image" id="image-upload" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <img src="<?= base_url('public/img/profile/' . $users['image']); ?>" class="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Admin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nama_admin" value="<?= $users['nama_admin']; ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('nama_admin'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Resto</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nama_resto" value="<?= $users['nama_resto']; ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('nama_resto'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="email" value="<?= $users['email']; ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('email'); ?></small>
                                            </div>
                                        </div>
                                        <input type="hidden" name="password" value="<?= $users['password']; ?>">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                                            <div class="custom-switches-stacked mt-2">
                                                <?php foreach ($role_id as $ri) : ?>
                                                    <?php if ($ri['id'] == $users['level_id']) : ?>
                                                        <label class="custom-switch">
                                                            <input type="radio" name="level_id" value="<?= $ri['id']; ?>" class="custom-switch-input" checked>
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description"><?= $ri['role']; ?></span>
                                                        </label>
                                                    <?php else : ?>
                                                        <label class="custom-switch">
                                                            <input type="radio" name="level_id" value="<?= $ri['id']; ?>" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description"><?= $ri['role']; ?></span>
                                                        </label>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aktifasi Akun</label>
                                            <div class="custom-switches-stacked mt-2">
                                                <?php foreach ($user_aktivasi as $ua) : ?>
                                                    <?php if ($ua['id_active'] == $users['is_active']) : ?>
                                                        <label class="custom-switch">
                                                            <input type="radio" name="is_active" value="<?= $ua['id']; ?>" class="custom-switch-input" checked>
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description"><?= $ua['keterangan']; ?></span>
                                                        </label>
                                                    <?php else : ?>
                                                        <label class="custom-switch">
                                                            <input type="radio" name="is_active" value="<?= $ua['id']; ?>" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description"><?= $ua['keterangan']; ?></span>
                                                        </label>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <input type="hidden" name="date_created" value="<?= $users['date_created']; ?>">
                                        <div class="form-group row mb-4 float-right">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>