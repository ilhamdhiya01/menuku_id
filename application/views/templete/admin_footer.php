</div>
</div>
<script>
    "use strict";

    /* Preloader */
    $(window).on('load', function() {
        var preloaderFadeOutTime = 500;

        function hidePreloader() {
            var preloader = $('.loading');
            setTimeout(function() {
                preloader.fadeOut(preloaderFadeOutTime);
            }, 500);
        }
        hidePreloader();
    });

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatrupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatrupiah(this.value, 'Rp ');
    });

    /* Fungsi formatrupiah */
    function formatrupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>
<!-- General JS Scripts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

<!-- JS Libraies -->
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/codemirror/lib/codemirror.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/selectric/public/jquery.selectric.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?= base_url(); ?>public/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/node_modules/sweetalert/dist/sweetalert.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url(); ?>public/vendor/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>public/vendor/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>public/vendor/assets/js/page/features-post-create.js"></script>
<script src="<?= base_url(); ?>public/vendor/assets/js/page/modules-datatables.js"></script>
<script src="<?= base_url(); ?>public/vendor/assets/js/page/modules-sweetalert.js"></script>

</body>

</html>