<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title><?= $judul; ?></title>
</head>
<body>
    <div class="container">
    <table  class="table table-striped mt-5 table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Makanan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $no = 1;
        foreach($cetak as $data) :
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $data['nama_makanan']; ?></td>
                <td><?= $data['menu_kategori']; ?></td>
                <td>Rp <?=  number_format($data['harga'],2,',','.'); ?></td>
                <td><?= $data['status']; ?></td>
                <td><?= $data['keterangan']; ?></td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
    </div>
    <script src="<?= base_url(); ?>public/vendor/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>public/vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        window.print();
    </script>
</body>
</html>