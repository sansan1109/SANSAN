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
  <h3>PEMASANGAN</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" action="<?php echo base_url().'Dashboard_admin/absensi_p_act'; ?>">
    <!-- Buat tombol untuk menabah form data -->
    
    <table class="table table-bordered">
       <tr>
        <td width="200px">Tangal Absen</td>
        <td><input id="datepicker" class="form-control" type="text" name="tgl_absen" placeholder="MM/DD/YYYY" required></td>
      </tr>

       <tr>
        <td>Nama Kota</td>
        <td><select class="form-control" name="kd_kota" required>
          <option value="">Pilih Kota</option>
       <?php 
    $no = 1; 
    foreach ($kota as $key) { ?>
      <option value="<?php echo $key->kd_kota  ?>">
        <?php echo $key->nama_kota  ?>
      </option>
    <?php }?>
        </select></td>
      </tr>
      <tr>
        <td>Metode Tapping</td>
        <td><input class="form-control" type="text" name="metode" required></td>
      </tr>
      <tr>
        <td>ID Device</td>
        <td><input class="form-control" type="text" name="id_device" required></td>
      </tr>
      <tr>
        <td>No GSM</td>
        <td><input class="form-control" type="text" name="no_gsm" required onkeypress="return hanyaAngka(event)"></td>
      </tr>
      <tr>
        <td>Vendor Aplikasi</td>
        <td><input class="form-control" type="text" name="vendor"></td>
      </tr>
      <tr>
        <td>Jenis Wajib Pajak</td>
        <td><input class="form-control" type="text" name="jenis_wp" required></td>
      </tr>
      <tr>
        <td>Nama Wajib Pajak</td>
        <td><input class="form-control" type="text" name="nama_wp" required></td>
      </tr>
      <tr>
        <td>Alamat Wajib Pajak</td>
        <td><input class="form-control" type="text" name="alamat_wp" required></td>
      </tr>
      <tr>
        <td>Hasil Pengecekkan</td>
        <td><input class="form-control" type="text" name="hasil_pengecekkan" required></td>
      </tr>
      <tr>
        <td>Catatan</td>
        <td><input class="form-control" type="text" name="catatan_absen"></td>
      </tr>
       <tr>
        <td>Status</td>
        <td><select class="form-control" name="status" required>
          <option value="">Pilih Status</option>
        <option value="Solved">Solved</option>
        <option value="Pending">Pending</option>
        </select></td>
      </tr>
    </table>
    <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>

               
</div></div></div><br /></div></div>
