<!DOCTYPE html>
<html lang="en">

<head runat="server">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;  ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/font.sss" rel="stylesheet">
    <!--     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/swal/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/my.css" rel="stylesheet">
    <!-- <link rel="shortcut icon" type="image/png" href="<?php echo base_url() . 'assets/img/inovasi.png' ?>" type="image/x-icon"> -->
    <link href="<?php echo base_url() . 'assets/img/mycomp.png' ?>" rel="icon">
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>

    <style type="text/css">
        /* body {
            background-color: #EBEAEF
        } */

        .container {
            flex-wrap: wrap
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #6c757d;
            width: 350px;
            margin-top: -60px
        }

        p.mb-1 {
            font-size: 25px;
            color: #9FB7FD
        }

        .btn-primary {
            border: none;
            background: #6c757d;
            margin-bottom: 60px
        }

        .btn-primary small {
            color: #6c757d
        }

        .btn-primary span {
            font-size: 13px
        }

        .card.two {
            border-top-right-radius: 60px;
            border-top-left-radius: 0
        }

        .form-group {
            position: relative;
            margin-bottom: 2rem
        }

        .form-control {
            border: none;
            border-radius: 0;
            outline: 0;
            border-bottom: 1.5px solid #E6EBEE
        }

        .form-control:focus {
            box-shadow: none;
            border-radius: 0;
            border-bottom: 2px solid #8A97A8
        }

        .form-control-placeholder {
            position: absolute;
            top: 15px;
            left: 10px;
            transition: all 200ms;
            opacity: 0.5;
            font-size: 80%
        }

        .form-control:focus+.form-control-placeholder,
        .form-control:valid+.form-control-placeholder {
            font-size: 80%;
            transform: translate3d(0, -90%, 0);
            opacity: 1;
            top: 10px;
            color: #8B92AC
        }

        .btn-block {
            border: none;
            border-radius: 8px;
            background-color: #6c757d;
            padding: 10px 0 12px
        }

        .btn-block:focus {
            box-shadow: none
        }

        .btn-block span {
            font-size: 15px;
            color: #D0E6FF
        }
    </style>
</head>