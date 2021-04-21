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
  <h3>MAINTENANCE</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'Dashboard_admin/absensi_m_act'; ?>">
    <!-- Buat tombol untuk menabah form data -->
    
    <table class="table table-bordered">
       <tr>
        <td width="200px">Tangal Absen</td>
        <td><input id="datepicker" class="form-control" type="text" name="tgl_absen" placeholder="MM/DD/YYYY" required></td>
      </tr>

       <tr>
        <td>Nama Kota</td>
        <td><select id="category" class="form-control" name="kd_kota" required>
          <option value="">Pilih Kota</option>

              <?php foreach($kota as $row):?>
              <option value="<?php echo $row->kd_kota;?>"><?php echo $row->nama_kota;?></option>
              <?php endforeach;?>

        </select></td>
      </tr>
      <tr>
        <td>ID Device</td>
        <td><!-- <select id="sub_category" class="form-control" name="id_device" required>
          <option value="">Pilih Device</option>
        </select> -->
          <select id="selUser" class="form-control" name="id_device" required>
<option value=""><?php echo "------";?></option>
<?php foreach($device as $dev):?>
<option value="<?php echo $dev->id_device;?>"><?php echo $dev->id_device;?></option>
<?php endforeach;?>
</select>
        </td>
      </tr>
      <tr>
        <td>Nama Wajib Pajak</td>
        <td><input id="nama_wp" name="nama_wp" class="form-control" type="text" readonly></td>
      </tr>
      <tr>
        <td>Alamat Wajib Pajak</td>
        <td>
        <input id="alamat_wp" name="alamat_wp" class="form-control" type="text" readonly>
        <input id="status_profiling" name="status_profiling" hidden>
        <input id="no_gsm" name="no_gsm" hidden>
        <input id="vendor" name="vendor" hidden>
        <input id="metode" name="metode" hidden>
        <input id="jenis_wp" name="jenis_wp" hidden>
        </td>
      </tr>
      <tr>
        <td>Hasil Pengecekkan</td>
        <td><input class="form-control" type="text" name="hasil_pengecekkan" required></td>
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
