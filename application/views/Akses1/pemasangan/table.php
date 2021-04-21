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

      <div class="col-md-6"><h3>Konfigurasi Kota</h3></div>
      <div class="col-md-6" style="width: 100px; margin-bottom: 15px; float: right;">
<a class="btn btn-primary btn-md" href="<?php echo base_url().'Dashboard_admin/tambah_table'; ?>">Add Table</a></div>
       <div class="col-md-12">  
     <hr>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
       <tr>
        <th style="width: 100px;">Kode Kota</th>
        <th>Nama Kota</th>
        <th style="width: 100px;">Pilihan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($kota2 as $a) {
      ?>
      <tr>
        <td><?php echo $a->kd_kota ?></td>
        <td><?php echo $a->nama_kota ?></td>
        <td nowrap="nowrap">
       <a class="btn btn-primary btn-xs" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/edit_table/'.$a->kd_kota; ?>">Lihat</a><br/>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/hapus_table/'.$a->kd_kota; ?>">  Hapus</a>
        
      <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>       
  </div>         
          
</div>
</div>
</div>
</div><br />
</div>
        <!-- /page content -->
