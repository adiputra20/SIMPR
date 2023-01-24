<body class="bg-gradient-secondary">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-lg-4">
            <form class="needs-validation" method="POST" action="<?= base_url('pegawai/register/save'); ?>" novalidate>
                <div class="card mt-5 shadow">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-sm" name="nip" placeholder="NIP" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 search_select_box">
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="golongan" name="golongan" required>
                                                <option selected disabled value="">Pilih Golongan...</option>
                                                <?php foreach ($golongan as $gol) : ?>
                                                    <option value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary" type="submit">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a class="small" href="<?= base_url('admin/auth') ?>">Sudah punya Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="sticky-footer bg-white fixed-bottom">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <strong>Antonius Vicky Prayoga, S.T., M.Ak.</strong> - TAHUN ANGGARAN <?= $this->session->userdata('tahun'); ?></span>
            </div>
        </div>
    </footer>
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

</html>