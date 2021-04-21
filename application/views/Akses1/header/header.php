<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/bootstrap/dist/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/nprogress/nprogress.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/iCheck/skins/flat/green.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/jqvmap/dist/jqvmap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/bootstrap-daterangepicker/daterangepicker.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'build/css/custom.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datepicker/jquery-ui.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/select2.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/emoji.css' ?>">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Selamat Datang</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url().'Dashboard_admin' ?>"><i class="fa fa-home"></i> Home</span></a>
                  </li>
                  <li><a><i class="fa fa-calendar-check-o"></i> Absensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
  <?php 
    
    foreach ($nama as $key) { ?>
     <li><a href="<?php echo base_url().'Dashboard_admin/absen/'.$key->id_user ?>">
        <?php echo $key->nama_user  ?>
      </a></li>
    <?php }?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Formulir Pemasangan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

  <?php 
    
    foreach ($kota as $kota) { ?>
     <li><a href="<?php echo base_url().'Dashboard_admin/pemasangan/'.$kota->kd_kota ?>">
        <?php echo $kota->nama_kota  ?>
      </a></li>
    <?php }?>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-picture-o"></i> Photo Photo<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php 
    
    foreach ($poto as $poto) { ?>
     <li><a href="<?php echo base_url().'Dashboard_admin/poto/'.$poto->kd_kota ?>">
        <?php echo $poto->nama_kota  ?>
      </a></li>
    <?php }?> 
                    </ul>
                  </li>
                  <li><a><i class="fa fa-pencil-square"></i> Formulir Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
     <?php 
    
    foreach ($mainten as $mainten) { ?>
     <li><a href="<?php echo base_url().'Dashboard_admin/maintenance/'.$mainten->kd_kota ?>">
        <?php echo $mainten->nama_kota  ?>
      </a></li>
    <?php }?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-wrench"></i> Data Lain <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo base_url().'Dashboard_admin/table' ?>">Konfigurasi Table</a></li>
                    <li><a href="<?php echo base_url().'Dashboard_admin/kontak' ?>">Buku Kontak</a></li>
                    <li><a href="<?php echo base_url().'Dashboard_admin/rembesan' ?>">Request Rembesan</a></li>
                    <li><a href="<?php echo base_url().'Dashboard_admin/daily' ?>">Daily</a></li>
                    </ul>
                  </li>
 <li><a href="<?php echo base_url().'Dashboard_admin/chat' ?>"><i class="fa fa-home"></i> Diskusi</span></a>
                  </li>                  
<li><a onclick="return confirm('Apakah anda ingin Logout');" href="<?php echo base_url().'Dashboard_admin/logout'; ?>"><i class="fa fa-power-off"></i>Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

          <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo "Hi, ".$this->session->userdata('nama_user');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url().'Dashboard_admin/ganti_password'; ?>"><i class="fa fa-gear pull-right"></i> Ganti Password</a></li>
                    <li><a onclick="return confirm('Apakah anda ingin Logout');" href="<?php echo base_url().'Dashboard_admin/logout'; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        

        