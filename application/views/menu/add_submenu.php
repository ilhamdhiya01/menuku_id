<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
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
                                <li class="nav-item"><a href="<?= base_url('menu'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Role User</a></li>
                                <li class="nav-item"><a href="<?= base_url('menu/subMenu'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Sub Menu</a></li>
                                <li class="nav-item"><a href="<?= base_url('menu/userMenu'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> User Menu</a></li>
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
                            <form action="" method="post">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Menu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="menu">
                                            <option value="#">---Pilih---</option>
                                            <?php foreach ($user_menu as $um) : ?>
                                                <option value="<?= $um['id']; ?>"><?= $um['nama_menu']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Menu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="sub_menu" value="" class="form-control">
                                        <span class="text-danger"><?= form_error('sub_menu'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="url" value="" class="form-control">
                                        <span class="text-danger"><?= form_error('url'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="icon" value="" class="form-control">
                                        <span class="text-danger"><?= form_error('icon'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aktivasi</label>
                                    <div class="custom-switches-stacked mt-2">
                                        <?php foreach ($aktif as $a) : ?>
                                            <label class="custom-switch">
                                                <input type="radio" name="is_active" value="<?= $a['id_active'] ?>" class="custom-switch-input" checked>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description"><?= $a['keterangan']; ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mr-5">Tambah</button>
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