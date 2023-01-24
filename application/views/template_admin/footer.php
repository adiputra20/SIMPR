<!-- Footer fixed-bottom -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <strong>Antonius Vicky Prayoga, S.T., M.Ak.</strong> - TAHUN ANGGARAN <?= $this->session->userdata('tahun'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Ganti Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/user/editPass'); ?>">
                    <div class="form-group row mb-1">
                        <label for="newPass" class="col-sm-4 col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="nip" value="<?php echo $this->session->userdata('nip');  ?>">
                            <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Password Baru">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="newPass1" class="col-sm-4 col-form-label">Ulangi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="newPass1" name="newPass1" placeholder="Ulangi Password Baru">
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success" data-dismis="modal">Update</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success" data-dismis="modal">Update</button> -->
            <!-- <a class="btn btn-primary" href="#">Simpan</a> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . "assets/vendor/bootstrap/js/bootstrap-select.min.js"; ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/fontawesome-free/js/all.min .js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/swal/dist/sweetalert2.min.js"></script>
<script src="<?php echo base_url() . "assets/vendor/select2/js/select2.full.min.js"; ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
</body>
<script>
    <?php if ($this->session->flashdata('pesan')) { ?>
        Swal.fire({
            icon: '<?php echo $this->session->flashdata('pesan'); ?>',
            title: '<?php echo $this->session->flashdata('title'); ?>',
            text: '<?php echo $this->session->flashdata('text'); ?>',
        });
    <?php }; ?>

    $('#myList a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>

</html>