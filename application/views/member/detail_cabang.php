<style>
    .card {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    }

    .gambar {
        width: 200px;
        height: 200px;
        margin: 10px 0;
    }

    @media (min-width: 992px) {
        .gambar {
            width: 200px;
            height: 200px;
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
                            <h4>Cabang Resto <?= $user_session['nama_resto']; ?></h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <img src="<?= base_url('public/img/profile/' . $detail['gambar']); ?>" class="gambar">
                                        </div>
                                        <div class="form-group">
                                            <h6>Nama Cabang : <?= $detail['nama_cabang']; ?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6>Nomor Telephone : <?= $detail['no_tlp']; ?></h6>
                                        </div>
                                        <div class="form-group">
                                            <h6>Nomor Whatsapp : <?= $detail['no_wa']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h6>Alamat : </h6>
                                            <p><?= $detail['alamat_cabang']; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h6>About : </h6>
                                            <p><?= $detail['about']; ?></p>
                                        </div>
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