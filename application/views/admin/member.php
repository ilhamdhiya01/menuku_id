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
                            <a href="<?= base_url('admin/add_users'); ?>" type="submit" class="btn btn-primary btn-sm mb-3"><i class="far fa-plus-square"></i> Tambah User Baru</a>
                            <button type="button" class="btn btn-danger btn-sm mb-3 ml-1" id="delete-all"><i class="fas fa-trash"></i> Hapus Banyak Data</button>
                            <?= $this->session->flashdata('flash'); ?>
                            <div class="table-responsive">
                                <table class="table table-md table-bordered" id="table-2">
                                    <thead style="text-align:center;">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="checkbox" value="" id="select_all">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>No</th>
                                            <th>Nama Admin</th>
                                            <th>Nama Resto</th>
                                            <th>Level</th>
                                            <th>Aktivasi</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($users as $user) :
                                        ?>
                                            <tr style="text-align:center;" id="tr">
                                                <td>
                                                    <div class="form-check" style="margin-right:13px;">
                                                        <input class="form-check-input check" value="<?= $user['id']; ?>" type="checkbox" value="" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?= $no++; ?></td>
                                                <td><?= $user['nama_admin']; ?></td>
                                                <td><?= $user['nama_resto']; ?></td>
                                                <td><?= $user['role']; ?></td>
                                                <?php if ($user['is_active'] == 1) : ?>
                                                    <td>
                                                        <h6><span class="badge badge-success" style="font-size:10px;">Aktif</span></h6>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <h6><span class="badge badge-danger" style="font-size:10px;">Tidak Aktif</span></h6>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?= date('d F Y', $user['date_created']); ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/ubah/' . $user['id']); ?>" title="Edit"><i class="fas fa-user-edit"></i></a> |
                                                    <a href="<?= base_url('admin/hapus/' . $user['id']); ?>" title="Hapus" onclick="return confirm('Hapus data ini ?')"><i class="fas fa-user-times"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
    });

    $('#delete-all').on('click', function() {
        var checkbox = $('.check:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function() {
                checkbox_value.push($(this).val());
            });
            $.ajax({
                url: "<?= base_url('admin/hapus_semuaPengguna'); ?>",
                method: "post",
                data: {
                    checkbox_value: checkbox_value
                },
                success: function() {
                    $('.removeRow').fadeOut(1500);
                }
            })
        } else {
            alert('Tidak ada data yang dipilih');
        }
    });
</script>