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
                                <li class="nav-item"><a href="<?= base_url('resto'); ?>" class="nav-link active"><i class="fas fa-caret-right"></i> Menu Makanan</a></li>
                                <li class="nav-item"><a href="<?= base_url('resto/katMenu/' . $id['id']); ?>" class="nav-link"><i class="fas fa-caret-right"></i> Kategori Makanan</a></li>
                                <li class="nav-item"><a href="<?= base_url('menu/userMenu'); ?>" class="nav-link"><i class="fas fa-caret-right"></i> User Menu</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i> Email</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i> System</a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-caret-right"></i>Automation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form id="setting-form">
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('resto/add_menu/' . $id['id']); ?>" type="submit" class="btn btn-primary btn-sm mb-3"><i class="far fa-plus-square"></i> Tambah Menu</a>
                                <button type="button" class="btn btn-danger btn-sm mb-3 ml-1" id="delete_all"><i class="fas fa-trash"></i> Hapus Bayak Data</button>
                                <a href="<?= base_url('resto/cetak') ?>" type="submit" class="btn btn-info btn-sm mb-3"><i class="fas fa-print"></i></a>
                                <?= $this->session->flashdata('flash'); ?>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" id="table-2">
                                        <thead style="text-align:center;">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input check" value="" type="checkbox" id="select_all">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>No</th>
                                                <th>Nama Makanan</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($menu_makanan as $mm) :
                                            ?>
                                                <tr style="text-align:center; font-size:12px;" id="tr">
                                                    <td>
                                                        <div class="form-check" style="margin-right:13px;">
                                                            <input class="form-check-input check" value="<?= $mm['id']; ?>" type="checkbox" name="checkbox_value" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $mm['nama_makanan']; ?></td>
                                                    <td><?= $mm['menu_kategori']; ?></td>
                                                    <td>Rp. <?= number_format($mm['harga'],2,',','.'); ?>,-</td>
                                                    <td>
                                                        <?php if ($mm['id_status'] == 1) : ?>
                                                            <h6><span class="badge badge-success" style="font-size:10px;">Tersedia</span></h6>
                                                        <?php else : ?>
                                                            <h6><span class="badge badge-danger" style="font-size:10px;">Kosong</span></h6>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('resto/detail_menu/' . $mm['id']); ?>" title="Detail"><i class="fas fa-info-circle"></i></a> |
                                                        <a href="<?= base_url('resto/edit_menu/' . $mm['id']); ?>" title="Edit"><i class="far fa-edit"></i></a> |
                                                        <a href="<?= base_url('resto/hapusMenu/' . $mm['id']); ?>" title="Hapus" onclick="return confirm('Hapus data ini ?')"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .removeRow {
        background-color: #F34423;
        color: #FFFFFF;
    }
</style>

<script>
    $('#select_all').on('click', function() {
        if (this.checked) {
            $('.check').each(function() {
                this.checked = true;
                if ($(this).is(':checked')) {
                    $(this).closest('#tr').addClass('removeRow');
                } else {
                    $(this).closest('#tr').removeClass('removeRow');
                }
            })
        } else {
            $('.check').each(function() {
                this.checked = false;
                if ($(this).is(':checked')) {
                    $(this).closest('#tr').addClass('removeRow');
                } else {
                    $(this).closest('#tr').removeClass('removeRow');
                }
            })
        }
    });

    $('.check').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).closest('#tr').addClass('removeRow');
        } else {
            $(this).closest('#tr').removeClass('removeRow');
        }
    })

    $('#delete_all').on('click', function() {
        var checkbox = $('.check:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function() {
                checkbox_value.push($(this).val());
            });
            $.ajax({
                url: "<?= base_url('resto/hapus_semuaMenu'); ?>",
                method: "post",
                data: {
                    checkbox_value: checkbox_value
                },
                success: function() {
                    $('.removeRow').fadeOut(1500);
                }
            })
        } else {
            alert('Tidak ada data yang di pilih');
        }
    })
</script>