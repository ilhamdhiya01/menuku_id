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
                                <li class="nav-item"><a href="<?= base_url('resto/katMenu/' . $user_session['id']); ?>" class="nav-link active"><i class="fas fa-caret-right"></i> Kategori Makanan</a></li>
                                <li class="nav-item"><a href="<?= base_url('menu/userMenu'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> UserMenu</a></li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover table-md table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Menu Kategori</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kat_makanan as $km) :
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $km['menu_kategori']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('resto/hapusKategori/' . $km['id']); ?>" title="Hapus" id="toastr-2" onclick="return confirm('Hapus menu ini ?')"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <?= $this->session->flashdata('flash'); ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="<?= $user_session['id']; ?>">
                                            <label for="kat_makanan">Kategori Menu</label>
                                            <input type="text" class="form-control" id="kat_makanan" name="kat_makanan">
                                            <span class="text-danger"><?= form_error('kat_makanan'); ?></span>
                                        </div>
                                        <button type="submit" id="swal-2" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>