<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Pembelajaran</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Guru</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_guru'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_guru/biodata'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_guru/tampil_rapor'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>E-Rapor</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tugas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_jtugas'); ?>">Topik</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/form_tessay'); ?>">Tugas Uraian</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/form_tpilihan'); ?>">Tugas Pilihan</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_formKU'); ?>">Kuis Uraian</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_kPilihan'); ?>">Kuis Pilihan</a>
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a href="" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kuis</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_jkuis'); ?>">Topik</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_formKU'); ?>">Uraian</a>
                        <a class="collapse-item" href="<?php echo base_url('C_guru/tampil_kPilihan'); ?>">Pilihan</a>
                    </div>
                </div>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('C_guru/tampil_formplagiasi'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Cek Plagiasi</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_guru/tampilwaktu'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>waktu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>