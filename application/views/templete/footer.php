</div>
</div>

<!-- General JS Scripts -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
<script src="<?= base_url(); ?>public/vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

<!-- JS Libraies -->
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/summernote/dist/summernote-bs4.js"></script>
<!-- <script src="<?= base_url(); ?>public/vendor/node_modules/selectric/public/jquery.selectric.min.js"></script> -->
<script src="<?= base_url(); ?>public/vendor/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?= base_url(); ?>public/vendor/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?= base_url(); ?>public/js/sweetalert2.all.min.js"></script>
<!-- <script src="<?= base_url(); ?>public/vendor/node_modules/node_modules/sweetalert/dist/sweetalert.min.js"></script> -->

<!-- Template JS File -->
<script src="<?= base_url(); ?>public/vendor/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>public/vendor/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>public/vendor/assets/js/page/features-post-create.js"></script>
<script src="<?= base_url(); ?>public/vendor/assets/js/page/modules-datatables.js"></script>
<!-- <script src="<?= base_url(); ?>public/vendor/assets/js/page/modules-sweetalert.js"></script> -->
<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: "post",
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/access/'); ?>" + roleId;
            }
        })
    });
</script>

</body>

</html>