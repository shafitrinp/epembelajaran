<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_admin'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tambah Akun</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?php echo base_url('C_admin/register_guru'); ?>">Guru</a>
                        <a class="collapse-item" href="<?php echo base_url('C_admin/tampil_daftarsiswa'); ?>">Siswa</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('C_admin/tampil_datakelas'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Buat Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('C_admin/tampil_datamapel'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tambah Mata Pelajaran</span></a>
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
        <link href="<?php echo base_url('assets/fontawesome-free/css/fonts.css'); ?>" rel="stylesheet" type="text/css">