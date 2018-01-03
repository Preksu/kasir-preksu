<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="<?=base_url();?>assets/img/header/logo.png">

    <!-- Bootstrap Core CSS -->




    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/jquery.tagsinput.css">
   

   
    

    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/summernote.css">

    

     <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/sb-admin.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/admin-nav.css">

        <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/font-awesome/css/font-awesome.min.css">

     <!-- Morris Charts CSS -->
    <!--<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/plugins/morris.css">-->
    <script src="<?= base_url();?>assets/js/jquery.js"></script>
    <script src="<?= base_url();?>assets/js/summernote.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/jquery.tagsinput.js"></script>
  

    <!-- Morris Charts JavaScript -->
    <!--<script src="<?= base_url();?>assets/js/plugins/morris/raphael.min.js"></script>-->
    <!--<script src="<?= base_url();?>assets/js/plugins/morris/morris.min.js"></script>-->
    <!--<script src="<?= base_url();?>assets/js/plugins/morris/morris-data.js"></script>-->




</head>

<body class="Open-sans">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-admin navbar-fixed-top" style="box-shadow: 0px 0px 4px #555;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: #e54747;"  class="navbar-brand lora" href="<?=base_url();?>admin">PREKSU (Ayam Geprek & Susu)

</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="">
                        <a href="<?=base_url();?>owner"><i class="fa fa-fw fa-desktop"></i> Laporan</a>
                    </li>
                    <li class="">
                        <a href="<?=base_url();?>owner/menu"><i class="fa fa-fw fa-desktop"></i> Menu</a>
                    </li>
                    <li class="">
                        <a href="<?=base_url();?>owner/pengguna"><i class="fa fa-fw fa-desktop"></i> Pengguna</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="min-height: 700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header lora">
                            Pemilik
                        </h1>
                        <ol class="breadcrumb" style="background: #e54747 !important;">
                            <li class="active" style="color: #fff;">
                                <i class="fa fa-desktop"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Selamat datang Pemilik</strong> Anda berhasil masuk
                        </div>
                    </div>
                </div>