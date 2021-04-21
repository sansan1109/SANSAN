 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">
<?php if($this->session->flashdata('alertgagal')) : ?>
<div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alertgagal');?>
</div>
<?php endif ?>
<?php if($this->session->flashdata('alertsukses')) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alertsukses');?>
</div>
<?php endif ?>
  <div class="row x_title">
  <div class="col-md-12">
      <?php
      
        $no = 1;
        foreach ($namaa_kota as $b) {
      ?>
<h3><?php echo "Poto ".$b->nama_kota; ?></h3>
<a href=" <?php echo base_url().'Dashboard_admin/download_zip/'.$this->uri->segment('3') ?>">
<img src="<?php echo base_url().'assets/rar.png' ?>" style="width: 30px; margin-bottom: 15px; float: right;">
  </a>
    </div>
    </div>
<div class="col-md-9 col-sm-9 col-xs-12"></div>
     


    <?php } ?>

  <div class="row x_title">
  <div class="table-responsive">
 <?php
        $no = 1;
        foreach ($absen as $z){
?>
    <div class="">
    <div class="col-md-3 ">
    <table>
<tr>
<td>
<img src="<?php  echo base_url().'/assets/upload/'.$z->gambar; ?>" alt="gambar tidak ada" class="img-thumbnail box-produk-img" style="
    height: 180px;
    width: 250px;
">
</td>
</tr>
<tr>
<td>
<center style="font-size: 15px;">
    <?php echo substr($z->nama_wp,0,10).'...';?>
<br><?php echo $z->id_device;?>
<br><?php echo $z->tgl_absen;?>
<br><?php echo $z->nama_user;?>
</center>
</td>
</tr>
<tr>
<td>
<center>
<br>
<?php 
        if($this->session->userdata('id_user')==$z->id_user){
           ?>

<a class="btn btn-primary btn-sm" href="<?php echo base_url().'Dashboard_admin/edit_poto/'.$z->kd_absen; ?>">Edit</a>
<a onclick="return confirm('Apakah anda yakin ingin menghapus Poto ini?');" class="btn btn-warning btn-sm" href="<?php echo base_url().'Dashboard_admin/hapus_poto/'.$z->kd_absen; ?>">Hapus</a>

       <?php }else{
        echo "";
       }  ?>

</center>
</td>
</tr>
    </table>
    </div>       
    </div>  
<?php } ?>       
</div> </div>           
</div></div></div></div>
