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
  <div class="col-md-6">
  <h3>Daily</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'Dashboard_admin/save_daily'; ?>">
    <!-- Buat tombol untuk menabah form data -->
    
    <table class="table table-bordered">
<tr>
<td width="200px">Tangal Daily</td>
<td><input id="datepicker" class="form-control" type="text" name="tgl_daily" placeholder="MM/DD/YYYY" required></td>
</tr>
<tr>
<td>Nama Kota</td>
<td><input name="nama_kota" class="form-control" type="text" required></td>
</tr>
<tr>
<td>Aktivitas</td>
<td><input name="aktivitas" class="form-control" type="text" required></td>
</tr>
<tr>
<td>Keterangan</td>
<td><input name="ket_aktivitas" class="form-control" type="text" required></td>
</tr>
      
    </table>
    <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>


               
</div></div></div><br /></div></div>
