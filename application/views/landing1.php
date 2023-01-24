<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Website Resmi BAPENDA Pegunungan Bintang</title>
  <!-- Favicon-->
  <link href="<?php echo base_url() . 'assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . "assets/vendor/fontawesome-free/css/all.min.css"; ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/img/mycomp.png' ?>" rel="icon">
  <link href="<?php echo base_url() . 'assets/css/styles.css' ?>" rel="stylesheet" />
  <link href="<?php echo base_url() . 'assets/css/jquery.orgchart.css' ?>" rel="stylesheet" />
  <style>
    .about p {
      margin: 0;
      /* text-indent: 2rem; */
      text-align: justify;
    }
  </style>
</head>

<body>
  <?php
  foreach ($pemda as $client) :
    $nmPemda = $client->Nama_Pemda;
  endforeach;

  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
      <a class="navbar-brand" href="#!">
        <img src="<?= base_url() . 'assets/img/logo.png'; ?>" alt="logo" width="35">
        <?= $nmPemda; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link text-uppercase active" aria-current="page" href="#!"><i class="fa-solid fa-house"></i> Home</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-id-badge"></i> Profil</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Struktur Organisasi</a>
              <a class="dropdown-item" href="#">Tupoksi</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Visi dan Misi</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link text-uppercase " href="#!"><i class="fa-solid fa-chart-column"></i> Pertumbuhan PAD</a></li>
          <li class="nav-item"><a class="nav-link text-uppercase " href="#!"><i class="fa-solid fa-phone"></i> Kontak Kami</a></li>
          <li class="nav-item"><a class="nav-link text-uppercase " href="<?= base_url('admin/auth'); ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login Apps</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0 w-100" src="<?= base_url() . 'assets/img/cr1.jpeg'; ?>" alt="La Pago" />
      </div>
      <div class="col-lg-5 about text-justify">
        <h1 class="font-weight-light">Sekapur Sirih</h1>
        <p class="text-justify">Dengan memanjatkan puji dan syukur kehadirat Tuhan Yang Maha Kuasa atas limpahan rahmat dan karuniaNya maka website Badan Pendapatan Daerah Kabupaten Pegunungan Bintang dapat dihadirkan sebagai upaya untuk memberikan informasi dan bahan evaluasi di dalam memperbaiki kinerja guna mewujudkan peningkatan pelayanan kepada masyarakat.</p>
      </div>
    </div>
    <div class="card text-white bg-secondary my-2 py-1 text-center">
      <div class="card-body">
        <p class="text-white m-0">
          <marquee direction="left">
            TERIP TIBO SEMO NIRYA - MARI BANGKIT MEMBANGUN BERSAMA - "AYO BAYAR PAJAK SEBELUM JATUH TEMPO, DENDA SEBESAR 2% DARI TOTAL PAJAK TERHUTANG"
          </marquee>
        </p>
      </div>
    </div>
    <div class="row gx-4 gx-lg-5">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body about text-justify">
            <h2 class="card-title">Visi</h2>
            <p class="card-text">Terwujudnya Pendapatan Daerah Yang Dinamis Dan Optimal Guna Menunjang Kemandirian Keuangan Daerah Kabupaten Pegunungan Bintang</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body about text-justify ">
            <h2 class="card-title">Misi</h2>
            <p class="card-text">
            <ol type="1">
              <li>
                Menggali dan mengembangkan sumber-sumber pendapatan lainnya melalui intensifikasi dan ekstensifikasi.
              </li>
              <li>
                Terciptanya sistem informasi Pengelolaan Pendapatan Daerah secara efektif, Transparan dan Akuntabel.
              </li>
              <li>
                Meningkatkan kemampuan sumber daya manusia.
              </li>
              <li>
                Meningkatkan pelayanan yang cepat, tepat dan memuaskan.
              </li>
              <li>
                Meningkatkan sosialisasi PAD terhadap masyarakat.
              </li>
            </ol>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body about text-justify">
            <h2 class="card-title">Moto</h2>
            <p class="card-text">Dalam mewujudkan nilai dari visi Badan Pendapatan Daerah Kabupaten Pegunungan Bintang dilaksanakan dalam bentuk motto “Tiada Hari Tanpa Pungutan, Melayani dengan Hati dan Senyum"</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container px-4 px-lg-5">
    <div class="card">
      <div class="card-header">
        STRUKTUR ORAGANISASI BADAN PENDPATAN DAERAH KABUPATEN PEGUNUNGAN BINTANG
      </div>
      <div class="card-body">
        <div id="left">
          <ul id="organisation" style="display:none">
            <li>
              <adjunct>Alfred</adjunct><em>Batman</em>
              <ul>
                <li>Batman Begins
                  <ul>
                    <li>Ra's Al Ghul</li>
                    <li>Carmine Falconi</li>
                  </ul>
                </li>
                <li>The Dark Knight
                  <ul>
                    <li>Joker</li>
                    <li>Harvey Dent</li>
                  </ul>
                </li>
                <li>The Dark Knight Rises
                  <ul>
                    <li>Bane</li>
                    <li>Talia Al Ghul</li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div id="content">
          <div id="main">
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container px-4 px-lg-5">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
    </div>
  </footer>

  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
  <!-- <script src="<?= base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/jquery.orgchart.js' ?>"></script> -->
  <script src="<?= base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/vendor/popper/umd/popper.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
  <script src="<?= base_url() . 'assets/vendor/fontawesome-free/js/all.js'; ?>"></script>
  <script src="<?= base_url() . 'assets/js/jquery.orgchart.min.js'; ?>"></script>

  <script>
    $(function() {
      $("#organisation").orgChart({
        container: $("#main")
      });
    });
  </script>
</body>

</html>