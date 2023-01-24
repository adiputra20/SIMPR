<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user needs-validation" novalidate>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nip" aria-describedby="emailHelp" placeholder="NIP Pegawai" required>
                                            <div class="invalid-feedback">NIPnya diisi dong bosku...!!!</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                            <div class="invalid-feedback">NIPnya diisi dong bosku...!!!</div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block btn-lg mt-1 mb-2">
                                            <span>Login<i class="fas fa-long-arrow-alt-right ml-2"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/swal/dist/sweetalert2.min.js"></script>

</body>
<script>
    <?php if ($this->session->flashdata('pesan')) { ?>
        Swal.fire({
               icon: '<?php echo $this->session->flashdata('pesan'); ?>',
               title:'<?php echo $this->session->flashdata('title'); ?>', 
               text: '<?php echo $this->session->flashdata('text'); ?>',
         }); 
    <?php }; ?>
</script>

</html>