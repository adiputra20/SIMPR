<body class="bg-gradient-light">
  <div class="container d-flex justify-content-center mt-5">
    <div class="d-flex flex-column justify-content-between">
      <div class="card mt-3 p-5">
        <div class="logo mb-3">
          <a href="<?= base_url(); ?>">
            <img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-1" width="50px" alt="logo">
          </a>
        </div>
        <div>
          <p class="mb-1 text-white">PAJAK & RETRIBUSI</p>
          <h4 class="mb-5 text-white"><i>money with us!</i></h4>
        </div>
      </div>
      <div class="card two bg-white px-5 py-4 mb-3">
        <form class="user needs-validation" method="POST" action="<?php echo base_url('admin/auth'); ?>" novalidate>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukkan NIP Anda...!!!" required autocomplete="off">
            <div class="invalid-feedback">NIPnya diisi dong bosku...!!!</div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
            <div class="invalid-feedback">Passwordnya juga harus diisi dong bosku...!!!</div>
          </div>
          <div class="form-group" width="30%">
            <select class="custom-select" id="tahun" name="tahun" required>
              <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
              <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
              <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
              <option selected value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
              <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
              <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
              <option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
            </select>
          </div>
          <button type="submit" class="btn btn-user btn-secondary btn-block btn-lg mt-1 mb-2">
            <span>Login<i class="fas fa-long-arrow-alt-right ml-2"></i></span>
          </button>
          <span class="text-center">Belum Punya User?<a href="<?= base_url('pegawai/register') ?>"> daftar disini</a></span>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/swal/dist/sweetalert2.min.js"></script>
</body>
<script>
  <?php if ($this->session->flashdata('pesan')) { ?>
    Swal.fire({
      icon: '<?php echo $this->session->flashdata('pesan'); ?>',
      title: '<?php echo $this->session->flashdata('title'); ?>',
      text: '<?php echo $this->session->flashdata('text'); ?>',
    });
  <?php }; ?>

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>

</html>