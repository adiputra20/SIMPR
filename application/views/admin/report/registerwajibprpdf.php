<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;  ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/font.sss" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
        <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" colspan="3="> <h1 class="h5 mb-0 text-gray-800 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900" colspan="3="> <h1 class="h4 mb-0 text-gray-800 ml-3 text-center">BADAN PENDAPATAN DAERAH</h1></td>  
                        </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center><label for="nomor" class="col-md-9 col-form-label text-gray-900">REGISTER <?php echo $jenis ?></label></center>
                <div class="table-responsive">
                    <small>
                    <table class="table table-bordered table-sm text-gray-900" id="dataTable" width="100%" cellspacing="0" border="1">
                    <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                        <thead>
                            <tr>
                                <th class="text-center">NPWRD</th>
                                <th class="text-center">Nama Pemilik</th>
                                <th class="text-center">Nama/Merk Usaha</th>
                                <th class="text-center">Jenis Usaha</th>
                                <th class="text-center">Lokasi Usaha</th>
                                <th class="text-center">No. Surat Izin</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wajibp as $wp): ?>
                                <tr>
                                    <td><?php echo $wp->npwprd; ?></td>
                                    <td><?php echo $wp->namapemilik; ?></td>
                                    <td><?php echo $wp->namausaha; ?></td>
                                    <td><?php echo $wp->jenisusaha; ?></td>
                                    <td><?php echo $wp->alamatusaha; ?></td>
                                    <td><?php echo $wp->situ; ?></td>
                                    <!-- <td><?php echo date("d  F Y",strtotime($wp->tanggal)); ?></td> -->
                                    <td><?php if($wp->status==1){ echo "beroperasi"; }else{ echo "tutup"; }; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table width="100%" cellspacing="0">
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3=" width="40%"> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->ibu_kota.", ".date("d F Y"); }; ?></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center">KEPALA BADAN PENDAPATAN DAERAH</p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->nama_kaban; }; ?><br><br><br><br><br><br></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->pangkat; }; ?></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo "NIP. ".$client->nip_kaban; }; ?><br><br></p></td> 
                        </tr>
                    </table>
                    </small>
                </div>             
            </div>
        </div>
    </body>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <!-- Page level plugins -->
</html>