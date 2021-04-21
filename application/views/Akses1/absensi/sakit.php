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
  <h3>Izin Sakit</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'Dashboard_admin/save_sakit'; ?>">
    <!-- Buat tombol untuk menabah form data -->
<br><br>
    
    <b>Formulir Izin Sakit</b>
    <table class="table table-bordered">
       <tr>
        <td>Tangal Absen</td>
        <td><input id="datepicker" class="form-control" type="text" name="tgl_absen" placeholder="MM/DD/YYYY" required></td>
      </tr>
       <tr>
        <td>Poto Surat Sakit</td>
        <td><input name="image" type="file" class="form-control" required oninvalid="this.setCustomValidity('Poto belum dimasukkan')" oninput="setCustomValidity('')"/></td>
      </tr>
      
    </table>

      <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>

               
</div></div></div><br /></div></div>
