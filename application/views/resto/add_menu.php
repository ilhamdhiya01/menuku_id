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
                                <li class="nav-item"><a href="<?= base_url('resto'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Menu Makanan</a></li>
                                <li class="nav-item"><a href="<?= base_url('resto/katMenu/' . $user_session['id']); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Kategori Makanan</a></li>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="user_id" value="<?= $id['id']; ?>">
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <div class="col-sm-12 col-md-4">
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                    <input type="file" name="gambar" id="image-upload" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Makanan</label>
                                            <input type="text" name="nama_makanan" class="form-control">
                                            <small class="text-danger"><?= form_error('nama_makanan'); ?></small>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Menu</label>
                                            <div class="custom-switches-stacked mt-2">
                                            <?php foreach($status as $s): ?>
                                                <label class="custom-switch">
                                                    <input type="radio" name="status" class="custom-switch-input" value="<?= $s['id']; ?>" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description"><?= $s['status']; ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-4">
                                            <label class="ml-3">Kategori</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select class="form-control selectric" name="kat_id">
                                                    <option value="#">---Pilih---</option>
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?= $k['id']; ?>"><?= $k['menu_kategori']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga" id="rupiah">
                                            <small class="text-danger"><?= form_error('harga'); ?></small>
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <div class="col-sm-12 col-md-12">
                                                <textarea class="summernote-simple" name="keterangan"></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right">Tambah Menu</button>
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
