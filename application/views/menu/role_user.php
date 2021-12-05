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
                                <li class="nav-item"><a href="<?= base_url('menu'); ?>" class="nav-link active"><i class="fas fa-caret-right"></i> Role User</a></li>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover table-md table-bordered">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th scope="col">No</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($roles as $role) :
                                            ?>
                                                <tr style="text-align: center;">
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $role['role']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/access/' . $role['id']); ?>"  title="Access"><i class="fas fa-user-cog"></i></a> |
                                                        <a href="<?= base_url('menu/hapusRole/' . $role['id']); ?>"  title="Hapus" onclick="return confirm('Hapus menu ini ?')"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <?= $this->session->flashdata('flash'); ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_role">Nama Role</label>
                                            <input type="text" class="form-control" id="nama_role" name="nama_role">
                                            <span class="text-danger"><?= form_error('nama_role'); ?></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right"><i class="far fa-plus-square"></i> Tambah</button>
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