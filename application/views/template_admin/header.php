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
    <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/swal/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . "assets/vendor/select2/css/select2.min.css"; ?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/my.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/billboard.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/img/mycomp.png' ?>" rel="icon">
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/d3.v4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/billboard.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>

    <script>
        <?php
        if ($title == "Dashboard") {
            $pajak = 0;
            $retribusi = 0;
            $lainnya = 0;
            foreach ($donut as $datadonut) :
                switch ($datadonut->jenis) {
                    case "pajak":
                        $pajak += $datadonut->nilai;
                        break;
                    case "retribusi":
                        $retribusi += $datadonut->nilai;
                    case "lainnya":
                        $lainnya += $datadonut->nilai;
                }
            endforeach;

            $datalabel = "";
            $datanilai = "";

            foreach ($timeline as $datagaris) :
                $datalabel .= '"' . $datagaris->bulan . '",';
                $datanilai .=  "" . $datagaris->nilai . ",";
            endforeach;
            /* echo "var labelnya = [$datalabel];\n "; */
            /* echo "var datanya  = [$datanilai];"; */
        ?>
            var nlabelnya = <?php echo "[" . substr($datalabel, 0, strlen(trim($datalabel)) - 1) . "]"; ?>;
            var ndatanya = <?php echo "[" . substr($datanilai, 0, strlen(trim($datanilai)) - 1) . "]"; ?>;
            var npajak = <?php echo $pajak; ?>;
            var nretribusi = <?php echo $retribusi; ?>;
            var nlainnya = <?php echo $lainnya; ?>;
        <?php }; ?>
    </script>
</head>