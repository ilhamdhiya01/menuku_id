<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    }

    .removeRow {
        background-color: red;
        color: #ffffff;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
            <h1><?= ucwords($menu); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('admin/member') ?>"><?= ucwords($menu); ?></a></div>
                <div class="breadcrumb-item">Pengguna Sistem</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Advanced Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                            <div class="col-sm-12 col-md-4">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="image" id="image-upload" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Admin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nama_admin" value="<?= set_value('nama_admin'); ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('nama_admin'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Resto</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nama_resto" value="<?= set_value('nama_resto'); ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('nama_resto'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control">
                                                <small class="text-danger"><?= form_error('email'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="password" name="password1" class="form-control">
                                                <small class="text-danger"><?= form_error('password1'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="password" name="password2" class="form-control">
                                                <small class="text-danger"><?= form_error('password1'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                                            <div class="custom-switches-stacked mt-2">
                                                <?php foreach ($level_id as $li) : ?>
                                                    <label class="custom-switch">
                                                        <input type="radio" value="<?= $li['id']; ?>" name="level_id" class="custom-switch-input" checked>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description"><?= $li['role']; ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aktifasi Akun</label>
                                            <div class="custom-switches-stacked mt-2">
                                                <?php foreach ($is_active as $ia) : ?>
                                                    <label class="custom-switch">
                                                        <input type="radio" name="is_active" class="custom-switch-input" value="<?= $ia['id_active'] ?>" checked>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description"><?= $ia['keterangan']; ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <input type="hidden" name="date_created" value="<?= time(); ?>">
                                        <div class="form-group row mb-4 float-right">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>